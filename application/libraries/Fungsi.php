<?php

Class Fungsi{

	protected $ci;

	function __construct(){
		$this->ci =&get_instance();
	}

	function user_login(){
		$this->ci->load->model('m_authentication');
		$id = $this->ci->session->userdata('user_id');
		$user_data = $this->ci->m_authentication->getById($id)->row();
		return $user_data;
	}
}

?>