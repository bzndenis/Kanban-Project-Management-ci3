<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register($data) {
        return $this->db->insert('users', $data);
    }

    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get('users')->row();
    }

    // Tambahkan metode ini
    public function is_username_exists($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }

    public function get_all_users() {
        return $this->db->get('users')->result();
    }

    public function search_users($term) {
        $this->db->like('username', $term);
        $query = $this->db->get('users');
        return $query->result();
    }
}