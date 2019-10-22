<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index() {
	    $data["judul"] = '<h3>Dashboard</h3>';
	    $data["breadcrumb"] = '<h2> Dashboard</h2>';
	    $data["content"] = "dashboard/vdashboard";
	    $this->load->view('template',$data);
	}
}
