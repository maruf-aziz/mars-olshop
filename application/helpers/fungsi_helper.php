<?php

function check_alredy_login()
{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('user_id');
	if($user_session){
		redirect(base_url('auth/authentication'));
	}
}

function check_not_login()
{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('user_id');
	if(!$user_session){
		redirect(base_url('auth/authentication'));
	}
}

function check_admin()
{
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if($ci->fungsi->user_login()->user_role != 1)
	{
		redirect(base_url('Home'));	
	}
}

// function check_user(){
// 	$ci =& get_instance();
// 	$ci->load->library('fungsi');
// 	if($ci->fungsi->user_login()->user_role != 2)
// 	{
// 		redirect(base_url(''));
// 	}
// }

?>