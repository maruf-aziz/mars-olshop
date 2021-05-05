<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_setting', 'set');
		
	}

	public function index()
	{ 
		$data = array(
      'title' 			=> 'Admin | setting',
      'logo'        => $this->set->getByName('setting_logo','logo'),
      'favicon'     => $this->set->getByName('setting_logo','favicon'),
      'instagram'   => $this->set->getByName('setting_social_media','instagram'),
      'facebook'    => $this->set->getByName('setting_social_media','facebook'),
      'youtube'     => $this->set->getByName('setting_social_media','youtube'),
      'whatsapp'    => $this->set->getByName('setting_social_media','whatsapp'),
      'path'        => $this->set->getByName('setting_social_media','path'),
      'twitter'     => $this->set->getByName('setting_social_media','twitter'),
      'email'       => $this->set->getByName('setting_mail','mail_address'),
      'copyright'   => $this->set->getByName('setting_footer','copyright'),
      'question'    => $this->set->getByName('setting_footer','question'),
      'shop'        => $this->set->getByName('setting_banner','shop'),
      'cart'        => $this->set->getByName('setting_banner','cart'),
      'blog'        => $this->set->getByName('setting_banner','blog'),
      'about'       => $this->set->getByName('setting_banner','about'),
      'contact'     => $this->set->getByName('setting_banner','contact'),
      'money'       => $this->set->getByName('setting_money', 'mata_uang'),
		);

    $this->admin_template->load('admin_template','backend/setting/v_index', $data);
  }

  public function update(){

    if(isset($_POST['form_logo'])){
      
      if($_FILES AND $_FILES['logo']['name']){
        $upload = $this->upload_logo();

        if($upload['result'] == 'success'){
          $img = $this->set->getByName('setting_logo','logo');
          if($img->setting_value != null) unlink("./uploads/logo/$img->setting_value");

          $logo = array(
            'setting_value' => $upload['file']['file_name']
          );
          #update logo
          $this->set->update('logo', $logo);

          $this->session->set_flashdata('success', 'Update logo , Success');
          redirect(base_url('admin/setting'));
        }
        else{
          $this->session->set_flashdata('error', 'Update logo , Failed !!');
          redirect(base_url('admin/setting'));
        }
      }

      else{
        $this->session->set_flashdata('error', 'Update logo , Failed !!');
        redirect(base_url('admin/setting'));
      }
    }
    
    if(isset($_POST['form_favicon'])){
      
      if($_FILES AND $_FILES['favicon_logo']['name']){
        $upload = $this->upload_favicon();

        if($upload['result'] == 'success'){
          $img = $this->set->getByName('setting_logo','favicon');
          if($img->setting_value != null) unlink("./uploads/favicon/$img->setting_value");

          $favicon = array(
            'setting_value' => $upload['file']['file_name']
          );
          #update favicon
          $this->set->update('favicon', $favicon);

          $this->session->set_flashdata('success', 'Update Favicon , Success');
          redirect(base_url('admin/setting'));
        }
        else{
          $this->session->set_flashdata('error', 'Update Favicon , Failed !!');
          redirect(base_url('admin/setting'));
        }
      }

      else{
        $this->session->set_flashdata('error', 'Update Favicon , Failed !!');
        redirect(base_url('admin/setting'));
      }
    }
    
    if(isset($_POST['form_social_media'])){
      
      $ig = array(
        'setting_value' => $this->input->post('instagram', true)
      );
      #update ig 
      $this->set->update('instagram', $ig);

      // ---------------------------------

      $fb = array(
        'setting_value' => $this->input->post('facebook', true)
      );
      #update fb
      $this->set->update('facebook', $fb);

      // ---------------------------------

      $youtube = array(
        'setting_value' => $this->input->post('youtube', true)
      );
      #update fb
      $this->set->update('youtube', $youtube);

      // ---------------------------------

      $whatsapp = array(
        'setting_value' => $this->input->post('whatsapp', true)
      );
      #update fb
      $this->set->update('whatsapp', $whatsapp);

      // ---------------------------------

      $path = array(
        'setting_value' => $this->input->post('path', true)
      );
      #update fb
      $this->set->update('path', $path);

      // ---------------------------------

      $twitter = array(
        'setting_value' => $this->input->post('twitter', true)
      );
      #update fb
      $this->set->update('twitter', $twitter);

      $this->session->set_flashdata('success', 'Update Sosial Media , Success');
      redirect(base_url('admin/setting'));

    }
    
    if(isset($_POST['form_footer'])){
      $copyright = array(
        'setting_value' => $this->input->post('copyright', true)
      );
      #update copyright
      $this->set->update('copyright', $copyright);

      // ------------------------------

      $question = array(
        'setting_value' => $this->input->post('question', true)
      );
      #update question
      $this->set->update('question', $question);

      $this->session->set_flashdata('success', 'Update Footer , Success');
      redirect(base_url('admin/setting'));
    }
    
    if(isset($_POST['form_email'])){
      
      $mail_address = array(
        'setting_value' => $this->input->post('email', true)
      );
      #update email
      $this->set->update('mail_address', $mail_address);

      $this->session->set_flashdata('success', 'Update Email , Success');
      redirect(base_url('admin/setting'));
    }

    if(isset($_POST['form_money'])){
      
      $mail_address = array(
        'setting_value' => $this->input->post('money', true)
      );
      #update money
      $this->set->update('mata_uang', $mail_address);

      $this->session->set_flashdata('success', 'Update Money , Success');
      redirect(base_url('admin/setting'));
    }

    if(isset($_POST['form_banner_shop'])){
      
      if($_FILES AND $_FILES['photo']['name']){
        $upload = $this->upload_banner();

        if($upload['result'] == 'success'){
          $img = $this->set->getByName('setting_banner','shop');
          if($img->setting_value != null) unlink("./uploads/banner/$img->setting_value");

          $shop = array(
            'setting_value' => $upload['file']['file_name']
          );
          #update shop
          $this->set->update('shop', $shop);

          $this->session->set_flashdata('success', 'Update banner shop , Success');
          redirect(base_url('admin/setting'));
        }
        else{
          $this->session->set_flashdata('error', 'Update banner shop , Failed !!');
          redirect(base_url('admin/setting'));

          // echo $upload['error'];
        }
      }

      else{
        $this->session->set_flashdata('error', 'Update banner shop, Failed !!');
        redirect(base_url('admin/setting'));
      }
    }

    if(isset($_POST['form_banner_cart'])){
      
      if($_FILES AND $_FILES['photo']['name']){
        $upload = $this->upload_banner();

        if($upload['result'] == 'success'){
          $img = $this->set->getByName('setting_banner','cart');
          if($img->setting_value != null) unlink("./uploads/banner/$img->setting_value");

          $cart = array(
            'setting_value' => $upload['file']['file_name']
          );
          #update cart
          $this->set->update('cart', $cart);

          $this->session->set_flashdata('success', 'Update banner cart , Success');
          redirect(base_url('admin/setting'));
        }
        else{
          $this->session->set_flashdata('error', 'Update banner cart , Failed !!');
          redirect(base_url('admin/setting'));

          // echo $upload['error'];
        }
      }

      else{
        $this->session->set_flashdata('error', 'Update banner shop, Failed !!');
        redirect(base_url('admin/setting'));
      }
    }

    if(isset($_POST['form_banner_blog'])){
      
      if($_FILES AND $_FILES['photo']['name']){
        $upload = $this->upload_banner();

        if($upload['result'] == 'success'){
          $img = $this->set->getByName('setting_banner','blog');
          if($img->setting_value != null) unlink("./uploads/banner/$img->setting_value");

          $blog = array(
            'setting_value' => $upload['file']['file_name']
          );
          #update blog
          $this->set->update('blog', $blog);

          $this->session->set_flashdata('success', 'Update banner blog , Success');
          redirect(base_url('admin/setting'));
        }
        else{
          $this->session->set_flashdata('error', 'Update banner blog , Failed !!');
          redirect(base_url('admin/setting'));

          // echo $upload['error'];
        }
      }

      else{
        $this->session->set_flashdata('error', 'Update banner shop, Failed !!');
        redirect(base_url('admin/setting'));
      }
    }

    if(isset($_POST['form_banner_about'])){
      
      if($_FILES AND $_FILES['photo']['name']){
        $upload = $this->upload_banner();

        if($upload['result'] == 'success'){
          $img = $this->set->getByName('setting_banner','about');
          if($img->setting_value != null) unlink("./uploads/banner/$img->setting_value");

          $about = array(
            'setting_value' => $upload['file']['file_name']
          );
          #update about
          $this->set->update('about', $about);

          $this->session->set_flashdata('success', 'Update banner about , Success');
          redirect(base_url('admin/setting'));
        }
        else{
          $this->session->set_flashdata('error', 'Update banner about , Failed !!');
          redirect(base_url('admin/setting'));

          // echo $upload['error'];
        }
      }

      else{
        $this->session->set_flashdata('error', 'Update banner shop, Failed !!');
        redirect(base_url('admin/setting'));
      }
    }

    if(isset($_POST['form_banner_contact'])){
      
      if($_FILES AND $_FILES['photo']['name']){
        $upload = $this->upload_banner();

        if($upload['result'] == 'success'){
          $img = $this->set->getByName('setting_banner','contact');
          if($img->setting_value != null) unlink("./uploads/banner/$img->setting_value");

          $contact = array(
            'setting_value' => $upload['file']['file_name']
          );
          #update contact
          $this->set->update('contact', $contact);

          $this->session->set_flashdata('success', 'Update banner contact , Success');
          redirect(base_url('admin/setting'));
        }
        else{
          $this->session->set_flashdata('error', 'Update banner contact , Failed !!');
          redirect(base_url('admin/setting'));

          // echo $upload['error'];
        }
      }

      else{
        $this->session->set_flashdata('error', 'Update banner shop, Failed !!');
        redirect(base_url('admin/setting'));
      }
    }

  }

  public function upload_favicon(){
    $config = array(
      'upload_path'   => './uploads/favicon/',
      'allowed_types' => 'gif|jpg|png',
      'file_name'     => 'fav_'.round(microtime(true)*1000),
      'overwrite'     => true,
      'max_size'      => 1024,
      'max_width'     => 360,
      'max_height'    => 360,
    );

    $this->load->library('upload');
    $this->upload->initialize($config);
    

    if($this->upload->do_upload('favicon_logo'))
    {

      $gbr                        = $this->upload->data();
      $config['image_library']		='gd2';
      $config['source_image']			='./uploads/favicon/'.$gbr['file_name'];
      $config['create_thumb']			= FALSE;
      $config['maintain_ratio']		= FALSE;
      $config['width']            = 240;
      $config['height']           = 240;
      $config['quality']				  = '50%';
      $config['new_image']			  = './uploads/favicon/'.$gbr['file_name'];
      
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

  public function upload_logo(){
    $config = array(
      'upload_path'   => './uploads/logo/',
      'allowed_types' => 'gif|jpg|png',
      'file_name'     => 'Logo_'.round(microtime(true)*1000),
      'overwrite'     => true,
      'max_size'      => 1024,
    );

    $this->load->library('upload');
    $this->upload->initialize($config);
    

    if($this->upload->do_upload('logo'))
    {

      $gbr                        = $this->upload->data();
      $config['image_library']		='gd2';
      $config['source_image']			='./uploads/logo/'.$gbr['file_name'];
      $config['create_thumb']			= FALSE;
      $config['maintain_ratio']		= FALSE;
      // $config['width']            = 150;
      // $config['height']           = 40;
      $config['quality']				  = '50%';
      $config['new_image']			  = './uploads/logo/'.$gbr['file_name'];
      
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

  public function upload_banner(){
    $config = array(
      'upload_path'   => './uploads/banner/',
      'allowed_types' => 'gif|jpg|png',
      'file_name'     => 'banner_'.round(microtime(true)*1000),
      'overwrite'     => true,
      'max_size'      => 1024,
    );

    $this->load->library('upload');
    $this->upload->initialize($config);
    

    if($this->upload->do_upload('photo'))
    {

      $gbr                        = $this->upload->data();
      $config['image_library']		='gd2';
      $config['source_image']			='./uploads/banner/'.$gbr['file_name'];
      $config['create_thumb']			= FALSE;
      $config['maintain_ratio']		= FALSE;
      $config['width']            = 1920;
      $config['height']           = 240;
      $config['quality']				  = '50%';
      $config['new_image']			  = './uploads/banner/'.$gbr['file_name'];
      
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
