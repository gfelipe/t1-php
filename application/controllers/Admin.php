<?php
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('product_model');
        $this->load->model('image_model');
        $this->load->model('favorite_model');
    }

    public function index() {
        $this->verifyAdmin();
        $this->renderPage('admin/index', []);
    }

    public function products() {
        $this->verifyAdmin();

        $data['products'] = $this->product_model->get_product();
        $this->renderPage('admin/products', $data);
    }

    public function create_product() {
        $this->verifyAdmin();
        $this->renderPage('admin/create_product', []);
    }

    public function save_product() {
        $this->verifyAdmin();
        $this->load->library('form_validation');

        $product = $this->readProduct();

        if ($this->form_validation->run() == TRUE) {
            $this->product_model->save_product($product);

            $this->session->set_flashdata('message', 'Produto criado com sucesso.');
            redirect('/admin/products', 'refresh');
        } else {
            $data['product'] = $product;
            $this->renderPage('admin/create_product', $data);
        }

        if ( false ) {

        } else {


        }
    }

    public function edit_product($id) {
        $this->verifyAdmin();

        $data['product'] = $this->product_model->get_product($id);
        $data['images'] = $this->image_model->find_images(array('product_id' => $id));
        $this->renderPage('admin/edit_product', $data);
    }

    public function update_product() {
        $this->verifyAdmin();
        $this->load->library('form_validation');

        $product = $this->readProduct();

        if ($this->form_validation->run() == TRUE) {
            $this->product_model->update_product($this->input->post('id'), $product);

            $this->session->set_flashdata('message', 'Produto atualizado com sucesso.');
            redirect('/admin/products', 'refresh');
        } else {
            $product['id'] = $this->input->post('id');
            $data['product'] = $product;
            $data['images'] = $this->image_model->find_images(array('product_id' => $product['id']));
            $this->renderPage('admin/edit_product', $data);
        }
    }

    public function add_image($productId) {
        $this->verifyAdmin();

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('image')) {
            $data['product'] = $this->product_model->get_product($productId);
            $data['images'] = $this->image_model->find_images(array('product_id' => $productId));
            $data['upload_error'] = $this->upload->display_errors();

            $this->renderPage('admin/edit_product', $data);
        } else {
            $image = array (
                'product_id' => $productId,
                'src' => '/uploads/' . $this->upload->data('file_name'),
            );

            $this->image_model->save_image($image);
            $this->session->set_flashdata('message', 'Imagem adicionada com sucesso.');
            redirect('/admin/products/edit/'.$productId, 'refresh');
        }
    }

    public function remove_image($imageId) {
        $this->verifyAdmin();

        $image = $this->image_model->get_image($imageId);

        $this->image_model->remove_image($imageId);
        $this->session->set_flashdata('message', 'Imagem removida com sucesso.');
        redirect('/admin/products/edit/' . $image['product_id'], 'refresh');
    }

    public function remove_product($productId) {
        $this->verifyAdmin();

        $this->image_model->remove_image_by_product($productId);
        $this->favorite_model->remove_favorite_by_product($productId);
        $this->product_model->remove_product($productId);
        $this->session->set_flashdata('message', 'Produto removido com sucesso.');
        redirect('/admin/products', 'refresh');
    }

    public function users() {
        $this->verifyAdmin();

        $data['users'] = $this->user_model->list_user();
        $this->renderPage('admin/users', $data);
    }

    public function disable_user($id) {
        $this->verifyAdmin();

        $data['users'] = $this->user_model->change_user_status($id, FALSE);

        $this->session->set_flashdata('message', 'Usuário desabilitado com sucesso.');
        redirect('/admin/users', 'refresh');
    }

    public function enable_user($id) {
        $this->verifyAdmin();

        $data['users'] = $this->user_model->change_user_status($id, TRUE);

        $this->session->set_flashdata('message', 'Usuário habilitado com sucesso.');
        redirect('/admin/users', 'refresh');
    }

    private function readProduct() {

        $product = array(
            'sku' => $this->input->post('sku'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price')
        );

        $this->setInputRules();

        return $product;
    }

    private function setInputRules() {

        $this->form_validation->set_rules('sku', 'Sku', 'trim|required');
        $this->form_validation->set_rules('name', 'Nome', 'trim|required');
        $this->form_validation->set_rules('price', 'Preço', 'trim|required');

    }

    private function renderPage($page, $data) {
        $this->load->view('templates/header_admin', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer_admin', $data);
    }

    private function verifyAdmin() {
        $userdata = $this->session->userdata();

        if (!isset($userdata['logged_in']) || !$userdata['logged_in'] || ($userdata['profile'] != "ADMIN")) {
            $this->session->set_flashdata('error_message', 'Usuário não autorizado.');
            redirect('/', 'refresh');
        }
    }
}