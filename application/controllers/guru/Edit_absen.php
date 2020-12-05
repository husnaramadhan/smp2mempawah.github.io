<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_absen extends CI_Controller {

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

	public function index($id_tampung = '', $id_siswa = '')
	{
		$cek = $this->db->get_where('tampung_mapel',  array('id' => $id_tampung, 'id_guru' => $this->session->userdata('id') ));
		if ($cek->num_rows() == 0) {
			redirect('guru','refresh');
			exit();
		}
		$siswa = $this->db->get_where('tabel_siswa',  array('id' => $id_siswa,));
		if ($siswa->num_rows() == 0) {
			redirect('guru/lihat_siswa/index/'.$id_tampung,'refresh');
			exit();
		}

		$absen = $this->db->get_where('tabel_absen',  array('id_siswa' => $id_siswa,));
		if ($siswa->num_rows() == 0) {
			redirect('guru/lihat_siswa/index/'.$id_tampung,'refresh');
			exit();
		}
		$data['id_siswa'] = $id_siswa;
		$data['id_tampung'] = $id_tampung;
		$data['siswa'] = $siswa->row();
		$data['absen'] = $absen->row();
		$this->load->view('guru/temp_header');
		$this->load->view('guru/v_edit_absen', $data);		
		$this->load->view('guru/temp_footer');
	}

	public function proses()
	{
		$id_tampung = $this->input->post('id_tampung');
		$where  = array('id_siswa' => $this->input->post('id_siswa'), );
		$object = array(
			'alpha' => $this->input->post('alpha'), 
			'izin' => $this->input->post('izin'), 
			'sakit' => $this->input->post('sakit'), 
		);
		$this->db->update('tabel_absen', $object, $where);
		redirect('guru/lihat_siswa/index/'.$id_tampung,'refresh');
	}

}