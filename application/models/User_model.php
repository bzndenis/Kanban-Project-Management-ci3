<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register($data) {
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        return $this->db->query($sql, array($data['username'], $data['password']));
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        return $this->db->query($sql, array($username, md5($password)))->row();
    }

    public function is_username_exists($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $query = $this->db->query($sql, array($username));
        return $query->num_rows() > 0;
    }

    public function get_all_users() {
        return $this->db->get('users')->result();
    }

    public function search_users($term) {
        $sql = "SELECT * FROM users WHERE username LIKE ?";
        $query = $this->db->query($sql, array('%' . $term . '%'));
        return $query->result();
    }
}
?>