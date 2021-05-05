<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popular extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_popular', 'popular');
    $this->load->model('m_product', 'product');
		
	}

	public function index()
	{
		$data = array(
      'title' 			=> 'Admin | popular',
      'popular'        => $this->popular->get()
		);

    $this->admin_template->load('admin_template','backend/popular/v_index', $data);
  }

  public function add()
  {
    $data = array(
      'title'       => 'Admin | Add popular',
      'product'     => $this->product->get()
    );

    if(isset($_POST['addData'])){
      #code add popular
      $this->form_validation->set_rules('popular_product', 'popular product', 'trim|required');
      $this->form_validation->set_rules('popular_order', 'popular order', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/popular/v_add', $data);
      }

      else{
        $popular = array(
          'popular_product' => $this->input->post('popular_product', true),
          'popular_order'   => $this->input->post('popular_order', true),
          'created_at'      => date('Y-m-d H:i:s'),
          'updated_at'      => date('Y-m-d H:i:s'),
        );

        $this->popular->insert($popular);

        if ($this->db->affected_rows() > 0) {
          # code...
          $this->session->set_flashdata('success', 'Insert popular , Success');
          redirect(base_url('admin/popular'));
        }

        else{
          $this->session->set_flashdata('error', 'Insert popular , Failed !!!');
          redirect(base_url('admin/popular'));
        }

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/popular/v_add', $data);
    }
  }

  public function update($id){
    $data = array(
      'title'       => 'Admin | Upadate popular',
      'popular'     => $this->popular->getById($id)->row(),
      'product'     => $this->product->get()
    );

    if(isset($_POST['addData'])){
      #code add popular
      $this->form_validation->set_rules('popular_product', 'popular product', 'trim|required');
      $this->form_validation->set_rules('popular_order', 'popular order', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/popular/v_edit', $data);
      }

      else{
        $popular = array(
            'popular_product' => $this->input->post('popular_product', true),
            'popular_order'   => $this->input->post('popular_order', true),
            'updated_at'      => date('Y-m-d H:i:s'),
        );

        $this->popular->update($id,$popular);

        if ($this->db->affected_rows() > 0) {
          # code...
          $this->session->set_flashdata('success', 'Update popular , Success');
          redirect(base_url('admin/popular'));
        }

        else{
          $this->session->set_flashdata('error', 'Update popular , Failed !!!');
          redirect(base_url('admin/popular'));
        }

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/popular/v_edit', $data);
    }
  }

  public function delete($id){
    $this->popular->delete($id);

    if ($this->db->affected_rows() > 0) {
      # code...
      $this->session->set_flashdata('success', 'Delete popular , Success');
      redirect(base_url('admin/popular'));
    }

    else{
      $this->session->set_flashdata('error', 'Delete popular , Failed !!!');
      redirect(base_url('admin/popular'));
    }
  }
  
  
}
