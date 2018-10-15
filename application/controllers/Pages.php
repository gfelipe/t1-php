<?php
class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function view($page='home') {

        $data['userdata'] = $this->session->userdata();
        $data['products'] = $this->product_model->get_product();

        $this->renderPage('pages/home', $data);
    }

    private function renderPage($page, $data) {
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }
}