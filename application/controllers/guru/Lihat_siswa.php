<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_siswa extends CI_Controller {

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

	public function index($id = '')
	{
		$query = $this->db->select('tampung_mapel.id, tampung_mapel.id_kelas, tampung_mapel.id_mapel, tabel_kelas.nama as kelas, tabel_mapel.nama_mapel');
		$query = $this->db->where(array('tampung_mapel.id_guru' => $this->session->userdata('id'), 'tampung_mapel.id' => $id ));
		$query = $this->db->from('tampung_mapel');
		$query = $this->db->join('tabel_kelas', 'tampung_mapel.id_kelas = tabel_kelas.id', 'left');
		$query = $this->db->join('tabel_mapel', 'tampung_mapel.id_mapel = tabel_mapel.id', 'left');
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			redirect('guru/welcome','refresh');
		}
		$row = $query->row();
		$data['id_tampung'] =$row->id;
		$data['id_mapel'] = $row->id_mapel;
		$data['row'] = $row;
		$data['isi'] = $this->db->order_by('nama', 'asc');
		$data['isi'] = $this->db->get_where('tabel_siswa', array('id_kelas' => $row->id_kelas, ));
		$this->load->view('guru/temp_header');
		$this->load->view('guru/v_lihat_siswa', $data);		
		$this->load->view('guru/temp_footer');
	}

}

/* End of file Lihat_siswa.php */
/* Location: ./application/controllers/guru/Lihat_siswa.php */