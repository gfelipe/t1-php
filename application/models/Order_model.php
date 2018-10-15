<?php
class Order_model extends CI_Model {

    public function get_order($id) {
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(date_created, "%d/%m/%Y") as purchaseDate', FALSE);
        $query = $this->db->get_where('user_order', array('id' => $id));
        return $query->row_array();
    }

    public function get_orders($userId) {
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(date_created, "%d/%m/%Y") as purchaseDate', FALSE);
        $query = $this->db->get_where('user_order', array('user_id' => $userId));
        return $query->result_array();
    }
}