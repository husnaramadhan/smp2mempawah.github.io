<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('siswa_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('You Must Login!');";
			echo 'window.location.assign("'.site_url("").'")
			</script>';
			// redirect('admin/welcome');
		}
	}

	public function index($id_mapel ='')
	{
		$cek = $this->db->get_where('tabel_mapel', array('id' => $id_mapel, ));
		if ($cek->num_rows() == 0) {
			redirect('siswa','refresh');
		}
		$data['mapel'] = $cek->row();
		$id_siswa = $this->session->userdata('id');
		$data['tugas'] = $this->db->get_where('tabel_nilai', array('jenis' => 'Tugas', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel ));
		$data['ulangan_harian'] = $this->db->get_where('tabel_nilai', array('jenis' => 'Ulangan Harian', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel ));
		$data['mid'] = $this->db->get_where('tabel_nilai', array('jenis' => 'Mid', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel));
		$data['ulangan_umum'] = $this->db->get_where('tabel_nilai', array('jenis' => 'Ulangan Umum', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel));
		$this->load->view('siswa/temp_header');
		$this->load->view('siswa/v_nilai', $data);
		$this->load->view('siswa/temp_footer');

	}

}