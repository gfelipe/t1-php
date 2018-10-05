<?php
class Order_model extends CI_Model {

    public function get_orders($userId) {
        $query = $this->db->get_where('user_order', array('user_id' => $userId));
        return $query->row_array();
    }
}