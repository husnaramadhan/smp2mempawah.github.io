<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_siswa extends CI_Controller {

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
    $data['isi'] = $this->db->get('tabel_kelas');
    $this->load->view('admin/temp_header');
    $this->load->view('admin/v_mengampumapel', $data);
    $this->load->view('admin/temp_footer');
  }
 

  public function tambah()
  { 
    $this->load->view('admin/temp_header');
    $this->load->view('admin/v_tambahmapel', $data);
    $this->load->view('admin/temp_footer');
  }
   
 

}
