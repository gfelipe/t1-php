<?php
class User_model extends CI_Model {

    public function save_user($name, $email, $password) {
        return $this->db->insert('user', array('name' => $name, 'email' => $email, 'password' => $password));
    }

    public function update_user($id, $name, $email) {
        $this->db->where('id', $id);
        return $this->db->update('user', array('name' => $name, 'email' => $email));
    }

    public function get_user($id) {
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }

    public function find_user($email, $password) {
        $query = $this->db->get_where('user', array('email' => $email, 'password' => $password));
        return $query->row_array();
    }
}