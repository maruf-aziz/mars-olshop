<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_authentication extends CI_Model{

    /**
     * function for login
     * $post for get user_email & user pass
     */
    public function login($email, $pass){

      $this->db->where('user_email', $email)
                ->where('user_pass', $pass);

      return $this->db->get('tb_user');

    }

    /**
     * function for login member
     */
    public function loginMember($email, $pass){

      $this->db->where('user_email', $email)
                ->where('user_pass', $pass)
                ->where('user_role', 2);

      return $this->db->get('tb_user');

    }

    /**
     * function for search data user by id
     * 1 account
     */
    public function getById($id){

      $this->db->where('user_id', $id);
      
      return $this->db->get('tb_user');

    }

  }

?>