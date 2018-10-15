<?php
class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('order_model');
        $this->load->model('product_model');
        $this->load->model('item_model');
    }

    public function view($id) {
        $data['userdata'] = $this->session->userdata();
        $data['user'] = $this->user_model->get_user($data['userdata']['user.id']);

        $order = $this->order_model->get_order($id);

        $item = $this->item_model->get_item($order['item_id']);
        $data['item'] = $item;
        $order['amount'] = $item['price'];

        $data['order'] = $order;


        $this->renderPage('user/order', $data);
    }

    private function renderPage($page, $data) {
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }
}