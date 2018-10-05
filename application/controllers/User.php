<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('order_model');
    }

    public function register() {
        $data = [];

        $this->load->view('templates/header', $data);
        $this->load->view('user/register', $data);
        $this->load->view('templates/footer', $data);
    }

    public function save() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password_confirmation = $this->input->post('password-confirmation');

        if ($password != $password_confirmation) {
            $data['error'] = "A senha não está igual a confirmação.";

            $this->load->view('templates/header', $data);
            $this->load->view('user/register', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->user_model->save_user($name, $email, $password);

            $sessionUser = array('user' => $name, 'logged_in' => true);
            $this->session->set_userdata($sessionUser);

            redirect('/', 'refresh');
        }

    }

    public function edit() {
        $data['userdata'] = $this->session->userdata();

        $data['user'] = $this->user_model->get_user($data['userdata']['user.id']);

        $this->load->view('templates/header', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update() {
        $data['userdata'] = $this->session->userdata();

        $name = $this->input->post('name');
        $email = $this->input->post('email');

        $data['user'] = $this->user_model->update_user($data['userdata']['user.id'], $name, $email);

        redirect('/', 'refresh');
    }

    public function orders() {

        $data['userdata'] = $this->session->userdata();
        $data['orders'] = $this->order_model->get_orders($data['userdata']['user.id']);


        $this->load->view('templates/header', $data);
        $this->load->view('user/orders', $data);
        $this->load->view('templates/footer', $data);
    }

}