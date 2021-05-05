<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_confirm', 'confirm');
    $this->load->model('m_transactions', 'transaction');
		
	}

  public function index()
  {
    $data = array(
			'title' 			=> 'Admin | Confirm Transaction',
			'confirm'			=> $this->confirm->get(),
		);

    $this->admin_template->load('admin_template','backend/confirm/v_index', $data);
	}
	
	public function acc($id){
		$data = array(
			'transaction_paid'		=> 1,
			'transaction_status'	=> 'diproses',
		);

		$this->transaction->update($id, $data);

		if ($this->db->affected_rows() > 0) {
			# code...
			$this->session->set_flashdata('success', 'Accepted Payment , Success');
			redirect(base_url('admin/confirm'));
		}

		else{
			$this->session->set_flashdata('error', 'Accepted Payment , Failed !!!');
			redirect(base_url('admin/confirm'));
		}
	}
  
  
}
