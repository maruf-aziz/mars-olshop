<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_authentication', 'auth');		
		$this->load->model('m_user', 'user');		
	}

	public function index(){
		$data = array(
			'title' 			=> 'Login | Admin',
    );
    
    $this->load->view('auth/login', $data);
	}
	
	public function login(){

		$user_email = $this->input->post('user_email', true);
		$user_pass 	= md5($this->input->post('user_pass', true));

		$check_account = $this->auth->login($user_email, $user_pass);

		if($check_account->num_rows() > 0){
			$row = $check_account->row();
			$param = array(
				'user_id' => $row->user_id,
				'role'		=> $row->user_role,
				'name'		=> $row->user_name
			);

			$update_last_login = array(
				'user_last_login' 	=> date('Y-m-d H:i:s')
			);

			$id = $row->user_id;

			$this->user->update($id, $update_last_login);

			$this->session->set_userdata($param);
			$role = $row->user_role;

			if($role == 1){
				redirect(base_url('admin/dashboard'));
			}

			else{
				redirect(base_url('home'));
			}

		}

		else{
			$this->session->set_flashdata('auth', 'maaf , login gagal !!!');
			redirect(base_url('auth/authentication'));
		}
		
	}

	public function logout(){
		$params = array('user_id');
		$this->session->unset_userdata($params);
		redirect(base_url('auth/authentication'));
	}
  
  
}
