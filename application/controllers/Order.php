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
        if($this->isUserLogged()) {
            $data['user'] = $this->user_model->get_user($this->session->userdata()['user.id']);

            $order = $this->order_model->get_order($id);

            $item = $this->item_model->get_item($order['item_id']);
            $data['item'] = $item;
            $order['amount'] = $item['price'];

            $data['order'] = $order;
            $this->renderPage('user/order', $data);
        } else {
            $this->session->set_flashdata('error_message', 'Usuário não logado.');
            redirect('/login', 'refresh');
        }
    }

    public function buy() {
        if($this->isUserLogged()) {
            $user = $this->user_model->get_user($this->session->userdata()['user.id']);

            $product = $this->product_model->get_product($this->input->get('product_id'));

            $item = array(
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
                'product_id' => $product['id'],
            );

            $itemId = $this->item_model->save_item($item);

            $order = array(
                'date_created' => date('Y-m-d'),
                'item_id' => $itemId,
                'user_id' => $user['id'],
                'address' => $user['address'],
                'zipCode' => $user['zipCode'],
                'number' => $user['number'],
                'complement' => $user['complement'],
                'neighborhood' => $user['neighborhood'],
                'city' => $user['city'],
                'state' => $user['state'],
                'status' => 'NEW'
            );

            $this->order_model->save_order($order);

            $this->session->set_flashdata('message', 'Pedido feito com sucesso.');
            redirect('/user/orders', 'refresh');
        } else {
            $this->session->set_flashdata('error_message', 'Usuário não logado.');
            redirect('/login', 'refresh');
        }
    }

    private function renderPage($page, $data) {
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }

    private function isUserLogged() {
        return isset($this->session->userdata()['logged_in']) && $this->session->userdata()['logged_in'];
    }
}