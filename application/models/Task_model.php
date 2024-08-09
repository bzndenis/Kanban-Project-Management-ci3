<?php
class Task_model extends CI_Model {
    public function get_tasks_by_project($project_id) {
        $this->db->where('project_id', $project_id);
        return $this->db->get('tasks')->result(); // Mengembalikan objek
    }

    public function create_task($data) {
        return $this->db->insert('tasks', $data);
    }

    public function update_task_status($task_id, $status) {
        $this->db->where('id', $task_id);
        return $this->db->update('tasks', ['status' => $status]);
    }

    public function get_task($task_id) {
        $this->db->where('id', $task_id);
        return $this->db->get('tasks')->row();
    }

    public function update_task($task_id, $data) {
        $this->db->where('id', $task_id);
        return $this->db->update('tasks', $data);
    }

    public function delete_task($task_id) {
        $this->db->where('id', $task_id);
        return $this->db->delete('tasks');
    }

    public function delete_tasks_by_project($project_id) {
        $this->db->where('project_id', $project_id);
        return $this->db->delete('tasks');
    }
}
?>