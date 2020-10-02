<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Muser');
	    $this->load->Model('Mrole');
	    $this->load->Model('Mjabatan');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}

	public function index() {
	    $data["judul"] = '<h3>User</h3>';
	    $data["breadcrumb"] = '<h2> User</h2>';
	    $data["menu"] = "user";
	    $data["content"] = "user/user/vuser";
	    $data["row"] = $this->Muser->getuser("");
	    $this->load->view('template',$data);
	}

	public function formuser($id = 0) {
	    $data["judul"] = '<h3>Form User</h3>';
	    $data["breadcrumb"] = '<h2>Form  User</h2>';
	    $data["menu"] = "user";
	    $data["content"] = "user/user/vformuser";
	    $data["row"] = $this->Muser->getuserdetail($id);
	    $data["jabatan"] = $this->Mjabatan->getjabatan("");
	    $data["role"] = $this->Mrole->getrole("");
	    $this->load->view('template',$data);
	}

	public function hapus_user($id){
        $message = $this->Muser->hapus_user($id);
        redirect("user");
    }

	public function simpan_user($action){
        $message = $this->Muser->simpan_user($action);
        redirect("user");
    }
}
