<?php
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('image_model');
    }

    public function view($page='home') {

        $data['userdata'] = $this->session->userdata();
        $products = $this->product_model->get_product();

        foreach($products as &$product) {
            $images = $this->image_model->find_images(array('product_id' => $product['id']));
            if($images) {
                $product['image'] = $images[0]['src'];
            }
        }
        $data['products'] = $products;

        $this->renderPage('pages/home', $data);
    }

    private function renderPage($page, $data) {
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }
}