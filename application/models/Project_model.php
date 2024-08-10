<?php
class Project_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_projects() {
        return $this->db->get('projects')->result();
    }

    public function create_project($data) {
        $sql = "INSERT INTO projects (name, description) VALUES (?, ?)";
        return $this->db->query($sql, array($data['name'], $data['description']));
    }

    public function get_project($project_id) {
        $sql = "SELECT * FROM projects WHERE id = ?";
        return $this->db->query($sql, array($project_id))->row();
    }

    public function update_project($project_id, $data) {
        $sql = "UPDATE projects SET name = ?, description = ? WHERE id = ?";
        return $this->db->query($sql, array($data['name'], $data['description'], $project_id));
    }

    public function delete_project($project_id) {
        $sql = "DELETE FROM projects WHERE id = ?";
        return $this->db->query($sql, array($project_id));
    }

    public function get_projects_by_user($user_id) {
        $sql = "SELECT * FROM projects WHERE user_id = ?";
        return $this->db->query($sql, array($user_id))->result();
    }
}