<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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

	public function index()
	{	$row = $this->db->get_where('tabel_siswa', array('id' => $this->session->userdata('id'), ))->row();
		$data['siswa'] = $row;
		$data['kelas'] = $this->db->get_where('tabel_kelas',  array('id' => $row->id_kelas, ))->row()->nama;
		$data['mapel'] = $this->db->get('tabel_mapel');
		$data['absen'] = $this->db->get_where('tabel_absen',  array('id_siswa' => $row->id, ))->row();
		$this->load->view('siswa/temp_header');
		$this->load->view('siswa/v_welcome', $data);
		$this->load->view('siswa/temp_footer');
	}

}

/* End of file Welcome.php */
/* Location: ./application/controllers/siswa/Welcome.php */