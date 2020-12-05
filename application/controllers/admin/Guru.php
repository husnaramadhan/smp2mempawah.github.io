<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

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
		$data['isi'] = $this->db->order_by('nip', 'asc');
		$data['isi'] = $this->db->get('tabel_guru');
		$this->load->view('admin/temp_header');
		$this->load->view('admin/v_guru', $data);
		$this->load->view('admin/temp_footer');
	}

	public function tambah()
	{
		$this->load->view('admin/temp_header');
		$this->load->view('admin/v_tambah_guru');
		$this->load->view('admin/temp_footer');
	}

	public function hapus($id='')
	{
		$where = array('id' => $id, );
		$this->db->delete('tabel_guru', $where);
		redirect('admin/guru','refresh');
	}

	public function proses($value='')
	{
		$cek = $this->db->get_where('tabel_guru',  array('nip' => $this->input->post('nip'), ));
		if ($cek->num_rows() == 1) {
			echo "<script>alert('NIP sudah ada tidak boleh duplikat');history.go(-1);</script>";
		}else{
			$object = array(

				'nama' => $this->input->post('nama'), 
				'nip' => $this->input->post('nip'),
				'password' => md5($this->input->post('password')),

			);
			$this->db->insert('tabel_guru', $object);
			redirect('admin/guru','refresh');
		}

		
	}

	public function edit($id='')
	{
		$query = $this->db->get_where('tabel_guru',   array('id' => $id, ));
		if ($query->num_rows() == 0) {
			redirect('admin/guru','refresh');
			exit();
		}
		$data['row'] = $query->row();
		$this->load->view('admin/temp_header');
		$this->load->view('admin/v_edit_guru', $data);
		$this->load->view('admin/temp_footer');
	}

	public function proses_edit($value='')
	{
		$where = array('id' => $this->input->post('id'), );
		$object = array(

			'nama' => $this->input->post('nama'), 
			'nip' => $this->input->post('nip'), 

		);

		if ($this->input->post('password') != '') {
			$object['password'] = md5($this->input->post('password'));
		}
		$this->db->update('tabel_guru', $object, $where);
		redirect('admin/guru','refresh');
	}
}