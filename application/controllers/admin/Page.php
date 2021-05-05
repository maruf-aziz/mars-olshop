<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_pages', 'page');
		
	}

	public function index()
	{
		$data = array(
      'title' 			=> 'Admin | page',
      'page'        => $this->page->getHome(),
      'shop'        => $this->page->getShop(),
      'cart'        => $this->page->getCart(),
      'about'       => $this->page->getAbout(),
      'contact'     => $this->page->getContact(),
		);

    $this->admin_template->load('admin_template','backend/page/v_index', $data);
  }

  public function update(){
    $id = 1;

    if(isset($_POST['form_home'])){
      #code
      $data = array(
        'status_slider'       => $this->input->post('status_slider', true),
        'title_1'             => $this->input->post('title_1', true),
        'status_title_1'      => $this->input->post('status_title_1', true),
        'title_2'             => $this->input->post('title_2', true),
        'status_title_2'      => $this->input->post('status_title_2', true),
        'status_3'            => $this->input->post('status_3', true),
        'title_4'             => $this->input->post('title_4', true),
        'status_title_4'      => $this->input->post('status_title_4', true),
        'title_5'             => $this->input->post('title_5', true),
        'status_title_5'      => $this->input->post('status_title_5', true),
        'info_1'              => $this->input->post('info_1', true),
        'info_2'              => $this->input->post('info_2', true),
        'info_3'              => $this->input->post('info_3', true),
      );

      $this->page->updateHome($id, $data);

      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('success', 'Update Page Home , Success');
        redirect(base_url('admin/page'));
      }

      else{
        $this->session->set_flashdata('error', 'Update Page Home , Failed');
        redirect(base_url('admin/page'));
      }
    }

    if(isset($_POST['form_shop'])){
      #code
      $data = array(
        'status_banner'           => $this->input->post('status_banner', true),
        'sidebar1'                => $this->input->post('sidebar1', true),
        'status_slidebar_1'       => $this->input->post('status_slidebar_1', true),
        'sidebar2'                => $this->input->post('sidebar2', true),
        'sub_sidebar2'            => $this->input->post('sub_sidebar2', true),
        'btn_sub_sidebar2'        => $this->input->post('btn_sub_sidebar2', true),
        'status_sidebar2'         => $this->input->post('status_sidebar2', true),
        'sorting1'                => $this->input->post('sorting1', true),
        'title1_sorting1'         => $this->input->post('title1_sorting1', true),
        'value1'                  => $this->input->post('value1', true),
        'title2_sorting1'         => $this->input->post('title2_sorting1', true),
        'value2'                  => $this->input->post('value2', true),
        'status_sorting1'         => $this->input->post('status_sorting1', true),
      );

      $this->page->updateShop($id, $data);

      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('success', 'Update Page Shop , Success');
        redirect(base_url('admin/page'));
      }

      else{
        $this->session->set_flashdata('error', 'Update Page Shop , Failed');
        redirect(base_url('admin/page'));
      }
    }

    if(isset($_POST['form_detail'])){
      #code
      $data = array(
        'sorting_in_detail'       => $this->input->post('sorting_in_detail', true),
        'title1'                  => $this->input->post('title1', true),
        'val_title1'              => $this->input->post('val_title1', true),
        'title2'                  => $this->input->post('title2', true),
        'val_title2'              => $this->input->post('val_title2', true),
        'title3'                  => $this->input->post('title3', true),
        'val_title3'              => $this->input->post('val_title3', true),
        'title4'                  => $this->input->post('title4', true),
        'val_title4'              => $this->input->post('val_title4', true),
        'status_detail_sorting'   => $this->input->post('status_detail_sorting', true),
        'detail_sidebar1'         => $this->input->post('detail_sidebar1', true),
        'status_detail_sidebar1'  => $this->input->post('status_detail_sidebar1', true),
        'detail_sidebar2'         => $this->input->post('detail_sidebar2', true),
        'status_detail_sidebar2'  => $this->input->post('status_detail_sidebar2', true),
        'detail_sidebar3'         => $this->input->post('detail_sidebar3', true),
        'status_detail_sidebar3'  => $this->input->post('status_detail_sidebar3', true),
        'btn_name'                => $this->input->post('btn_name', true),
        'footer_title'            => $this->input->post('footer_title', true),
        'status_footer'           => $this->input->post('status_footer', true),
      );

      $this->page->updateShop($id, $data);

      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('success', 'Update Page Detail Product , Success');
        redirect(base_url('admin/page'));
      }

      else{
        $this->session->set_flashdata('error', 'Update Page Detail Product , Failed');
        redirect(base_url('admin/page'));
      }
    }

    if(isset($_POST['form_cart'])){
      #code
      $data = array(
        'status_banner'       => $this->input->post('status_banner', true),
        'table_title1'        => $this->input->post('table_title1', true),
        'table_title2'        => $this->input->post('table_title2', true),
        'table_title3'        => $this->input->post('table_title3', true),
        'table_title4'        => $this->input->post('table_title4', true),
        'btn_name1'           => $this->input->post('btn_name1', true),
        'status_text1'        => $this->input->post('status_text1', true),
        'btn_name2'           => $this->input->post('btn_name2', true),
        'status_btn2'         => $this->input->post('status_btn2', true),
        'btn_name3'           => $this->input->post('btn_name3', true),
        'footer_title'        => $this->input->post('footer_title', true),
        'title1'              => $this->input->post('title1', true),
        'title2'              => $this->input->post('title2', true),
        'title3'              => $this->input->post('title3', true),
      );

      $this->page->updateCart($id, $data);

      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('success', 'Update Page Cart , Success');
        redirect(base_url('admin/page'));
      }

      else{
        $this->session->set_flashdata('error', 'Update Page Cart , Failed');
        redirect(base_url('admin/page'));
      }
    }

    if(isset($_POST['form_about'])){
      #code
      if($_FILES AND $_FILES['img']['name']){
        $upload = $this->upload();

        if($upload['result'] == 'success'){
          $img = $this->page->getAbout();
          if($img->img != null) unlink("./uploads/about/$img->img");

          $data = array(
            'status_banner'     => $this->input->post('status_banner', true),
            'img'               => $upload['file']['file_name'],
            'description'       => $this->input->post('description', true),
          );
          #update about
          $this->page->updateAbout($id, $data);

          if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Update Page About , Success');
            redirect(base_url('admin/page'));
          }
    
          else{
            $this->session->set_flashdata('error', 'Update Page About , Failed');
            redirect(base_url('admin/page'));
          }
        }
        else{
          $this->session->set_flashdata('error', 'Image Of About '.$upload['error']);
          redirect(base_url('admin/page'));
        }
      }
      else{
        $data = array(
          'status_banner'     => $this->input->post('status_banner', true),
          'description'       => $this->input->post('description', true),
        );

        $this->page->updateAbout($id, $data);

        if($this->db->affected_rows() > 0){
          $this->session->set_flashdata('success', 'Update Page About , Success');
          redirect(base_url('admin/page'));
        }
  
        else{
          $this->session->set_flashdata('error', 'Update Page About , Failed');
          redirect(base_url('admin/page'));
        }
      }


    }

    if(isset($_POST['form_contact'])){
      #code
      $data = array(
        'status_banner'   => $this->input->post('status_banner', true),
        'title'           => $this->input->post('title', true),
        'maps'            => $this->input->post('maps', true),
        'btn_name'        => $this->input->post('btn_name', true),
      );

      $this->page->updateContact($id, $data);

      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('success', 'Update Page Contact , Success');
        redirect(base_url('admin/page'));
      }

      else{
        $this->session->set_flashdata('error', 'Update Page Contact , Failed');
        redirect(base_url('admin/page'));
      }
    }

  }

  public function upload(){
    $config = array(
      'upload_path'   => './uploads/about/',
      'allowed_types' => 'gif|jpg|png',
      'file_name'     => 'About_'.round(microtime(true)*1000),
      'overwrite'     => true,
      'max_size'      => 2048,
    );

    $this->load->library('upload');
    $this->upload->initialize($config);
    

    if($this->upload->do_upload('img'))
    {

      $gbr                        = $this->upload->data();
      $config['image_library']		='gd2';
      $config['source_image']			='./uploads/about/'.$gbr['file_name'];
      $config['create_thumb']			= FALSE;
      $config['maintain_ratio']		= FALSE;
      $config['width']            = 720;
      $config['height']           = 720;
      $config['quality']				  = '50%';
      $config['new_image']			  = './uploads/about/'.$gbr['file_name'];
      
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
