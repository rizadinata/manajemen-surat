<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    if (($this->session->userdata('username') == NULL) || ($this->session->userdata('id_role') == NULL) || ($this->session->userdata('nama_user') == NULL))
	    {
	           redirect("login/logout","refresh");
	    }
	}

	public function index() {
	    $data["judul"] = '<h3>Dashboard</h3>';
	    $data["breadcrumb"] = '<h2> Dashboard</h2>';
	    $data["content"] = "dashboard/vdashboard";
	    $this->load->view('template',$data);
	}
}
