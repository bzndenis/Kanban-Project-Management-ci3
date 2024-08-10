<?php
class Task_model extends CI_Model {
    public function get_tasks_by_project($project_id) {
        $sql = "SELECT * FROM tasks WHERE project_id = ?";
        return $this->db->query($sql, array($project_id))->result();
    }

    public function create_task($data) {
        $sql = "INSERT INTO tasks (project_id, title, description, status) VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, array($data['project_id'], $data['title'], $data['description'], $data['status']));
    }

    public function update_task_status($task_id, $status) {
        $sql = "UPDATE tasks SET status = ? WHERE id = ?";
        return $this->db->query($sql, array($status, $task_id));
    }

    public function get_task($task_id) {
        $sql = "SELECT * FROM tasks WHERE id = ?";
        return $this->db->query($sql, array($task_id))->row();
    }

    public function update_task($task_id, $data) {
        $sql = "UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?";
        return $this->db->query($sql, array($data['title'], $data['description'], $data['status'], $task_id));
    }

    public function delete_task($task_id) {
        $sql = "DELETE FROM tasks WHERE id = ?";
        return $this->db->query($sql, array($task_id));
    }

    public function delete_tasks_by_project($project_id) {
        $sql = "DELETE FROM tasks WHERE project_id = ?";
        return $this->db->query($sql, array($project_id));
    }
}
?>