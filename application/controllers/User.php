<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
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

        }

    }

    public function edit() {
        $this->load->view('templates/header', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update() {
        $this->load->view('templates/header', $data);
        $this->load->view('login/index', $data);
        $this->load->view('templates/footer', $data);
    }



    public function orders() {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->user_model->get_user($email, $password);

        if ($user) {
            $sessionUser = array('user' => $user['name'], 'logged_in' => true);
            $this->session->set_userdata($sessionUser);
            redirect('/', 'refresh');
        } else {

            $data['error'] = true;
            $data['errorMsg'] = "Usuário ou senha inválidos.";

            $this->load->view('templates/header', $data);
            $this->load->view('login/index', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }

}