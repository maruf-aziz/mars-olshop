<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_product', 'product');
    $this->load->model('m_category', 'category');
		
	}

	public function index()
	{
		$data = array(
      'title' 			=> 'Admin | product',
      'product'        => $this->product->get()
		);

    $this->admin_template->load('admin_template','backend/product/v_index', $data);
  }

  public function add()
  {
    $data = array(
      'title'       => 'Admin | Add product',
      'category'    => $this->category->get()
    );

    if(isset($_POST['addData'])){
      #code add product
      $this->form_validation->set_rules('product_name', 'product Name', 'trim|required');
      $this->form_validation->set_rules('product_category', 'product category', 'trim|required');
      $this->form_validation->set_rules('product_desc', 'product desc', 'trim|required');
      $this->form_validation->set_rules('product_price', 'product price', 'trim|required');
      $this->form_validation->set_rules('product_stock', 'product stock', 'trim|required');
      $this->form_validation->set_rules('product_status', 'product status', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/product/v_add', $data);
      }

      else{

        $upload = $this->upload();

        if($upload['result'] == 'success'){

          $price = $this->input->post('product_price', true);
          $price_str = preg_replace("/[^0-9]/", "", $price);
          $price_int = (int) $price_str;

          $product = array(
            'product_name'      => $this->input->post('product_name', true),
            'product_category'  => $this->input->post('product_category', true),
            'product_desc'      => $this->input->post('product_desc', true),
            'product_price'     => $price_int,
            'product_stock'     => $this->input->post('product_stock', true),
            'product_status'    => $this->input->post('product_status', true),
            'product_img'       => $upload['file']['file_name'],
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
          );

          $this->product->insert($product);

          if ($this->db->affected_rows() > 0) {
            # code...
            $this->session->set_flashdata('success', 'Insert product , Success');
            redirect(base_url('admin/product'));
          }

          else{
            $this->session->set_flashdata('error', 'Insert product , Failed !!!');
            redirect(base_url('admin/product'));
          }

        }

        else{
          $data['message'] = $upload['error'];
          $this->admin_template->load('admin_template','backend/product/v_add', $data);
        }

       

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/product/v_add', $data);
    }
  }

  public function update($id){
    $data = array(
      'title'       => 'Admin | Upadate product',
      'product'     => $this->product->getById($id)->row(),
      'category'    => $this->category->get()
    );

    if(isset($_POST['addData'])){
      #code add product
      $this->form_validation->set_rules('product_name', 'product Name', 'trim|required');
      $this->form_validation->set_rules('product_category', 'product category', 'trim|required');
      $this->form_validation->set_rules('product_desc', 'product desc', 'trim|required');
      $this->form_validation->set_rules('product_price', 'product price', 'trim|required');
      $this->form_validation->set_rules('product_stock', 'product stock', 'trim|required');
      $this->form_validation->set_rules('product_status', 'product status', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/product/v_edit', $data);
      }

      else{

        if($_FILES AND $_FILES['product_file']['name']){

          $upload = $this->upload();

          if($upload['result'] == 'success'){

            $this->db->where('product_id', $id);
						$img_unlink = $this->db->get('tb_product');
            $row = $img_unlink->row();

            if($row->product_img != null) unlink("./uploads/product/$row->product_img");

            $price = $this->input->post('product_price', true);
            $price_str = preg_replace("/[^0-9]/", "", $price);
            $price_int = (int) $price_str;

            $product = array(
              'product_name'      => $this->input->post('product_name', true),
              'product_category'  => $this->input->post('product_category', true),
              'product_desc'      => $this->input->post('product_desc', true),
              'product_price'     => $price_int,
              'product_stock'     => $this->input->post('product_stock', true),
              'product_status'    => $this->input->post('product_status', true),
              'product_img'       => $upload['file']['file_name'],
              'updated_at'        => date('Y-m-d H:i:s'),
            );

            $this->product->update($id, $product);

            if ($this->db->affected_rows() > 0) {
              # code...
              $this->session->set_flashdata('success', 'Update product , Success');
              redirect(base_url('admin/product'));
            }

            else{
              $this->session->set_flashdata('error', 'Update product , Failed !!!');
              redirect(base_url('admin/product'));
            }

          }

          else{
            $data['message'] = $upload['error'];
            $this->admin_template->load('admin_template','backend/product/v_edit', $data);
          }

        }

        else{

          $price = $this->input->post('product_price', true);
          $price_str = preg_replace("/[^0-9]/", "", $price);
          $price_int = (int) $price_str;

          $product = array(
            'product_name'      => $this->input->post('product_name', true),
            'product_category'  => $this->input->post('product_category', true),
            'product_desc'      => $this->input->post('product_desc', true),
            'product_price'     => $price_int,
            'product_stock'     => $this->input->post('product_stock', true),
            'product_status'    => $this->input->post('product_status', true),
            'updated_at'        => date('Y-m-d H:i:s'),
          );

          $this->product->update($id, $product);

          if ($this->db->affected_rows() > 0) {
            # code...
            $this->session->set_flashdata('success', 'Update product , Success');
            redirect(base_url('admin/product'));
          }

          else{
            $this->session->set_flashdata('error', 'Update product , Failed !!!');
            redirect(base_url('admin/product'));
          }

        }

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/product/v_edit', $data);
    }
  }

  public function delete($id){
    $this->db->where('product_id', $id);
    $img_unlink = $this->db->get('tb_product');
    $row = $img_unlink->row();

    if($row->product_img != null) unlink("./uploads/product/$row->product_img");

    $this->product->delete($id);

    if ($this->db->affected_rows() > 0) {
      # code...
      $this->session->set_flashdata('success', 'Delete product , Success');
      redirect(base_url('admin/product'));
    }

    else{
      $this->session->set_flashdata('error', 'Delete product , Failed !!!');
      redirect(base_url('admin/product'));
    }
  }

  public function upload(){
    $config = array(
			'upload_path'   => './uploads/product/',
			'allowed_types' => 'gif|jpg|png|jpeg',
			'file_name'     => 'pr_'.round(microtime(true)*1000),
			'overwrite'     => true,
      'max_size'      => 2048,
		);

		$this->load->library('upload');
		$this->upload->initialize($config);
		

		if($this->upload->do_upload('product_file'))
		{

      $gbr                        = $this->upload->data();
			$config['image_library']		='gd2';
			$config['source_image']			='./uploads/product/'.$gbr['file_name'];
			$config['create_thumb']			= FALSE;
			$config['maintain_ratio']		= FALSE;
			$config['width']            = 960;
			$config['height']           = 720;
			$config['quality']				  = '50%';
      $config['new_image']			  = './uploads/product/'.$gbr['file_name'];
      
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$return = array(
				'result' => 'success',
				'file' => $this->upload->data(),
				'error' => ''
			);
		    return $return;
		}
		else
		{
			$return = array(
				'result' => 'failed',
				'file' => '',
				'error' => $this->upload->display_errors()
			);
		    return $return;
		}
  }
  
  
}
