<?php
class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('favorite_model');
    }

    public function view($id) {
        $data['product'] = $this->product_model->get_product($id);

        if (empty($data['product'])) {
                show_404();
        }

        $data['title'] = $data['product']['name'];

        $this->load->view('product/view', $data);
    }

    public function favorite($id) {
        if($this->isUserLogged()) {

            $favorite = array(
                'user_id' => $this->session->userdata()['user.id'],
                'product_id' => $id
            );

            if ($this->favorite_model->find_favorite($favorite)) {
                $this->session->set_flashdata('warning_message', 'Produto já está nos favoritos.');
                redirect('/user/favorites', 'refresh');
            } else {
                $this->favorite_model->save_favorite($favorite);

                $this->session->set_flashdata('message', 'Produto adicionado com sucesso aos favoritos.');
                redirect('/user/favorites', 'refresh');
            }

        } else {
            $this->session->set_flashdata('error_message', 'Usuário não logado.');
            redirect('/login', 'refresh');
        }
    }

    public function remove_favorite($id) {
        if($this->isUserLogged()) {
            $this->favorite_model->remove_favorite($id);
            $this->session->set_flashdata('message', 'Produto removido com sucesso dos favoritos.');
            redirect('/user/favorites', 'refresh');
        } else {
            $this->session->set_flashdata('error_message', 'Usuário não logado.');
            redirect('/login', 'refresh');
        }
    }

    private function isUserLogged() {
        return isset($this->session->userdata()['logged_in']) && $this->session->userdata()['logged_in'];
    }
}