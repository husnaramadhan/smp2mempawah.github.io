<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('guru_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('You Must Login!');";
			echo 'window.location.assign("'.site_url("").'")
			</script>';
			// redirect('admin/welcome');
		}
	}

	public function index($id_mapel = '', $id_siswa = '')
	{
		$this->cek_halaman($id_mapel, $id_siswa);
		$data['id_mapel'] = $id_mapel;
		$data['id_siswa'] = $id_siswa;
		$data['siswa'] = $this->db->get_where('tabel_siswa',  array('id' => $id_siswa, ))->row();
		$data['mapel'] = $this->db->get_where('tabel_mapel',  array('id' => $id_mapel, ))->row();
		$this->load->view('guru/temp_header');
		$this->load->view('guru/v_tambah_nilai',$data);		
		$this->load->view('guru/temp_footer');
	}

	private function cek_halaman($id_mapel = '', $id_siswa = '')
	{
		$cek_siswa = $this->db->get_where('tabel_siswa',  array('id' => $id_siswa, ));
		if ($cek_siswa->num_rows() == 0) {
			redirect('guru','refresh');
			exit();
		}
		$row = $cek_siswa->row();
		$cek_mengampu = $this->db->get_where('tampung_mapel', array('id_guru' => $this->session->userdata('id'), 'id_mapel' => $id_mapel, 'id_kelas' => $row->id_kelas ));
		if ($cek_mengampu->num_rows() == 0) {
			redirect('guru','refresh');
			exit();
		}
	}

	public function proses()
	{	
		$id_mapel = $this->input->post('id_mapel');
		$id_siswa = $this->input->post('id_siswa');
		if ($this->input->post('jenis') == 'Mid') {
			$cek = $this->db->get_where('tabel_nilai', array('id_mapel' => $id_mapel, 'id_siswa' => $id_siswa, 'jenis' => 'Mid', ));
			if ($cek->num_rows() == 1) {
				redirect('guru/lihat_nilai/index/'.$id_mapel.'/'.$id_siswa,'refresh');
				exit();
			}
		}elseif ($this->input->post('jenis') == 'Ulangan Umum') {
			$cek = $this->db->get_where('tabel_nilai', array('id_mapel' => $id_mapel, 'id_siswa' => $id_siswa, 'jenis' => 'Ulangan Umum', ));
			if ($cek->num_rows() == 1) {
				redirect('guru/lihat_nilai/index/'.$id_mapel.'/'.$id_siswa,'refresh');
				exit();
			}
		}
		$object = array(
			'id_mapel' => $this->input->post('id_mapel'), 
			'id_siswa' => $this->input->post('id_siswa'), 
			'nilai' => $this->input->post('nilai'), 
			'jenis' => $this->input->post('jenis'), 
		);
		$this->db->insert('tabel_nilai', $object);
		redirect('guru/lihat_nilai/index/'.$id_mapel.'/'.$id_siswa,'refresh');
	}

}