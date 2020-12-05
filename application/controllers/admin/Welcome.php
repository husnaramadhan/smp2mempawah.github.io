<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('admin/temp_header');
		$this->load->view('admin/temp_footer');
	}

}

/* End of file Welcome.php */
/* Location: ./application/controllers/admin/Welcome.php */