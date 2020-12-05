<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mengampu_mapel extends CI_Controller {

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
    $query = $this->db->select('tampung_mapel.id, tabel_mapel.nama_mapel, tabel_kelas.nama as kelas, tabel_guru.nama as guru');
    $query = $this->db->from('tampung_mapel');
    $query = $this->db->join('tabel_mapel', 'tampung_mapel.id_mapel = tabel_mapel.id', 'left');
    $query = $this->db->join('tabel_kelas', 'tampung_mapel.id_kelas = tabel_kelas.id', 'left');
    $query = $this->db->join('tabel_guru', 'tampung_mapel.id_guru = tabel_guru.id', 'left');
    $query =  $this->db->get();
    $data['isi'] = $query;
    $this->load->view('admin/temp_header');
    $this->load->view('admin/v_mengampumapel', $data);
    $this->load->view('admin/temp_footer');
  }


  public function tambah()
  { 
    $data['guru'] = $this->db->get('tabel_guru');
    $data['kelas'] = $this->db->get('tabel_kelas');
    $data['mapel'] = $this->db->get('tabel_mapel');
    $this->load->view('admin/temp_header');
    $this->load->view('admin/v_tambahmengampumapel', $data);
    $this->load->view('admin/temp_footer');
  }

  public function proses()
  {
    $cek = $this->db->get_where('tampung_mapel', array('id_kelas' => $this->input->post('id_kelas'), 'id_mapel' => $this->input->post('id_mapel'), ));
    if ($cek->num_rows() == 1) {
      echo "<script>
      alert('Mata pelajaran atau Kelas sudah di ampu oleh guru lain');";
      echo 'window.location.assign("'.site_url("admin/mengampu_mapel/tambah").'")
      </script>';
    }else{
      $object = array(
        'id_kelas' => $this->input->post('id_kelas'),
        'id_mapel' => $this->input->post('id_mapel'),
        'id_guru'  => $this->input->post('id_guru')
      );
      $this->db->insert('tampung_mapel', $object);
      redirect('admin/mengampu_mapel','refresh');
    }
  }

  public function hapus($id='')
  {
    $where = array('id' => $id, );
    $this->db->delete('tampung_mapel', $where);
    redirect('admin/mengampu_mapel','refresh');
  }



}
