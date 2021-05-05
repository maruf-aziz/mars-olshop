<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
    $id = $_SESSION['id_member'];
		// data require
		$data = array(
			'title' 			=> 'Mars | Profile',
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
      'profile'     => $this->user->getById($id)->row(),
    );
    
    if(!$this->session->has_userdata('cart')){
			$data['items'] = array();
			$data['total'] = 0;
		}

		else{
			$data['items'] = array_values(unserialize($this->session->userdata('cart')));
			$data['total'] = $this->total();
		}
		
    $this->template->load('template','frontend/profile/v_index', $data);
  }

  public function update($id){
    $data = array(
			'title' 			=> 'Denayu | Profile',
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
    $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|callback_cek_email');
    $this->form_validation->set_rules('user_phone', 'Phone', 'trim|required');

    if(!empty($this->input->post('user_pass'))){
      $this->form_validation->set_rules('user_pass', 'Password', 'trim|required|min_length[8]');
      $this->form_validation->set_rules('konf_pass', 'Confirmasi Password', 'trim|required|matches[user_pass]');
    }
    

    if($this->form_validation->run() == FALSE) {
      $this->template->load('template','profile/v_index', $data);
    }

    else{

      $user = array(
        'user_name'     => $this->input->post('user_name', true),
        'user_role'     => 2, #2 = member
        'user_email'    => $this->input->post('user_email', true),
        'user_phone'    => $this->input->post('user_phone', true),        
      );

      if(!empty($this->input->post('user_pass'))){
        $user['user_pass'] = md5($this->input->post('user_pass', true));
      }

      $this->user->update($id,$user);

      if ($this->db->affected_rows() > 0) {
        # code...
        $this->session->set_flashdata('success2', 'Update Profile , Success');
        redirect(base_url('profile'));
      }

      else{
        $this->session->set_flashdata('error', 'Update Profile , Failed !!!');
        redirect(base_url('profile'));
      }

    }
  }

  public function cek_email(){
    $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_user WHERE user_email = '$post[user_email]' AND user_id != '$post[user_id]'");

		if($query->num_rows() > 0)
		{
			$this->form_validation->set_message('cek_email', '%s is already !!');
			return FALSE;
		}

		else
		{
			return TRUE;
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