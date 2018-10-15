<?php
class Pages extends CI_Controller {
    public function view($page='home') {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['userdata'] = $this->session->userdata();


        $this->renderPage('pages/'.$page, $data);

    }

    private function renderPage($page, $data) {
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }
}