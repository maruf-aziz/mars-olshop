<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct()
	{
		parent::__construct();

    $this->load->model('m_product', 'product');
		$this->load->model('m_category', 'category');
		$this->load->model('m_setting', 'set');
		$this->load->model('m_pages', 'page');
		$this->load->model('m_transactions', 'transaction');
		$this->load->model('m_bank', 'bank');
		$this->load->model('m_confirm', 'confirm');
		$this->load->helper('string');	
	}
	
	public function index($param = null)
	{
		$data = array(
			'title' 			=> 'Mars | cart',
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
			'display'				=> ($param == null ? 'none' : $param),
		);

		if(!$this->session->has_userdata('cart')){
			$data['items'] = array();
			$data['total'] = 0;
		}

		else{
			$data['items'] = array_values(unserialize($this->session->userdata('cart')));
			$data['total'] = $this->total();
		}

    $this->template->load('template','frontend/cart/v_index', $data);
	}
	
	public function buy($id = null){

		if(!isset($_SESSION['id_member'])){
			redirect(base_url('login'));
		}
		else{
			

			$product;
			$qty = 1;

			if($id != null) $product = $this->product->getById($id)->row();

			else{
				$id_p = $this->input->post('id', true);
				$qty 	= $this->input->post('qty', true);

				$product = $this->product->getById($id_p)->row();
			}

			$item = array(
				'id'		=> $product->product_id,
				'img' 	=> $product->product_img,
				'name'	=> $product->product_name,
				'price'	=> $product->product_price,
				'desc'	=> '',
				'qty'		=> $qty,
			);

			if(!$this->session->has_userdata('cart')) {
				$cart = array($item);
				$this->session->set_userdata('cart', serialize($cart));
			} else {
					$index = $this->exists($id);
					$cart = array_values(unserialize($this->session->userdata('cart')));
					if($index == -1) {
							array_push($cart, $item);
							$this->session->set_userdata('cart', serialize($cart));
					} else {
							$cart[$index]['qty']++;
							$this->session->set_userdata('cart', serialize($cart));
					}
			}

			$this->session->set_flashdata('success', $item['name']);

			// redirect(base_url('shop'));
			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}

	}

	public function remove($id)
	{
		if(!isset($_SESSION['id_member'])){
			redirect(base_url('login'));
		}
		else{
			$index = $this->exists($id);
			$cart = array_values(unserialize($this->session->userdata('cart')));
			unset($cart[$index]);
			$this->session->set_userdata('cart', serialize($cart));
			redirect(base_url('cart'));
		}
	}

	private function exists($id)
	{
			$cart = array_values(unserialize($this->session->userdata('cart')));
			for ($i = 0; $i < count($cart); $i ++) {
					if ($cart[$i]['id'] == $id) {
							return $i;
					}
			}
			return -1;
	}

	public function update(){
		if(!isset($_SESSION['id_member'])){
			redirect(base_url('login'));
		}
		else{
			$id 		= $this->input->post('id', true);
			$qty 		= $this->input->post('qty', true);
			$desc 	= $this->input->post('desc', true);
			$cart = array_values(unserialize($this->session->userdata('cart')));

			if(count($id) > 0){
				foreach ($id as $item => $val) {
					# code...

					$index = $this->exists($id[$item]);
					$cart[$index]['qty'] 	= $qty[$item];  
					$cart[$index]['desc'] = $desc[$item];  
					$this->session->set_userdata('cart', serialize($cart));

					// echo $id[$item];

				}

				// for ($i=0; $i < count($id); $i++) { 
				// 	# code...
				// 	$index = $this->exists($id[$i]);
				// 	$cart[$index]['qty'] = $qty[$i]; 
				// 	$this->session->set_userdata('cart', serialize($cart));
				// }
			}

			

			// header('Location: ' . $_SERVER['HTTP_REFERER']);
			$this->index('block');
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

	public function count(){
		if(!isset($_SESSION['id_member'])){
			echo '0';
		}
		else{
			if($this->session->has_userdata('cart')){
				$items = array_values(unserialize($this->session->userdata('cart')));
				$s = 0;
				foreach ($items as $item) {
						$s++;
				}
				echo $s;
			}
			else{
				echo '0';
			}
			
		}
	}

	public function show(){
		
		$cart = array_values(unserialize($this->session->userdata('cart')));
		$money = $this->set->getByName('setting_money','mata_uang');

		foreach ($cart as $key => $val) {
			# code...
			echo "
				<tr class='table-row'>
					<td>
						<div class='cart-img-product b-rad-4 o-f-hidden'>
							<img src='".base_url('uploads/product/'.$val['img'])."' alt='IMG-PRODUCT'>
						</div>
					</td>
					<td>".$val['name']."</td>
					<td>
						".$money.' '.rupiah($val['price'])."
						<input type='hidden' id='price' value='".$val['price']."'>
					</td>
					<td>
						<div class='flex-w bo5 of-hidden w-size17'>
							<button class='btn-num-product-down color1 flex-c-m size7 bg8 eff2'>
								<i class='fs-12 fa fa-minus' aria-hidden='true'></i>
							</button>

							<input class='size8 m-text18 t-center num-product' type='number' name='num-product1' id='qty' value='".$val['qty']."'>

							<button class='btn-num-product-up color1 flex-c-m size7 bg8 eff2'>
								<i class='fs-12 fa fa-plus' aria-hidden='true'></i>
							</button>
						</div>
					</td>
					<td>
						<textarea name='' id='' class='form-control' cols='20' rows='2'></textarea>
					</td>
					<td>".$money.' '.rupiah($val['price'] * $val['qty'])."</td>
					<td>
						<a href='".base_url('cart/remove/'.$val['id'])."' class='btn btn-danger btn-sm'>Delete</a>
					</td>
				</tr>
			";
		}
	}

	public function checkout(){
		// save

		$road 				= $this->input->post('road', true);
		$subdistrict 	= $this->input->post('subdistrict', true);
		$disctrict 		= $this->input->post('disctrict', true);
		$province 		= $this->input->post('province', true);
		$usage 				= $this->input->post('usage', true);
		$code					= 'TRx-'.random_string('alnum', 8);
		
		$transaction = array(
			'transaction_total'				=> $this->total(),
			'transaction_discount'		=> 0,
			'transaction_uniq_number'	=> rand(10,499),
			'transaction_code'				=> $code,
			'transaction_usage'				=> $usage,
			'transaction_user'				=> $_SESSION['id_member'],
			'transaction_addres'			=> $road.", ".$subdistrict.", ".$disctrict.", ".$province,
		);

		// echo "<pre>"; print_r($transaction);

		$idTransaction = $this->transaction->insert($transaction);

		// $idTransaction = 1;

		$cart = array_values(unserialize($this->session->userdata('cart')));

		for ($i = 0; $i < count($cart); $i ++) {
				$detail = array(
					'transaction_id'									=> $idTransaction,
					'transaction_product_id'					=> $cart[$i]['id'],
					'transaction_detail_qty'					=> $cart[$i]['qty'],
					'transaction_detail_price'				=> $cart[$i]['price'],
					'transaction_detail_subTotal'			=> $cart[$i]['price'] * $cart[$i]['qty'],
					'transaction_detail_discount'			=> 0,
					'transaction_detail_extra'				=> $cart[$i]['desc'],
				);

				$this->transaction->insertDetail($detail);

				$this->removeAll($cart[$i]['id']);

				// echo "<pre>"; print_r($detail);
		}

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Transaction Success');
			// redirect(base_url('cart/invoice/'.$code));
			$data = array(
				'trx'				=> $this->transaction->getById($code),
				'detail'		=> $this->transaction->getData($code),
				'bank'			=> $this->bank->get(),
			);
	
			$this->load->view('frontend/cart/invoice', $data);
		}
		else{
			$this->session->set_flashdata('error', 'Transaction, Failed !!!');
    	redirect(base_url('cart'));
		};
	}

	public function removeAll($id){
		$index = $this->exists($id);
		$cart = array_values(unserialize($this->session->userdata('cart')));
		unset($cart[$index]);
		$this->session->set_userdata('cart', serialize($cart));
	}

	public function invoice($id){
		$data = array(
			'trx'				=> $this->transaction->getById($id),
			'detail'		=> $this->transaction->getData($id),
			'bank'			=> $this->bank->get(),
		);

		$this->load->view('frontend/cart/invoice', $data);
	}

	public function sendConfirmation(){

		$code = $this->input->post('confirm_code', true);

		$upload = $this->upload();

		if($upload['result'] == "success"){
			$data = array(
				'confirm_code' 				=> $this->input->post('confirm_code', true),
				'confirm_total' 			=> $this->input->post('confirm_total', true),
				'confirm_user' 				=> $this->input->post('confirm_user', true),
				'confirm_img'					=> $upload['file']['file_name'],
			);

			#code insert
			$this->confirm->insert($data);

			if ($this->db->affected_rows() > 0) {
				# code...
				$this->session->set_flashdata('success', 'Confirmation Success, please waiting accepted an admin');
				redirect(base_url('history'));
			}

			else{
				$this->session->set_flashdata('success', 'Confirmation , Failed !!!');
				redirect(base_url('cart/invoice/'.$code));
			}

		}

		else{
			$this->session->set_flashdata('success', $upload['error']);
			redirect(base_url('cart/invoice/'.$code));
		}

		
	}

	public function upload(){
		$config = array(
			'upload_path' => './uploads/confirmation/',
			'allowed_types' => 'gif|jpg|png|JPEG',
			'file_name' => 'confirm_'.round(microtime(true)*1000),
			'overwrite' => true,
		);

		$this->load->library('upload');
		$this->upload->initialize($config);
		

		if($this->upload->do_upload('file_tf'))
		{
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
