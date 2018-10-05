<?php
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $userdata = $this->session->userdata();

        if (isset($userdata['logged_in']) && $userdata['logged_in']) {
            redirect('/', 'refresh');
        } else {
            $data = (object)[];
            $this->load->view('templates/header', $data);
            $this->load->view('login/index', $data);
            $this->load->view('templates/footer', $data);
        }

    }

    public function doLogin() {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->user_model->get_user($email, $password);

        if ($user) {
            $sessionUser = array('user' => $user['name'], 'logged_in' => true);
            $this->session->set_userdata($sessionUser);
            redirect('/', 'refresh');
        } else {
            $data['error'] = "Usuário ou senha inválidos.";

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