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
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // Validasi username tidak sama
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

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function login_process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->User_model->login($username, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            redirect('kanban/index');
        } else {
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }
}
?>