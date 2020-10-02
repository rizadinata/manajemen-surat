<?php
	class Msuratkeluar extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getsuratkeluar($cari) {
	   		if ($cari != "") {
				$this->db->like("id_surat_keluar",$cari);
				$this->db->or_like("nama_surat_keluar",$cari);
			}
			$this->db->select('surat_keluar.*, klasifikasi.nama_klasifikasi');
			$this->db->join('klasifikasi', 'klasifikasi.id_klasifikasi = surat_keluar.kode_klasifikasi', 'left');
	   		$q = $this->db->get('surat_keluar');
	   		return $q;
	   	}

	   	function getsuratkeluardetail($id) {
	   		$this->db->where('id_surat_keluar',$id);
	   		$q = $this->db->get('surat_keluar');
	   		return $q->row();
	   	}

	   	function simpan_suratkeluar($aksi) {
	   		$data = array(
	   					'no_surat'  => $this->input->post('no_surat'), 
	   					'no_agenda'  => $this->input->post('no_agenda'), 
	   					'tujuan'  => $this->input->post('tujuan'), 
	   					'isi'  => $this->input->post('isi'), 
	   					'kode_klasifikasi'  => $this->input->post('kode_klasifikasi'), 
	   					'tgl_surat'  => $this->input->post('tgl_surat'), 
	   					'tgl_catat'  => $this->input->post('tgl_catat'), 
	   					'file'  => $this->input->post('file'), 
	   					'keterangan'  => $this->input->post('keterangan'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('surat_keluar', $data);
					return "success-Data Surat Keluar berhasil disimpan";
					break;
				case 'ubah':
					$this->db->where('id_surat_keluar', $this->input->post('idlama'));
					$this->db->update('surat_keluar', $data);
					return "success-Data Surat Keluar berhasil diubah";
					break;
			}
			
			return "success-Data Surat Keluar berhasil disimpan";
	   	}

	   	function hapus_suratkeluar($id) {
	   		$this->db->where('id_surat_keluar',$id);
	   		$this->db->delete('surat_keluar');
	   		return "danger-Data Surat Keluar berhasil di hapus";
	   	}
	}
?>