<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kanban extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
        $this->load->model('Task_model');
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    private function check_access($project_id)
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('auth/login');
        }

        $project = $this->Project_model->get_project($project_id);
        if (!$project) {
            show_error('Proyek tidak ditemukan.');
        }

        if ($project->user_id != $user_id) {
            show_error('Anda tidak memiliki akses ke proyek ini.');
        }

        return $project;
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('auth/login');
        }
        $data['projects'] = $this->Project_model->get_projects_by_user($user_id);
        $this->load->view('kanban/index', $data);
    }

    public function view($project_id)
    {
        $project = $this->check_access($project_id);

        $data['project_id'] = $project_id;
        $data['project_name'] = $project->name;
        $data['tasks'] = $this->Task_model->get_tasks_by_project($project_id);
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('kanban/view', $data);
    }

    public function create_project()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('kanban/create_project');
        } else {
            $data = [
                'name' => $this->input->post('name', TRUE),
                'description' => $this->input->post('description', TRUE)
            ];

            if ($this->Project_model->create_project($data)) {
                redirect('kanban/index');
            } else {
                show_error('Gagal menyimpan data proyek.');
            }
        }
    }

    public function edit_project($project_id)
    {
        $project = $this->check_access($project_id);
        $data['project'] = $project;
        $this->load->view('kanban/edit_project', $data);
    }

    public function update_project()
    {
        $project_id = $this->input->post('project_id');
        $data = [
            'name' => $this->input->post('name', TRUE),
            'description' => $this->input->post('description', TRUE)
        ];

        $this->Project_model->update_project($project_id, $data);
        redirect('kanban/index');
    }

    public function delete_project($project_id)
    {
        $this->check_access($project_id);

        $this->Task_model->delete_tasks_by_project($project_id);

        $this->Project_model->delete_project($project_id);
        redirect('kanban/index');
    }

    public function create_task()
    {
        $data = [
            'project_id' => $this->input->post('project_id', TRUE),
            'title' => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE),
            'status' => 'task'
        ];

        if ($this->Task_model->create_task($data)) {
            log_message('debug', 'Task created successfully');
        } else {
            log_message('error', 'Failed to create task');
        }

        redirect('kanban/view/' . $data['project_id']);
    }

    public function update_task_status()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $task_id = $input['task_id'];
        $status = $input['status'];
        $this->Task_model->update_task_status($task_id, $status);
    }

    public function edit_task($task_id)
    {
        $task = $this->Task_model->get_task($task_id);
        $this->check_access($task->project_id);
        $data['task'] = $task;
        $this->load->view('kanban/edit_task', $data);
    }

    public function update_task()
    {
        $task_id = $this->input->post('task_id');
        $data = [
            'title' => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE),
            'status' => $this->input->post('status', TRUE)
        ];

        $this->Task_model->update_task($task_id, $data);
        redirect('kanban/view/' . $this->input->post('project_id'));
    }

    public function delete_task($task_id)
    {
        $task = $this->Task_model->get_task($task_id);
        $this->check_access($task->project_id);
        $this->Task_model->delete_task($task_id);
        redirect('kanban/view/' . $task->project_id);
    }

    public function add_member()
    {
        $data = [
            'project_id' => $this->input->post('project_id', TRUE),
            'user_id' => $this->input->post('user_id', TRUE)
        ];

        if ($this->Team_model->add_member($data)) {
            redirect('kanban/view/' . $data['project_id']);
        } else {
            show_error('Gagal menambahkan anggota tim.');
        }
    }

    public function search_users()
    {
        $term = $this->input->get('q', TRUE);
        log_message('info', 'Mencari pengguna dengan term: ' . $term);
        $users = $this->User_model->search_users($term);
        $results = [];
        foreach ($users as $user) {
            $results[] = ['id' => $user->id, 'text' => $user->username];
        }
        log_message('info', 'Hasil pencarian pengguna: ' . json_encode($results));
        echo json_encode($results);
    }
}
?>