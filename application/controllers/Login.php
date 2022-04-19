<?php

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("users",$where)->num_rows();
		$privilege_id = $this->m_login->cek_login("users",$where)->row()->privilege_id;
		$email = $this->m_login->cek_login("users",$where)->row()->email;
		$display_name = $this->m_login->cek_login("users",$where)->row()->display_name;
		// die(var_dump($email));
		if($cek > 0){

			//create session
			$data_session = array(
				'nama' => $username,
				'privilege_id' => $privilege_id,
				'email' => $email,
				'display_name' => $display_name,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("dashboard"));

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}