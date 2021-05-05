<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_confirm extends CI_Model{

    /**
     * function for get all data
     */
    public function get(){
      
      $this->db->select('*, tb_transaction_confirm.created_at as dibuat');
      $this->db->join('tb_transaction', 'tb_transaction_confirm.confirm_code = tb_transaction.transaction_id');
      $this->db->join('tb_user', 'tb_transaction.transaction_user = tb_user.user_id');

      return $this->db->get('tb_transaction_confirm')->result();
    }

    /**
     * function for get data by id
     */
    public function getById($id){
      $this->db->where('confirm_id', $id)
                ->limit(1);

      return $this->db->get('tb_transaction_confirm');
    }

    /**
     * function for insert data
     */
    public function insert($data){
      $this->db->insert('tb_transaction_confirm', $data);
    }

    /**
     * function for update data
     */
    public function update($id, $data){
      $this->db->where('confirm_id', $id)
                ->update('tb_transaction_confirm', $data);
    }

    /**
     * function for delete data
     */
    public function delete($id){
      $this->db->where('confirm_id', $id)
                ->delete('tb_transaction_confirm');
    }

  }

?>