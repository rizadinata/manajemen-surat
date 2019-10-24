<?php
	class Mrole extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getrole($cari) {
	   		if ($cari != "") {
				$this->db->like("id_role",$cari);
				$this->db->or_like("nama_role",$cari);
			}
	   		$q = $this->db->get('role');
	   		return $q;
	   	}

	   	function getroledetail($id) {
	   		$this->db->where('id_role',$id);
	   		$q = $this->db->get('role');
	   		return $q->row();
	   	}

	   	function simpan_role($aksi) {
	   		$data = array(
	   					'nama_role'  => $this->input->post('nama_role'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('role', $data);
					return "success-Data Role berhasil disimpan";
					break;
				case 'ubah':
					$this->db->where('id_role', $this->input->post('idlama'));
					$this->db->update('role', $data);
					return "success-Data Role berhasil diubah";
					break;
			}
			
			return "success-Data Role berhasil disimpan";
	   	}

	   	function hapus_role($id) {
	   		$this->db->where('id_role',$id);
	   		$this->db->delete('role');
	   		return "danger-Data Role berhasil di hapus";
	   	}
	}
?>