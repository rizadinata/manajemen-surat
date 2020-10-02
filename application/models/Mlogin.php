<?php 
	class Mlogin extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function ceklogin($username,$password){
			$this->db->where('nik',$username);
			//$this->db->where('password', md5($password));
			$this->db->where('password', $password);
	   		$q = $this->db->get('user');
	   		$row = $q->row();
            if ($q->num_rows() > 0){
                $userdata = array (
                        'username' => $username,
                        'password' => $password,
                        'foto' 		=> "foto",
                        'id_role' 		=> $row->id_role,
						'nama_user' => $row->nama_user
                        );
                $q->free_result();
                $this->session->set_userdata($userdata);
                return TRUE;
            } else return FALSE;
		}
	}
?>