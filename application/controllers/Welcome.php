<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('v_login');
	}

	public function proses_login($value='')
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where_admin = array(
			'username' => $username,
			'password' => md5($password)
		);
		$where_guru = array(
			'nip' => $username,
			'password' => md5($password)
		);
		$where_siswa = array(
			'nis' => $username,
			'password' => md5($password)
		);
		$query_admin =  $this->db->get_where('tabel_admin', $where_admin);
		$query_guru =  $this->db->get_where('tabel_guru', $where_guru);
		$query_siswa =  $this->db->get_where('tabel_siswa', $where_siswa);

		if ($query_admin->num_rows() >= 1) {
			foreach ($query_admin->result() as $key ) {
				$sess_data['admin_logged_in'] = "Sudah_Loggin";
				$sess_data['nama'] = $key->nama;
				$sess_data['id'] = $key->id;
				$sess_data['username'] = $key->username;
				$this->session->set_userdata($sess_data);
				redirect('admin', 'refresh');
			}
		}elseif ($query_guru->num_rows() >= 1) {
			foreach ($query_guru->result() as $key ) {
				$sess_data['guru_logged_in'] = "Sudah_Loggin";
				$sess_data['nama'] = $key->nama;
				$sess_data['id'] = $key->id;
				$sess_data['nip'] = $key->nip;
				$this->session->set_userdata($sess_data);
				redirect('guru', 'refresh');
			}
		}elseif ($query_siswa->num_rows() >= 1) {
			foreach ($query_siswa->result() as $key ) {
				$sess_data['siswa_logged_in'] = "Sudah_Loggin";
				$sess_data['nama'] = $key->nama;
				$sess_data['id'] = $key->id;
				$sess_data['nis'] = $key->nis;
				$this->session->set_userdata($sess_data);
				redirect('siswa', 'refresh');
			}
		}else{
			echo "<script>
			alert('Login Gagal');";
			echo 'window.location.assign("'.site_url("").'")
			</script>';
		}

	}

	
	function logout()
	{
		$this->clear_session();
		redirect('','refresh');
	}

	private function clear_session()
	{
		# code...
		$user_data = $this->session->all_userdata();

		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
	}
}
