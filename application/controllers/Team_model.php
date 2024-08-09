<?php
class Team_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_member($data) {
        return $this->db->insert('team_members', $data);
    }

    public function get_members_by_project($project_id) {
        $this->db->select('users.id, users.username');
        $this->db->from('team_members');
        $this->db->join('users', 'team_members.user_id = users.id');
        $this->db->where('team_members.project_id', $project_id);
        return $this->db->get()->result();
    }
}
?>