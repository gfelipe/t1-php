<?php
class Product_model extends CI_Model {

    public function save_product($product) {
        return $this->db->insert('product', $product);
    }

    public function update_product($id, $product) {
        $this->db->where('id', $id);
        return $this->db->update('product', $product);
    }

    public function remove_product($id) {
        $this->db->where('id', $id);
        return $this->db->delete('product');
    }

    public function get_product($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('product');
            return $query->result_array();
        }

        $query = $this->db->get_where('product', array('id' => $id));
        return $query->row_array();
    }
}