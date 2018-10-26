<?php
class User_model extends CI_Model {

    public function save_user($user) {
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = FALSE;

        $user['birthday'] = date('Y-m-d', strtotime(str_replace("/", "-", $user['birthday'])));

        $insert = $this->db->insert('user', $user);
        $error = $this->db->error();

        $this->db->db_debug = $db_debug;

        return $error;
    }

    public function update_user($id, $user) {
        $user['birthday'] = date('Y-m-d', strtotime(str_replace("/", "-", $user['birthday'])));

        $this->db->where('id', $id);
        return $this->db->update('user', $user);
    }

    public function change_user_status($id, $enabled) {
        $this->db->where('id', $id);
        return $this->db->update('user', array('enabled' => $enabled));
    }

    public function list_user() {
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(birthday, "%d/%m/%Y") as formattedBirthday', FALSE);
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_user($id) {
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(birthday, "%d/%m/%Y") as formattedBirthday', FALSE);
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }

    public function find_user($email, $password) {
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(birthday, "%d/%m/%Y") as formatted_birthday', FALSE);
        $query = $this->db->get_where('user', array('email' => $email, 'password' => $password));
        return $query->row_array();
    }
}