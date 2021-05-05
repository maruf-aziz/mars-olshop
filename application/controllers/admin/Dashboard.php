<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		
	}

	public function index()
	{
		$data = array(
			'title' 			=> 'Admin | Dashbaord',
			'product'			=> $this->db->count_all_results('tb_product'),
			'member'			=> $this->db->where('user_role', 2)
																	->count_all_results('tb_user'),
			'profit'			=> $this->db->select('SUM(transaction_total) as total')
																	->from('tb_transaction')
																	->get()->row()->total,
			'transaction'	=> $this->db->count_all_results('tb_transaction'),
		);

    $this->admin_template->load('admin_template','backend/dashboard/v_index', $data);
  }
  
  
}
