<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mlogin');
		if (($this->session->userdata('username') != NULL)||($this->session->userdata('password') != NULL)){
           $this->session->sess_destroy();
    	}
    }

	public function index() {
	    // $data["judul"] = '<h3>Dashboard</h3>';
	    // $data["breadcrumb"] = '<h2> Dashboard</h2>';
	    // $data["content"] = "dashboard/vdashboard";
	    $this->load->view('vlogin');
	}
	public function login_process(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($this->Mlogin->ceklogin($username,$password)) {
            redirect('dashboard','refresh');
        }
        else {
            $message = "danger-Gagal login bro...";
            $this->session->set_flashdata("message", $message);
            redirect('login');
        }
	}
	public function logout(){
        $this->session->sess_destroy();
        redirect('login');
	}
}
