<?php
class Product_model extends CI_Model {

    public function get_product($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('product');
            return $query->result_array();
        }

        $query = $this->db->get_where('product', array('id' => $id));
        return $query->row_array();
    }
}