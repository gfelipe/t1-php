<?php
class Image_model extends CI_Model {

    public function save_image($image) {
        return $this->db->insert('image', $image);
    }

    public function remove_image($id) {
        $this->db->where('id', $id);
        return $this->db->delete('image');
    }

    public function remove_image_by_product($id) {
        $this->db->where('product_id', $id);
        return $this->db->delete('image');
    }

    public function find_images($query) {
        $query = $this->db->get_where('image', $query);
        return $query->result_array();
    }

    public function get_image($id) {
        $query = $this->db->get_where('image', array('id' => $id));
        return $query->row_array();
    }
}