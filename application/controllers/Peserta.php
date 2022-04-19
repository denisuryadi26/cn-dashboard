<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_peserta');
        $this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

    public function Index()
    {
        $data['peserta'] = $this->m_peserta->get_peserta();
        $data['total_peserta'] = $this->m_peserta->get_total_peserta();
        // var_dump($data['peserta']);die;
        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_sidebar');
        $this->load->view('v_peserta',$data);
        $this->load->view('layout/v_footer');
    }

    function save_peserta(){
        // $nama_lengkap = $this->input->post('photo');
        // echo $nama_lengkap;die;
        $config['upload_path']          = './assets/upload/images/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['overwrite']            = true; // tindih file dengan file baru
        $config['max_size']             = 1024; // batas ukuran file: 1MB
        $config['max_width']            = 1080; // batas lebar gambar dalam piksel
        $config['max_height']           = 1080; // batas tinggi gambar dalam piksel
        // var_dump($config);die;

		$this->load->library('upload', $config);

        // lakukan upload
        if (!$this->upload->do_upload('photo')) {
            // saat gagal, tampilkan pesan error


            // saat berhasil ambil datanya
            $file = $this->upload->data();

            //mengambil data di form
            $data = [
            'photo' => $this->input->post('photo'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'unit' => $this->input->post('unit'),
            'jabatan' => $this->input->post('jabatan'),
            'status' => 'pending'
           ];
            $this->m_peserta->add_peserta($data); //memasukan data ke database
            redirect('peserta'); //mengalihkan halaman

            // $error = array('error' => $this->upload->display_errors()); //tampilkan error
            // print_r($error);die;
            // $this->load->view('peserta', $error);
        } else {
            // saat berhasil ambil datanya
            $file = $this->upload->data();

            //mengambil data di form
            $data = [
            'photo' => $this->input->post('photo'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'unit' => $this->input->post('unit'),
            'jabatan' => $this->input->post('jabatan'),
            'status' => 'pending'
           ];
            $this->m_peserta->add_peserta($data); //memasukan data ke database
            redirect('peserta'); //mengalihkan halaman
        }

    //   $nama_lengkap = $this->input->post('nama_lengkap');
    //   $nik = $this->input->post('nik');
    //   $tempat_lahir = $this->input->post('tempat_lahir');
    //   $tgl_lahir = $this->input->post('tgl_lahir');
    //   $email = $this->input->post('email');
    //   $no_hp = $this->input->post('no_hp');
    //   $alamat = $this->input->post('alamat');
    //   $kota = $this->input->post('kota');
    //   $unit = $this->input->post('unit');
    //   $photo = $this->input->post('photo');
    //   $jabatan = $this->input->post('jabatan');
    //   $status = 'pending';
    //   $this->m_peserta->add_peserta($nama_lengkap ,$nik ,$tempat_lahir ,$tgl_lahir , $email, $no_hp, $alamat, $kota, $unit, $photo, $jabatan, $status);
    //   redirect('peserta');
    }


  function delete(){
    $id = $this->uri->segment(3);
    $this->m_peserta->delete($id);
    redirect('peserta');
  }
}