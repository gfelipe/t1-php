<?php
class Favorite_model extends CI_Model {

    public function save_favorite($favorite) {
        return $this->db->insert('favorite', $favorite);
    }

    public function remove_favorite($id) {
        $this->db->where('id', $id);
        return $this->db->delete('favorite');
    }

    public function get_favorites($userId) {
        $query = $this->db->get_where('favorite', array('user_id' => $userId));
        return $query->result_array();
    }
}