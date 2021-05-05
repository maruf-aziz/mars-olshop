<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_user', 'user');
		
	}

	public function index()
	{
		$data = array(
      'title' 			=> 'Admin | member',
      'user'        => $this->user->get(2) #1 = role member
		);

    $this->admin_template->load('admin_template','backend/member/v_index', $data);
  }
  
  
}
