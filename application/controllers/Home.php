<?php
defined('BASEPATH') or exit('No direct script access allowed');

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        // Cek apakah user sudah login
        if ($this->session->userdata('user_id')) {
            // Jika sudah login, redirect ke kanban/index
            redirect('kanban/index');
        } else {
            // Jika belum login, tampilkan halaman home
            $this->load->view('home');
        }
    }
}