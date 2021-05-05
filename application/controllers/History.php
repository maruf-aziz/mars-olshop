<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

  function __construct()
	{
		parent::__construct();

    $this->load->model('m_product', 'product');
		$this->load->model('m_category', 'category');
		$this->load->model('m_setting', 'set');
		$this->load->model('m_pages', 'page');
		$this->load->model('m_transactions', 'transaction');
		$this->load->helper('string');	
  }
  
	public function index()
	{
    $data = array(
			'title' 			=> 'Mars | History',
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
      'page'				=> $this->page->getCart(),
    );
    
    if(isset($_SESSION['id_member'])){
      $data['transaction'] = $this->transaction->get($_SESSION['id_member']);
    }

		if(!$this->session->has_userdata('cart')){
			$data['items'] = array();
			$data['total'] = 0;
		}

		else{
			$data['items'] = array_values(unserialize($this->session->userdata('cart')));
			$data['total'] = $this->total();
		}

		$this->template->load('template','frontend/history/v_index', $data);
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
