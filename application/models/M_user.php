<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_user extends CI_Model{

    /**
     * function for get all data
     */
    public function get($role = null){
      if($role != null) $this->db->where('user_role', $role);
      return $this->db->get('tb_user')->result();
    }

    /**
     * function for get data by id
     */
    public function getById($id){
      $this->db->where('user_id', $id)
                ->limit(1);

      return $this->db->get('tb_user');
    }

    /**
     * function for insert data
     */
    public function insert($data){
      $this->db->insert('tb_user', $data);
    }

    /**
     * function for update data
     */
    public function update($id, $data){
      $this->db->where('user_id', $id)
                ->update('tb_user', $data);
    }

    /**
     * function for delete data
     */
    public function delete($id){
      $this->db->where('user_id', $id)
                ->delete('tb_user');
    }

  }

?>