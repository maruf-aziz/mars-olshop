<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_bank', 'bank');
		
	}

	public function index()
	{
		$data = array(
      'title' 			=> 'Admin | bank',
      'bank'        => $this->bank->get()
		);

    $this->admin_template->load('admin_template','backend/bank/v_index', $data);
  }

  public function add()
  {
    $data = array(
      'title'       => 'Admin | Add bank'
    );

    if(isset($_POST['addData'])){
      #code add bank
      $this->form_validation->set_rules('bank_name', 'bank Name', 'trim|required');
      $this->form_validation->set_rules('bank_user', 'bank user', 'trim|required');
      $this->form_validation->set_rules('bank_number', 'bank Number', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/bank/v_add', $data);
      }

      else{
        $bank = array(
          'bank_name'     => $this->input->post('bank_name', true),
          'bank_user'     => $this->input->post('bank_user', true),
          'bank_number'   => $this->input->post('bank_number', true),
          'created_at'    => date('Y-m-d H:i:s'),
          'updated_at'    => date('Y-m-d H:i:s'),
        );

        $this->bank->insert($bank);

        if ($this->db->affected_rows() > 0) {
          # code...
          $this->session->set_flashdata('success', 'Insert bank , Success');
          redirect(base_url('admin/bank'));
        }

        else{
          $this->session->set_flashdata('error', 'Insert bank , Failed !!!');
          redirect(base_url('admin/bank'));
        }

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/bank/v_add', $data);
    }
  }

  public function update($id){
    $data = array(
      'title'       => 'Admin | Upadate bank',
      'bank'        => $this->bank->getById($id)->row()
    );

    if(isset($_POST['addData'])){
      #code add bank
      $this->form_validation->set_rules('bank_name', 'bank Name', 'trim|required');
      $this->form_validation->set_rules('bank_user', 'bank user', 'trim|required');
      $this->form_validation->set_rules('bank_number', 'bank Number', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/bank/v_edit', $data);
      }

      else{
        $bank = array(
          'bank_name'     => $this->input->post('bank_name', true),
          'bank_user'     => $this->input->post('bank_user', true),
          'bank_number'   => $this->input->post('bank_number', true),
          'updated_at'    => date('Y-m-d H:i:s'),
        );

        $this->bank->update($id,$bank);

        if ($this->db->affected_rows() > 0) {
          # code...
          $this->session->set_flashdata('success', 'Update bank , Success');
          redirect(base_url('admin/bank'));
        }

        else{
          $this->session->set_flashdata('error', 'Update bank , Failed !!!');
          redirect(base_url('admin/bank'));
        }

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/bank/v_edit', $data);
    }
  }

  public function delete($id){
    $this->bank->delete($id);

    if ($this->db->affected_rows() > 0) {
      # code...
      $this->session->set_flashdata('success', 'Delete bank , Success');
      redirect(base_url('admin/bank'));
    }

    else{
      $this->session->set_flashdata('error', 'Delete bank , Failed !!!');
      redirect(base_url('admin/bank'));
    }
  }
  
  
}
