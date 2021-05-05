<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct()
	{
		parent::__construct();

    $this->load->model('m_product', 'product');
    $this->load->model('m_category', 'category');
    $this->load->model('m_slider', 'slider');
    $this->load->model('m_popular', 'popular');
    $this->load->model('m_setting', 'set');
    $this->load->model('m_pages', 'page');
    $this->load->model('m_authentication', 'auth');	
    $this->load->model('m_user', 'user');
		
	}
	public function index()
	{
		// data require
		$data = array(
			'title' 			=> 'Mars | Login',
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
      'popular'     => $this->popular->get(),
      'newProduct'  => $this->product->getNewProduct(),
      'page'        => $this->page->getHome(),
		);

		if(!$this->session->has_userdata('cart')){
			$data['items'] = array();
			$data['total'] = 0;
		}

		else{
			$data['items'] = array_values(unserialize($this->session->userdata('cart')));
			$data['total'] = $this->total();
		}
		
    $this->template->load('template','frontend/auth/v_login', $data);
  }

  public function login(){
    $user_email = $this->input->post('user_email', true);
    $user_pass 	= md5($this->input->post('user_pass', true));
    
    $check_account = $this->auth->loginMember($user_email, $user_pass);

		if($check_account->num_rows() > 0){
			$row = $check_account->row();
			$param = array(
				'id_member'       => $row->user_id,
				'role'		        => $row->user_role,
				'name_member'		  => $row->user_name,
				'email_member'		=> $row->user_name
      );
      
      $this->session->set_userdata($param);

			$update_last_login = array(
				'user_last_login' 	=> date('Y-m-d H:i:s')
			);

			$id = $row->user_id;

			$this->user->update($id, $update_last_login);

			$role = $row->user_role;

			if($role == 2){
				redirect(base_url('home'));
			}

			else{
				redirect(base_url('login'));
			}

		}

		else{
			$this->session->set_flashdata('error', 'maaf , login gagal !!!');
			redirect(base_url('login'));
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

	public function logout(){
		$params = array('id_member');
		$this->session->unset_userdata($params);
		redirect(base_url('home'));
	}

}

?>