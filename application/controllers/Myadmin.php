<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myadmin extends CI_Controller {

	public function index()
	{
		redirect(base_url('admin/dashboard'));
  }
  
  
}
