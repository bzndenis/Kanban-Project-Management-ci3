<?php
class Team_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_member($data) {
        $sql = "INSERT INTO team_members (project_id, user_id) VALUES (?, ?)";
        return $this->db->query($sql, array($data['project_id'], $data['user_id']));
    }

    public function get_members_by_project($project_id) {
        $sql = "SELECT users.id, users.username FROM team_members JOIN users ON team_members.user_id = users.id WHERE team_members.project_id = ?";
        return $this->db->query($sql, array($project_id))->result();
    }
}
?>