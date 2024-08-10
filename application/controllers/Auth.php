<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function register_process()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            if ($this->User_model->is_username_exists($username)) {
                $this->session->set_flashdata('error', 'Username sudah ada, silakan pilih username lain.');
                redirect('auth/register');
            } else {
                $data = [
                    'username' => $username,
                    'password' => md5($password)
                ];
                $this->User_model->register($data);
                redirect('auth/login');
            }
        }
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function login_process()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $user = $this->User_model->login($username, $password);

            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
                redirect('kanban/index');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('auth/login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }
}
?>