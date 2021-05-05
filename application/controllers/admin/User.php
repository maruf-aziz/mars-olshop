<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
    check_admin();

    $this->load->model('m_user', 'user');
		
	}

	public function index()
	{
		$data = array(
      'title' 			=> 'Admin | user',
      'user'        => $this->user->get(1) #1 = role admin
		);

    $this->admin_template->load('admin_template','backend/user/v_index', $data);
  }

  public function add()
  {
    $data = array(
      'title'       => 'Admin | Add user'
    );

    if(isset($_POST['addData'])){
      #code add user
      $this->form_validation->set_rules('user_name', 'user Name', 'trim|required');
      $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[tb_user.user_email]');
      $this->form_validation->set_rules('user_addres', 'Addres', 'trim|required');
      $this->form_validation->set_rules('user_phone', 'Phone', 'trim|required');
      $this->form_validation->set_rules('user_pass', 'Password', 'trim|required|min_length[8]');
      $this->form_validation->set_rules('user_pass_conf', 'Confirmasi Password', 'trim|required|matches[user_pass]');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/user/v_add', $data);
      }

      else{

        $upload = $this->upload();

        if($upload['result'] == "success"){

          $user = array(
            'user_name'     => $this->input->post('user_name', true),
            'user_role'     => 1, #1 = admin
            'user_email'    => $this->input->post('user_email', true),
            'user_addres'   => $this->input->post('user_addres', true),
            'user_phone'    => $this->input->post('user_phone', true),
            'user_pass'     => md5($this->input->post('user_pass', true)),
            'user_img'      => $upload['file']['file_name'],
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
          );

          $this->user->insert($user);

          if ($this->db->affected_rows() > 0) {
            # code...
            $this->session->set_flashdata('success', 'Insert user , Success');
            redirect(base_url('admin/user'));
          }

          else{
            $this->session->set_flashdata('error', 'Insert user , Failed !!!');
            redirect(base_url('admin/user'));
          }

        }

        else{

          $data['message'] = $upload['error'];
          $this->admin_template->load('admin_template','backend/user/v_add', $data);

        } 

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/user/v_add', $data);
    }
  }

  public function update_pass($id){
    $user = array(
      'user_pass' => md5($this->input->post('password', true))
    );

    $this->user->update($id,$user);
    
    if ($this->db->affected_rows() > 0) {
      # code...
      $this->session->set_flashdata('success', 'Change Password , Success');
      redirect(base_url('admin/user'));
    }

    else{
      $this->session->set_flashdata('error', 'Change Password , Failed !!!');
      redirect(base_url('admin/user'));
    }

  }

  public function update($id){
    $data = array(
      'title'       => 'Admin | Upadate user',
      'user'        => $this->user->getById($id)->row()
    );

    if(isset($_POST['addData'])){
      #code add user
      $this->form_validation->set_rules('user_name', 'user Name', 'trim|required');
      $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|callback_cek_email');
      $this->form_validation->set_rules('user_addres', 'Addres', 'trim|required');
      $this->form_validation->set_rules('user_phone', 'Phone', 'trim|required');

			if($this->form_validation->run() == FALSE) {
        $this->admin_template->load('admin_template','backend/user/v_edit', $data);
      }

      else{

        if($_FILES AND $_FILES['user_file']['name']){

          $upload = $this->upload();

          if($upload['result'] == "success"){

            $this->db->where('user_id', $id);
						$img_unlink = $this->db->get('tb_user');
            $row = $img_unlink->row();

            if($row->user_img != null) unlink("./uploads/user/$row->user_img");

            $user = array(
              'user_name'     => $this->input->post('user_name', true),
              'user_email'    => $this->input->post('user_email', true),
              'user_addres'   => $this->input->post('user_addres', true),
              'user_phone'    => $this->input->post('user_phone', true),
              'user_img'      => $upload['file']['file_name'],
              'updated_at'    => date('Y-m-d H:i:s'),
            );
    
            $this->user->update($id,$user);
    
            if ($this->db->affected_rows() > 0) {
              # code...
              $this->session->set_flashdata('success', 'Update user , Success');
              redirect(base_url('admin/user'));
            }
    
            else{
              $this->session->set_flashdata('error', 'Update user , Failed !!!');
              redirect(base_url('admin/user'));
            }

          }

          else{

            $data['message'] = $upload['error'];
            $this->admin_template->load('admin_template','backend/user/v_edit', $data);

          }

        }

        else{

          $user = array(
            'user_name'     => $this->input->post('user_name', true),
            'user_email'    => $this->input->post('user_email', true),
            'user_addres'   => $this->input->post('user_addres', true),
            'user_phone'    => $this->input->post('user_phone', true),
            'updated_at'    => date('Y-m-d H:i:s'),
          );
  
          $this->user->update($id,$user);
  
          if ($this->db->affected_rows() > 0) {
            # code...
            $this->session->set_flashdata('success', 'Update user , Success');
            redirect(base_url('admin/user'));
          }
  
          else{
            $this->session->set_flashdata('error', 'Update user , Failed !!!');
            redirect(base_url('admin/user'));
          }

        }      

      }
    }
    else{
      $this->admin_template->load('admin_template','backend/user/v_edit', $data);
    }
  }

  public function delete($id){
    $this->db->where('user_id', $id);
    $img_unlink = $this->db->get('tb_user');
    $row = $img_unlink->row();

    if($row->user_img != null) unlink("./uploads/user/$row->user_img");

    $this->user->delete($id);

    if ($this->db->affected_rows() > 0) {
      # code...
      $this->session->set_flashdata('success', 'Delete user , Success');
      redirect(base_url('admin/user'));
    }

    else{
      $this->session->set_flashdata('error', 'Delete user , Failed !!!');
      redirect(base_url('admin/user'));
    }
  }

  public function upload(){
    $config = array(
			'upload_path' => './uploads/user/',
			'allowed_types' => 'gif|jpg|png',
			'file_name' => 'usr_'.round(microtime(true)*1000),
			'overwrite' => true,
			'max_size' => 1024
		);

		$this->load->library('upload');
		$this->upload->initialize($config);
		

		if($this->upload->do_upload('user_file'))
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
  
  
}
