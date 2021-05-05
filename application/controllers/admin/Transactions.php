<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

		$this->load->model('m_transactions', 'transaction');
		
	}

	public function index()
	{
		$data = array(
			'title' 			=> 'Admin | Transaction',
			'transaction'	=> $this->transaction->get(),
		);

    $this->admin_template->load('admin_template','backend/transaction/v_index', $data);
	}

	public function detail($id){
		$data = array(
			'title' 			=> 'Admin | Detail Transaction',
			'detail'			=> $this->transaction->getById($id),
			'data_detail'	=> $this->transaction->getData($id),
		);

		$this->admin_template->load('admin_template','backend/transaction/v_detail', $data);
	}

	public function setSelesai(){
		$id = $this->input->post('id', true);

		$data = array(
			'transaction_status' => 'selesai'
		);

		$this->transaction->update($id, $data);

		if ($this->db->affected_rows() > 0) {
			# code...
			$this->session->set_flashdata('success', 'Update Transaction , Success');
			redirect(base_url('admin/transactions'));
		}

		else{
			$this->session->set_flashdata('error', 'Update Transaction , Failed !!!');
			redirect(base_url('admin/transactions'));
		}
	}

	public function setBatal(){
		$id = $this->input->post('id', true);

		$data = array(
			'transaction_status' => 'diproses'
		);

		$this->transaction->update($id, $data);

		if ($this->db->affected_rows() > 0) {
			# code...
			$this->session->set_flashdata('success', 'Update Transaction , Success');
			redirect(base_url('admin/transactions'));
		}

		else{
			$this->session->set_flashdata('error', 'Update Transaction , Failed !!!');
			redirect(base_url('admin/transactions'));
		}
	}

	public function count(){
		$this->db->where('transaction_paid', 0);

		echo $this->db->count_all_results('tb_transaction');
	}
	

  
  
}
