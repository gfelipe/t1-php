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
            $this->renderPage('login/index', []);
        }

    }

    public function doLogin() {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->user_model->find_user($email, $password);

        if ($user) {
            if ($user['enabled']) {
                $sessionUser = array('user' => $user['name'], 'user.id' => $user['id'], 'profile' => $user['profile'], 'logged_in' => true);
                $this->session->set_userdata($sessionUser);
                redirect('/', 'refresh');
            } else {
                $this->session->set_flashdata('error_message', 'Usuário desabilitado.');
                redirect('/login', 'refresh');
            }
        } else {
            $data['error'] = "Usuário ou senha inválidos.";
            $this->renderPage('login/index', $data);
        }
    }

    public function logout() {
        if($this->isUserLogged()) {
            $this->session->sess_destroy();
            redirect('/', 'refresh');
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