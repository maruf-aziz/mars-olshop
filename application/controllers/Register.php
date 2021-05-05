<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();

    $this->load->model('m_product', 'product');
    $this->load->model('m_category', 'category');
    $this->load->model('m_slider', 'slider');
    $this->load->model('m_popular', 'popular');
    $this->load->model('m_setting', 'set');
    $this->load->model('m_pages', 'page');
    $this->load->model('m_user', 'user');
		
	}
	public function index()
	{
		// data require
		$data = array(
			'title' 			=> 'Mars | Register',
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
      'money'     	=> $this->set->getByName('setting_money','mata_uang'),
      'category'		=> $this->category->get(),
    );
    
    if(!$this->session->has_userdata('cart')){
			$data['items'] = array();
			$data['total'] = 0;
		}

		else{
			$data['items'] = array_values(unserialize($this->session->userdata('cart')));
			$data['total'] = $this->total();
		}
		
    $this->template->load('template','frontend/auth/v_register', $data);
  }

  public function add(){
    $data = array(
			'title' 			=> 'Denayu | Register',
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
      'money'     	=> $this->set->getByName('setting_money','mata_uang'),
      'category'		=> $this->category->get(),
    );
    
    $this->form_validation->set_rules('user_name', 'user Name', 'trim|required');
    $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[tb_user.user_email]');
    $this->form_validation->set_rules('user_phone', 'Phone', 'trim|required');
    $this->form_validation->set_rules('user_pass', 'Password', 'trim|required|min_length[8]');
    $this->form_validation->set_rules('konf_pass', 'Confirmasi Password', 'trim|required|matches[user_pass]');

    if($this->form_validation->run() == FALSE) {
      $this->template->load('template','frontend/auth/v_register', $data);
    }

    else{

      $user = array(
        'user_name'     => $this->input->post('user_name', true),
        'user_role'     => 2, #2 = member
        'user_email'    => $this->input->post('user_email', true),
        'user_phone'    => $this->input->post('user_phone', true),
        'user_pass'     => md5($this->input->post('user_pass', true)),
      );

      $this->user->insert($user);

      if ($this->db->affected_rows() > 0) {
        # code...
        $this->session->set_flashdata('success2', 'Register , Success');
        redirect(base_url('login'));
      }

      else{
        $this->session->set_flashdata('error', 'Register , Failed !!!');
        redirect(base_url('register'));
      }

    }
  }

  private function total() {
		if(!isset($_SESSION['id_member'])){
			return 0 ;
		}
		else{
			$items = array_values(unserialize($this->session->userdata('cart')));
			$s = 0;
			foreach ($items as $item) {
					$s += $item['price'] * $item['qty'];
			}
			return $s;
		}
	}

}

?>