<?php
	class Muser extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getuser($cari) {
	   		if ($cari != "") {
				$this->db->like("id_user",$cari);
				$this->db->or_like("nama_user",$cari);
			}
			$this->db->select('user.*, jabatan.nama_jabatan, role.nama_role');
			$this->db->join('role', 'role.id_role = user.id_role', 'left');
			$this->db->join('jabatan', 'jabatan.id_jabatan = user.id_jabatan', 'left');
	   		$q = $this->db->get('user');
	   		return $q;
	   	}

	   	function getuserdetail($id) {
	   		$this->db->where('id_user',$id);
	   		$q = $this->db->get('user');
	   		return $q->row();
	   	}

	   	function simpan_user($aksi) {


			switch ($aksi) {
				case 'simpan':
					$data = array(
		   					'nik'  => $this->input->post('nik'), 
		   					'nama_user'  => $this->input->post('nama_user'), 
		   					'password'  => $this->input->post('password'), 
		   					'foto'  => $this->input->post('foto'), 
		   					'id_jabatan'  => $this->input->post('id_jabatan'), 
		   					'id_role'  => $this->input->post('id_role'), 
					);
					$this->db->insert('user', $data);
					return "success-Data User berhasil disimpan";
					break;
				case 'ubah':
					$data = array(
		   					'nik'  => $this->input->post('nik'), 
		   					'nama_user'  => $this->input->post('nama_user'), 
		   					'foto'  => $this->input->post('foto'), 
		   					'id_jabatan'  => $this->input->post('id_jabatan'), 
		   					'id_role'  => $this->input->post('id_role'), 
					);
					$this->db->where('id_user', $this->input->post('idlama'));
					$this->db->update('user', $data);
					return "success-Data User berhasil diubah";
					break;
			}
			
			return "success-Data User berhasil disimpan";
	   	}

	   	function hapus_user($id) {
	   		$this->db->where('id_user',$id);
	   		$this->db->delete('user');
	   		return "danger-Data User berhasil di hapus";
	   	}
	}
?>