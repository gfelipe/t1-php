<?php
class Product extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('product_model');
            $this->load->model('favorite_model');
        }

        public function view($id) {
            $data['product'] = $this->product_model->get_product($id);
            
            if (empty($data['product'])) {
                    show_404();
            }

            $data['title'] = $data['product']['name'];

            $this->load->view('product/view', $data);
        }

        public function favorite($id) {
            $data['userdata'] = $this->session->userdata();

            $favorite = array(
                'user_id' => $data['userdata']['user.id'],
                'product_id' => $id
            );

            $this->favorite_model->save_favorite($favorite);

            $this->session->set_flashdata('message', 'Produto adicionado com sucesso aos favoritos.');
            redirect('/user/favorites', 'refresh');
        }

        public function remove_favorite($id) {
            $this->favorite_model->remove_favorite($id);
            $this->session->set_flashdata('message', 'Produto removido com sucesso dos favoritos.');
            redirect('/user/favorites', 'refresh');
        }

}