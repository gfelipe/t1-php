<?php
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('product_model');
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

        // TODO

        $this->session->set_flashdata('message', 'Produto criado com sucesso.');
        redirect('/admin/products', 'refresh');
    }

    public function edit_product($id) {
        $this->verifyAdmin();

        $data['product'] = $this->product_model->get_product($id);
        $this->renderPage('admin/edit_product', $data);
    }

    public function update_product() {
        $this->verifyAdmin();

        // TODO

        $this->session->set_flashdata('message', 'Produto editado com sucesso.');
        redirect('/admin/products', 'refresh');
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