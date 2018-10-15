<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('order_model');
        $this->load->model('product_model');
        $this->load->model('item_model');
    }

    public function register() {
        $data['user'] = array();
        $this->renderPage('user/register', $data);
    }

    public function save() {
        $this->load->library('form_validation');

        $user = $this->readUser(true);

        if ($this->form_validation->run() == TRUE) {
            try {
                $result = $this->user_model->save_user($user);

                if ($result['code'] == 0) {
                    redirect('/login', 'refresh');
                } else {

                }

            } catch (Exception $e) {
                echo $e;
            }
        } else {
            $data['user'] = $user;
            $this->renderPage('user/register', $data);
        }

    }

    public function edit() {
        $data['userdata'] = $this->session->userdata();

        $data['user'] = $this->user_model->get_user($data['userdata']['user.id']);

        $this->renderPage('user/edit', $data);
    }

    public function update() {
        $this->load->library('form_validation');

        $data['userdata'] = $this->session->userdata();
        $data['user'] = $this->user_model->get_user($data['userdata']['user.id']);

        $user = $this->readUser(false);

        if ($this->form_validation->run() == TRUE) {
            $data['user'] = $this->user_model->update_user($user['id'], $user);
            redirect('/', 'refresh');
        } else {
            $this->renderPage('user/edit', $data);
        }

    }

    public function orders() {
        $data['userdata'] = $this->session->userdata();
        $orders = $this->order_model->get_orders($data['userdata']['user.id']);

        foreach($orders as &$order) {
            $item = $this->item_model->get_item($order['item_id']);
            $order['item'] = $item['name'];
            $order['amount'] = $item['price'];

        }
        $data['orders'] = $orders;

        $this->renderPage('user/orders', $data);
    }

    private function readUser($register) {

        $user = array(
            'name' => trim($this->input->post('name')) ? trim($this->input->post('name')) : NULL,
            'email' => trim($this->input->post('email')) ? $this->input->post('email') : NULL,
            'cpf' => trim($this->input->post('cpf')) ? str_replace("-", "", str_replace(".", "", $this->input->post('cpf'))) : NULL,
            'birthday' => trim($this->input->post('birthday')) ? $this->input->post('birthday') : NULL,
            'address' => trim($this->input->post('address')) ? $this->input->post('address') : NULL,
            'zipCode' => trim($this->input->post('zipCode')) ? $this->input->post('zipCode') : NULL,
            'number' => trim($this->input->post('number')) ? $this->input->post('number') : NULL,
            'complement' => trim($this->input->post('complement')) ? $this->input->post('complement') : NULL,
            'neighborhood' => trim($this->input->post('neighborhood')) ? $this->input->post('neighborhood') : NULL,
            'city' => trim($this->input->post('city')) ? $this->input->post('city') : NULL,
            'state' => trim($this->input->post('state')) ? $this->input->post('state') : NULL
        );

        if ($register) {
            $user['password'] = trim($this->input->post('password')) ? $this->input->post('password') : NULL;
        }

        $this->setInputRules($register);

        return $user;
    }

    private function setInputRules($register) {

        $this->form_validation->set_rules('name', 'nome', 'trim|required');
        $this->form_validation->set_rules('cpf', 'cpf', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('birthday', 'nascimento', 'trim|required');

        if ($register) {
            $this->form_validation->set_rules('password', 'senha', 'trim|required|matches[passwordConfirmation]');
            $this->form_validation->set_rules('passwordConfirmation', 'confirmação senha', 'trim|required');
        }
    }

    private function renderPage($page, $data) {
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }
}