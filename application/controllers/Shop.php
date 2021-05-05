<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	function __construct()
	{
		parent::__construct();

    $this->load->model('m_product', 'product');
		$this->load->model('m_category', 'category');
		$this->load->model('m_setting', 'set');
		$this->load->model('m_popular', 'popular');
		$this->load->model('m_pages', 'page');
		
	}

	public function index($id = null)
	{
		$data = array(
			'title' 			=> 'Mars | shop',
			'category' 		=> $this->category->get(),
			'priceMax'		=> $this->product->selectPriceMax(),
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
			'page'				=> $this->page->getShop(),

		);

		if(!$this->session->has_userdata('cart')){
			$data['items'] = array();
			$data['total'] = 0;
		}

		else{
			$data['items'] = array_values(unserialize($this->session->userdata('cart')));
			$data['total'] = $this->total();
		}

		if($id == null) $data['product'] = $this->product->get();		
		elseif ($id != null) $data['product'] = $this->product->getByIdCategory(rawurldecode($id));

    $this->template->load('template','frontend/shop/v_index', $data);
	}
	
	public function detail($id){
		$data = array(
			'title' 			=> 'Denayu | detail',
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
			'detail'			=> $this->product->getByName(rawurldecode($id)),
			'popular'     => $this->popular->get(),
			'newProduct'  => $this->product->getNewProduct(),
			'page'				=> $this->page->getShop(),
		);

		if(!$this->session->has_userdata('cart')){
			$data['items'] = array();
			$data['total'] = 0;
		}

		else{
			$data['items'] = array_values(unserialize($this->session->userdata('cart')));
			$data['total'] = $this->total();
		}

		$this->template->load('template','frontend/shop/v_detail', $data);
	}

	public function show($category = null, $order = null){

		$money = $this->set->getByName('setting_money','mata_uang');

		$this->db->select('*, tb_product.updated_at as update')
								->join('tb_category_product', 'tb_product.product_category = tb_category_product.category_id');
		
		if($category != null and $category != '0') $this->db->where('tb_category_product.category_name', rawurldecode($category));
		if($order != null) $this->db->order_by('tb_product.product_price', $order);

		$get = $this->db->get('tb_product')->result();

		foreach ($get as $key => $val) {
			# code...
			echo "
					<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
						<!-- Block2 -->
						<div class='block2'>
							<div class='block2-img wrap-pic-w of-hidden pos-relative block2-labelnew'>
								<img src='".base_url('uploads/product/').$val->product_img."' alt='IMG-PRODUCT'>

								<div class='block2-overlay trans-0-4'>
									<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
										<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
										<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
									</a>

									<div class='block2-btn-addcart w-size1 trans-0-4'>
										<!-- Button -->
										<a href='".base_url('cart/buy/'.$val->product_id)."'>
											<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
												Add to Cart
											</button>
										</a>
									</div>
								</div>
							</div>

							<div class='block2-txt p-t-20'>
								<a href='".base_url('shop/detail/'.$val->product_name)."' class='block2-name dis-block s-text3 p-b-5'>
									$val->product_name
								</a>

								<span class='block2-price m-text6 p-r-5'>
									".$money.". ".rupiah($val->product_price)."
								</span>
							</div>
						</div>
					</div>
			";
		}
		
	}

	public function search($name = null){
		$this->db->select('*, tb_product.updated_at as update')
							->join('tb_category_product', 'tb_product.product_category = tb_category_product.category_id');
	
		if($name != null) $this->db->like('tb_product.product_name', $name);

		$get = $this->db->get('tb_product')->result();

		foreach ($get as $key => $val) {
			# code...
			echo "
					<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
						<!-- Block2 -->
						<div class='block2'>
							<div class='block2-img wrap-pic-w of-hidden pos-relative block2-labelnew'>
								<img src='".base_url('uploads/product/').$val->product_img."' alt='IMG-PRODUCT'>

								<div class='block2-overlay trans-0-4'>
									<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
										<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
										<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
									</a>

									<div class='block2-btn-addcart w-size1 trans-0-4'>
										<!-- Button -->
										<a href='".base_url('cart/buy/'.$val->product_id)."'>
											<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
												Add to Cart
											</button>
										</a>
									</div>
								</div>
							</div>

							<div class='block2-txt p-t-20'>
								<a href='".base_url('shop/detail/'.$val->product_name)."' class='block2-name dis-block s-text3 p-b-5'>
									$val->product_name
								</a>

								<span class='block2-price m-text6 p-r-5'>
									IDR. ".rupiah($val->product_price)."
								</span>
							</div>
						</div>
					</div>
			";
		}
	}

	public function filter($low , $up){
		$this->db->select('*, tb_product.updated_at as update')
							->join('tb_category_product', 'tb_product.product_category = tb_category_product.category_id')
							->where('tb_product.product_price >=', $low)
							->where('tb_product.product_price <=', $up);

		$get = $this->db->get('tb_product')->result();

		foreach ($get as $key => $val) {
			# code...
			echo "
					<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
						<!-- Block2 -->
						<div class='block2'>
							<div class='block2-img wrap-pic-w of-hidden pos-relative block2-labelnew'>
								<img src='".base_url('uploads/product/').$val->product_img."' alt='IMG-PRODUCT'>

								<div class='block2-overlay trans-0-4'>
									<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
										<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
										<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
									</a>

									<div class='block2-btn-addcart w-size1 trans-0-4'>
										<!-- Button -->
										<a href='".base_url('cart/buy/'.$val->product_id)."'>
											<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
												Add to Cart
											</button>
										</a>
									</div>
								</div>
							</div>

							<div class='block2-txt p-t-20'>
								<a href='".base_url('shop/detail/'.$val->product_name)."' class='block2-name dis-block s-text3 p-b-5'>
									$val->product_name
								</a>

								<span class='block2-price m-text6 p-r-5'>
									IDR. ".rupiah($val->product_price)."
								</span>
							</div>
						</div>
					</div>
			";
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
