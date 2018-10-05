<?php
class Product extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('product_model');
        }

        public function index() {
            $data['products'] = $this->product_model->get_product();
            $data['title'] = 'Produtos';

            $this->load->view('product/index', $data);
        }

        public function view($id = NULL) {
            $data['product'] = $this->product_model->get_product($id);
            
            if (empty($data['product'])) {
                    show_404();
            }

            $data['title'] = $data['product']['name'];

            $this->load->view('product/view', $data);
        }

        public function teste() {
            echo "teste ok!";
        }
}