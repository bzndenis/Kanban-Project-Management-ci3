<?php
class Project_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Pastikan database dimuat di sini
    }

    public function get_all_projects() {
        return $this->db->get('projects')->result();
    }

    public function create_project($data) {
        return $this->db->insert('projects', $data);
    }

    public function get_project($project_id) {
        $this->db->where('id', $project_id);
        return $this->db->get('projects')->row();
    }

    public function update_project($project_id, $data) {
        $this->db->where('id', $project_id);
        return $this->db->update('projects', $data);
    }

    public function delete_project($project_id) {
        $this->db->where('id', $project_id);
        return $this->db->delete('projects');
    }

    public function get_projects_by_user($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->get('projects')->result();
    }
}
?>