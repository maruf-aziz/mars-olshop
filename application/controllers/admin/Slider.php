<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_slider', 'slider');
    $this->load->model('m_product', 'product');
		
	}

	public function index()
	{
		$data = array(
      'title' 			=> 'Admin | slider',
      'slider'        => $this->slider->get()
		);

    $this->admin_template->load('admin_template','backend/slider/v_index', $data);
	}
	
	public function add()
  {
    $data = array(
			'title'       => 'Admin | Add slider',
			'product'			=> $this->product->get()
    );

    if(isset($_POST['addData'])){
      #code add slider
      $this->form_validation->set_rules('slider_tittle', 'slider tittle', 'trim|required');
      $this->form_validation->set_rules('slider_body', 'slider body', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/slider/v_add', $data);
      }

      else{

        $upload = $this->upload();

        if($upload['result'] == 'success'){

          $slider = array(
            'slider_tittle'  		=> $this->input->post('slider_tittle', true),
            'slider_body'      	=> $this->input->post('slider_body', true),
            'slider_order'     	=> 1,
            'slider_banner'     => $upload['file']['file_name'],
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
          );

          $this->slider->insert($slider);

          if ($this->db->affected_rows() > 0) {
            # code...
            $this->session->set_flashdata('success', 'Insert slider , Success');
            redirect(base_url('admin/slider'));
          }

          else{
            $this->session->set_flashdata('error', 'Insert slider , Failed !!!');
            redirect(base_url('admin/slider'));
          }

        }

        else{
          $data['message'] = $upload['error'];
          $this->admin_template->load('admin_template','backend/slider/v_add', $data);

          // echo $upload['error'];
        }     

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/slider/v_add', $data);
    }
	}

	public function update($id){
    $data = array(
      'title'       => 'Admin | Upadate slider',
			'slider'     	=> $this->slider->getById($id)->row(),
			'product'			=> $this->product->get()
    );

    if(isset($_POST['addData'])){
      #code add slider
      $this->form_validation->set_rules('slider_tittle', 'slider tittle', 'trim|required');
      $this->form_validation->set_rules('slider_body', 'slider body', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/slider/v_edit', $data);
      }

      else{

        if($_FILES AND $_FILES['slider_banner']['name']){

          $upload = $this->upload();

          if($upload['result'] == 'success'){

            $this->db->where('slider_id', $id);
						$img_unlink = $this->db->get('tb_slider');
            $row = $img_unlink->row();

            if($row->slider_banner != null) unlink("./uploads/slider/$row->slider_banner");

            $slider = array(
							'slider_tittle'  		=> $this->input->post('slider_tittle', true),
							'slider_body'      	=> $this->input->post('slider_body', true),
							'slider_banner'     => $upload['file']['file_name'],
							'updated_at'        => date('Y-m-d H:i:s'),
            );

            $this->slider->update($id, $slider);

            if ($this->db->affected_rows() > 0) {
              # code...
              $this->session->set_flashdata('success', 'Update slider , Success');
              redirect(base_url('admin/slider'));
            }

            else{
              $this->session->set_flashdata('error', 'Update slider , Failed !!!');
              redirect(base_url('admin/slider'));
            }

          }

          else{
            $data['message'] = $upload['error'];
            $this->admin_template->load('admin_template','backend/slider/v_edit', $data);
          }

        }

        else{

          $slider = array(
						'slider_tittle'  		=> $this->input->post('slider_tittle', true),
						'slider_body'      	=> $this->input->post('slider_body', true),
						'slider_order'     	=> $this->input->post('slider_order', true),
						'updated_at'        => date('Y-m-d H:i:s'),
          );

          $this->slider->update($id, $slider);

          if ($this->db->affected_rows() > 0) {
            # code...
            $this->session->set_flashdata('success', 'Update slider , Success');
            redirect(base_url('admin/slider'));
          }

          else{
            $this->session->set_flashdata('error', 'Update slider , Failed !!!');
            redirect(base_url('admin/slider'));
          }

        }

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/slider/v_edit', $data);
    }
  }

  public function delete($id){
    $this->db->where('slider_id', $id);
    $img_unlink = $this->db->get('tb_slider');
    $row = $img_unlink->row();

    if($row->slider_img != null) unlink("./uploads/slider/$row->slider_banner");

    $this->slider->delete($id);

    if ($this->db->affected_rows() > 0) {
      # code...
      $this->session->set_flashdata('success', 'Delete slider , Success');
      redirect(base_url('admin/slider'));
    }

    else{
      $this->session->set_flashdata('error', 'Delete slider , Failed !!!');
      redirect(base_url('admin/slider'));
    }
  }

	public function upload(){
    $config = array(
			'upload_path'   => './uploads/slider/',
			'allowed_types' => 'gif|jpg|png',
			'file_name'     => 'sld_'.round(microtime(true)*1000),
			'overwrite'     => true,
      'max_size'      => 2048,
		);

		$this->load->library('upload');
		$this->upload->initialize($config);
		

		if($this->upload->do_upload('slider_banner'))
		{

      $gbr                        = $this->upload->data();
			$config['image_library']		='gd2';
			$config['source_image']			='./uploads/slider/'.$gbr['file_name'];
			$config['create_thumb']			= FALSE;
			$config['maintain_ratio']		= FALSE;
			$config['width']            = 1920;
			$config['height']           = 570;
			$config['quality']				  = '50%';
      $config['new_image']			  = './uploads/slider/'.$gbr['file_name'];
      
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
