<?php

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();

        $this->load->model('m_peserta');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
        $data['total_peserta'] = $this->m_peserta->get_total_peserta();
        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_sidebar');
		$this->load->view('dashboard', $data);
        $this->load->view('layout/v_footer');
	}
}