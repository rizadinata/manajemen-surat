<?php
	class Msuratmasuk extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getsuratmasuk($cari) {
	   		if ($cari != "") {
				$this->db->like("id_surat_masuk",$cari);
				$this->db->or_like("nama_surat_masuk",$cari);
			}
			$this->db->select('surat_masuk.*, klasifikasi.nama_klasifikasi');
			$this->db->join('klasifikasi', 'klasifikasi.id_klasifikasi = surat_masuk.kode_klasifikasi', 'left');
	   		$q = $this->db->get('surat_masuk');
	   		return $q;
	   	}

	   	function getsuratmasukdetail($id) {
	   		$this->db->where('id_surat_masuk',$id);
	   		$q = $this->db->get('surat_masuk');
	   		return $q->row();
	   	}

	   	function simpan_suratmasuk($aksi) {
	   		$data = array(
	   					'no_surat'  => $this->input->post('no_surat'), 
	   					'no_agenda'  => $this->input->post('no_agenda'), 
	   					'asal_surat'  => $this->input->post('asal_surat'), 
	   					'isi'  => $this->input->post('isi'), 
	   					'kode_klasifikasi'  => $this->input->post('kode_klasifikasi'), 
	   					'tgl_surat'  => $this->input->post('tgl_surat'), 
	   					'tgl_diterima'  => $this->input->post('tgl_diterima'), 
	   					'file'  => $this->input->post('file'), 
	   					'keterangan'  => $this->input->post('keterangan'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('surat_masuk', $data);
					return "success-Data Surat Masuk berhasil disimpan";
					break;
				case 'ubah':
					$this->db->where('id_surat_masuk', $this->input->post('idlama'));
					$this->db->update('surat_masuk', $data);
					return "success-Data Surat Masuk berhasil diubah";
					break;
			}
			
			return "success-Data Surat Masuk berhasil disimpan";
	   	}

	   	function hapus_suratmasuk($id) {
	   		$this->db->where('id_surat_masuk',$id);
	   		$this->db->delete('surat_masuk');
	   		return "danger-Data Surat Masuk berhasil di hapus";
	   	}

	   	function getdisposisi($id, $cari) {
	   		if ($cari != "") {
				$this->db->like("id_disposisi",$cari);
				$this->db->or_like("id_surat",$cari);
			}
			$this->db->select('disposisi.*, surat_masuk.no_surat');
			$this->db->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi.id_surat', 'left');
			$this->db->where('id_surat',$id);
	   		$q = $this->db->get('disposisi');
	   		return $q;
	   	}

	   	function getdisposisidetail($id) {
	   		$this->db->where('id_disposisi',$id);
	   		$q = $this->db->get('disposisi');
	   		return $q->row();
	   	}

	   	function simpan_disposisi($aksi) {
	   		$data = array(
	   					'id_surat'  => $this->input->post('id_surat'), 
	   					'tujuan'  => $this->input->post('tujuan'), 
	   					'isi_disposisi'  => $this->input->post('isi_disposisi'), 
	   					'id_sifat'  => $this->input->post('id_sifat'), 
	   					'batas_waktu'  => $this->input->post('batas_waktu'), 
	   					'catatan'  => $this->input->post('catatan'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('disposisi', $data);
					return "success-Data Disposisi Surat berhasil disimpan";
					break;
				case 'ubah':
					$this->db->where('id_disposisi', $this->input->post('idlama'));
					$this->db->update('disposisi', $data);
					return "success-Data Disposisi Surat berhasil diubah";
					break;
			}
			
			return "success-Data Disposisi Surat berhasil disimpan";
	   	}


	   	function hapus_disposisi($id) {
	   		$this->db->where('id_disposisi',$id);
	   		$this->db->delete('disposisi');
	   		return "danger-Data Disposisi Surat berhasil di hapus";
	   	}
	}
?>