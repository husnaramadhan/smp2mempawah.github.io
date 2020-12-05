<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('You Must Login!');";
			echo 'window.location.assign("'.site_url("").'")
			</script>';
			// redirect('admin/welcome');
		}
	}

	public function index()
	{
		$data['isi'] = $this->db->order_by('nis', 'asc');
		$data['isi'] = $this->db->get('tabel_siswa');
		$this->load->view('admin/temp_header');
		$this->load->view('admin/v_siswa', $data);
		$this->load->view('admin/temp_footer');
	}

	public function tambah()
	{
		$data['isi'] = $this->db->order_by('nama', 'asc');
		$data['isi'] = $this->db->get('tabel_kelas');
		$this->load->view('admin/temp_header');
		$this->load->view('admin/v_tambah_siswa', $data);
		$this->load->view('admin/temp_footer');
	}

	public function hapus($id='')
	{
		$where = array('id' => $id, );
		$this->db->delete('tabel_siswa', $where);
		redirect('admin/siswa','refresh');
	}

	public function proses($value='')
	{
		$cek = $this->db->get_where('tabel_siswa',  array('nis' => $this->input->post('nis'), ));
		if ($cek->num_rows() == 1) {
			echo "<script>alert('NIS sudah ada tidak boleh duplikat');history.go(-1);</script>";
		}else{
			$object = array(
				'id_kelas' => $this->input->post('id_kelas'), 
				'nama' => $this->input->post('nama'), 
				'nis' => $this->input->post('nis'), 
				'password' => md5($this->input->post('password')), 
				'tgl_lahir' => $this->input->post('tgl_lahir'), 
				'tempat_lahir' => $this->input->post('tempat_lahir'), 
				'alamat' => $this->input->post('alamat'), 
				'nama_ayah' => $this->input->post('nama_ayah'), 
				'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'), 
				'nama_ibu' => $this->input->post('nama_ibu'), 
				'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'), 
			);

			$this->db->insert('tabel_siswa', $object);
			$last_id = $this->db->insert_id();
			$this->tambah_absen($last_id);
			redirect('admin/siswa','refresh');
		}
		
	}

	public function edit($id='')
	{
		$data['isi'] = $this->db->order_by('nama', 'asc');
		$data['isi'] = $this->db->get('tabel_kelas');
		$query = $this->db->get_where('tabel_siswa',   array('id' => $id, ));
		if ($query->num_rows() == 0) {
			redirect('admin/siswa','refresh');
			exit();
		}
		$data['row'] = $query->row();
		$this->load->view('admin/temp_header');
		$this->load->view('admin/v_edit_siswa', $data);
		$this->load->view('admin/temp_footer');
	}

	public function proses_edit($value='')
	{
		$where = array('id' => $this->input->post('id'), );
		$object = array(
			'id_kelas' => $this->input->post('id_kelas'), 
			'nama' => $this->input->post('nama'), 
			'nis' => $this->input->post('nis'), 
			'tgl_lahir' => $this->input->post('tgl_lahir'), 
			'tempat_lahir' => $this->input->post('tempat_lahir'), 
			'alamat' => $this->input->post('alamat'), 
			'nama_ayah' => $this->input->post('nama_ayah'), 
			'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'), 
			'nama_ibu' => $this->input->post('nama_ibu'), 
			'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),  
		);

		if ($this->input->post('password') != '') {
			$object['password'] = md5($this->input->post('password'));
		}
		$this->db->update('tabel_siswa', $object, $where);
		redirect('admin/siswa','refresh');
	}

	private function tambah_absen($id_siswa='')
	{
		$object = array('id_siswa' => $id_siswa, );
		$this->db->insert('tabel_absen', $object);
	}
}

/* End of file Siswa.php */
/* Location: ./application/controllers/admin/Siswa.php */