<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
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
	{
	$data['mapel'] = $this->db->get('tabel_mapel');
	$this->load->view('siswa/temp_header');
	$this->load->view('siswa/v_mapel', $data);
	$this->load->view('siswa/temp_footer');

	}

}