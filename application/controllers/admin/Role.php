<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_role', 'role');
		
	}

	public function index()
	{
		$data = array(
      'title' 			=> 'Admin | role',
      'role'    => $this->role->get()
		);

    $this->admin_template->load('admin_template','backend/role/v_index', $data);
  }

  public function add()
  {
    $data = array(
      'title'       => 'Admin | Add role'
    );

    if(isset($_POST['addData'])){
      #code add role
      $this->form_validation->set_rules('role_name', 'role Name', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/role/v_add', $data);
      }

      else{
        $role = array(
          'role_name' => $this->input->post('role_name', true),
          'created_at'    => date('Y-m-d H:i:s'),
          'updated_at'    => date('Y-m-d H:i:s'),
        );

        $this->role->insert($role);

        if ($this->db->affected_rows() > 0) {
          # code...
          $this->session->set_flashdata('success', 'Insert role , Success');
          redirect(base_url('admin/role'));
        }

        else{
          $this->session->set_flashdata('error', 'Insert role , Failed !!!');
          redirect(base_url('admin/role'));
        }

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/role/v_add', $data);
    }
  }

  public function update($id){
    $data = array(
      'title'       => 'Admin | Upadate role',
      'role'    => $this->role->getById($id)->row()
    );

    if(isset($_POST['addData'])){
      #code add role
      $this->form_validation->set_rules('role_name', 'role Name', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/role/v_edit', $data);
      }

      else{
        $role = array(
          'role_name' => $this->input->post('role_name', true),
          'updated_at'    => date('Y-m-d H:i:s'),
        );

        $this->role->update($id,$role);

        if ($this->db->affected_rows() > 0) {
          # code...
          $this->session->set_flashdata('success', 'Update role , Success');
          redirect(base_url('admin/role'));
        }

        else{
          $this->session->set_flashdata('error', 'Update role , Failed !!!');
          redirect(base_url('admin/role'));
        }

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/role/v_edit', $data);
    }
  }

  public function delete($id){
    $this->role->delete($id);

    if ($this->db->affected_rows() > 0) {
      # code...
      $this->session->set_flashdata('success', 'Delete role , Success');
      redirect(base_url('admin/role'));
    }

    else{
      $this->session->set_flashdata('error', 'Delete role , Failed !!!');
      redirect(base_url('admin/role'));
    }
  }
  
  
}
