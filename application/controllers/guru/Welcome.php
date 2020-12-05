<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	public function index()
	{
		$query = $this->db->select('tampung_mapel.id, tabel_kelas.nama as kelas, tabel_mapel.nama_mapel');
		$query = $this->db->order_by('tabel_kelas.nama', 'asc');
		$query = $this->db->where('tampung_mapel.id_guru', $this->session->userdata('id'));
		$query = $this->db->from('tampung_mapel');
		$query = $this->db->join('tabel_kelas', 'tampung_mapel.id_kelas = tabel_kelas.id', 'left');
		$query = $this->db->join('tabel_mapel', 'tampung_mapel.id_mapel = tabel_mapel.id', 'left');
		$query = $this->db->get();
		$data['isi'] = $query;
		$this->load->view('guru/temp_header');
		$this->load->view('guru/v_kelas', $data);		
		$this->load->view('guru/temp_footer');
	}
	
}

/* End of file Welcome.php */
/* Location: ./application/controllers/guru/Welcome.php */