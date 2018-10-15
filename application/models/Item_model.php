<?php
class Item_model extends CI_Model {

    public function get_item($id) {
        $query = $this->db->get_where('item', array('id'=> $id));
        return $query->row_array();
    }
}