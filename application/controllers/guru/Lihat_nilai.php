<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_nilai extends CI_Controller {

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
		$data['tugas'] = $this->db->get_where('tabel_nilai', array('jenis' => 'Tugas', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel ));
		$data['ulangan_harian'] = $this->db->get_where('tabel_nilai', array('jenis' => 'Ulangan Harian', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel ));
		$data['mid'] = $this->db->get_where('tabel_nilai', array('jenis' => 'Mid', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel));
		$data['ulangan_umum'] = $this->db->get_where('tabel_nilai', array('jenis' => 'Ulangan Umum', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel));
		$this->load->view('guru/temp_header');
		$this->load->view('guru/v_lihat_nilai', $data);		
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

	public function hapus($id_mapel = '', $id_siswa = '', $id = '')
	{
		$where = array('id' => $id, );
		$this->db->delete('tabel_nilai', $where);
		redirect('guru/lihat_nilai/index/'.$id_mapel.'/'.$id_siswa,'refresh');	
	}

	public function edit($id = '')
	{
		$cek = $this->db->get_where('tabel_nilai',  array('id' => $id, ));
		if ($cek->num_rows() == 0) {
			redirect('guru','refresh');
			exit();
		}
		$row = $cek->row();
		$id_mapel = $row->id_mapel;
		$id_siswa = $row->id_siswa;
		$this->cek_halaman($id_mapel, $id_siswa);
		$data['id_mapel'] = $id_mapel;
		$data['id_siswa'] = $id_siswa;
		$data['siswa'] = $this->db->get_where('tabel_siswa',  array('id' => $id_siswa, ))->row();
		$data['mapel'] = $this->db->get_where('tabel_mapel',  array('id' => $id_mapel, ))->row();
		$data['nilai'] = $row;
		$this->load->view('guru/temp_header');
		$this->load->view('guru/v_edit_nilai',$data);		
		$this->load->view('guru/temp_footer');
	}

	public function proses_edit()
	{	
		$id_mapel = $this->input->post('id_mapel');
		$id_siswa = $this->input->post('id_siswa');

		$where  = array('id' => $this->input->post('id'), );
		$object = array(
			'nilai' => $this->input->post('nilai'), 
		);
		$this->db->update('tabel_nilai', $object, $where);
		redirect('guru/lihat_nilai/index/'.$id_mapel.'/'.$id_siswa,'refresh');
	}

}

/* End of file Lihat_nilai.php */
/* Location: ./application/controllers/guru/Lihat_nilai.php */