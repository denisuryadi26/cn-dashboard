<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_peserta');
        $this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

	public function index()
	{
        $data['total_peserta'] = $this->m_peserta->get_total_peserta();
        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_sidebar');
		$this->load->view('dashboard', $data);
        $this->load->view('layout/v_footer');
	}
}
