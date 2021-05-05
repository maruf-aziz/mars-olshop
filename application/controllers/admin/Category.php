<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_category', 'category');
		
	}

	public function index()
	{
		$data = array(
      'title' 			=> 'Admin | Category',
      'category'    => $this->category->get()
		);

    $this->admin_template->load('admin_template','backend/category/v_index', $data);
  }

  public function add()
  {
    $data = array(
      'title'       => 'Admin | Add Category'
    );

    if(isset($_POST['addData'])){
      #code add category
      $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/category/v_add', $data);
      }

      else{
        $category = array(
          'category_name' => $this->input->post('category_name', true),
          'created_at'    => date('Y-m-d H:i:s'),
          'updated_at'    => date('Y-m-d H:i:s'),
        );

        $this->category->insert($category);

        if ($this->db->affected_rows() > 0) {
          # code...
          $this->session->set_flashdata('success', 'Insert Category , Success');
          redirect(base_url('admin/category'));
        }

        else{
          $this->session->set_flashdata('error', 'Insert Category , Failed !!!');
          redirect(base_url('admin/category'));
        }

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/category/v_add', $data);
    }
  }

  public function update($id){
    $data = array(
      'title'       => 'Admin | Upadate Category',
      'category'    => $this->category->getById($id)->row()
    );

    if(isset($_POST['addData'])){
      #code add category
      $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/category/v_edit', $data);
      }

      else{
        $category = array(
          'category_name' => $this->input->post('category_name', true),
          'updated_at'    => date('Y-m-d H:i:s'),
        );

        $this->category->update($id,$category);

        if ($this->db->affected_rows() > 0) {
          # code...
          $this->session->set_flashdata('success', 'Update Category , Success');
          redirect(base_url('admin/category'));
        }

        else{
          $this->session->set_flashdata('error', 'Update Category , Failed !!!');
          redirect(base_url('admin/category'));
        }

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/category/v_edit', $data);
    }
  }

  public function delete($id){
    $this->category->delete($id);

    if ($this->db->affected_rows() > 0) {
      # code...
      $this->session->set_flashdata('success', 'Delete Category , Success');
      redirect(base_url('admin/category'));
    }

    else{
      $this->session->set_flashdata('error', 'Delete Category , Failed !!!');
      redirect(base_url('admin/category'));
    }
  }
  
  
}
