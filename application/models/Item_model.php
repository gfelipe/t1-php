<?php
class Item_model extends CI_Model {

    public function get_item($id) {
        $query = $this->db->get_where('item', array('id'=> $id));
        return $query->row_array();
    }

    public function save_item($item) {
        $this->db->insert('item', $item);
        return $this->db->insert_id();
    }
}