<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mrole');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}

	public function index() {
	    $data["judul"] = '<h3>Role</h3>';
	    $data["breadcrumb"] = '<h2> Role</h2>';
	    $data["menu"] = "user";
	    $data["content"] = "user/role/vrole";
	    $data["row"] = $this->Mrole->getrole("");
	    $this->load->view('template',$data);
	}

	public function formrole($id = 0) {
	    $data["judul"] = '<h3>Form Role</h3>';
	    $data["breadcrumb"] = '<h2>Form  Role</h2>';
	    $data["menu"] = "user";
	    $data["content"] = "user/role/vformrole";
	    $data["row"] = $this->Mrole->getroledetail($id);
	    $this->load->view('template',$data);
	}

	public function hapus_role($id){
        $message = $this->Mrole->hapus_role($id);
        //$this->session->set_flashdata("message",$message);
        redirect("role");
    }

	public function simpan_role($action){
        $message = $this->Mrole->simpan_role($action);
       // $this->session->set_flashdata("message",$message);
        redirect("role");
    }
}
