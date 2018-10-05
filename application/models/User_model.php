<?php
class User_model extends CI_Model {

    public function save_user($name, $email, $password) {
        $query = $this->db->insert('user', array('name' => $name, 'email' => $email, 'password' => $password));
        return $query->row_array();
    }

    public function get_user($email, $password) {
        $query = $this->db->get_where('user', array('email' => $email, 'password' => $password));
        return $query->row_array();
    }
}