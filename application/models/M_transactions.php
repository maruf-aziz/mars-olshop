<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_transactions extends CI_Model{

    /**
     * function for get all data
     */
    public function get($id = null){
      $this->db->select('*, tb_transaction.created_at as dibuat');
      $this->db->join('tb_user', 'tb_transaction.transaction_user = tb_user.user_id');

      if($id != null) $this->db->where('transaction_user', $id);

      $this->db->order_by('transaction_id', 'DESC');
      return $this->db->get('tb_transaction')->result();
    }

    /**
     * function for get detail transaski by id transaksi
     */
    public function getData($id){
      $this->db->select('* , tb_transaction.created_at as dibuat')
                ->join('tb_transaction', 'tb_transaction_detail.transaction_id = tb_transaction.transaction_id')
                ->join('tb_user', 'tb_transaction.transaction_user = tb_user.user_id')
                ->join('tb_product', 'tb_transaction_detail.transaction_product_id = tb_product.product_id', 'left')
                ->where('tb_transaction.transaction_code', $id);

      return $this->db->get('tb_transaction_detail')->result();
    }

    /**
     * function for get data by id
     */
    public function getById($id){
      $this->db->select('*, tb_transaction.created_at as dibuat')
                ->join('tb_user', 'tb_transaction.transaction_user = tb_user.user_id')
                ->where('tb_transaction.transaction_code', $id);

      return $this->db->get('tb_transaction')->row();
    }

    /**
     * function for insert data
     */
    public function insert($data){
      $this->db->insert('tb_transaction', $data);

      return $this->db->insert_id();
    }

    /**
     * insert detail transaction
     */
    public function insertDetail($data){
      $this->db->insert('tb_transaction_detail', $data);
    }

    /**
     * function for update data
     */
    public function update($id, $data){
      $this->db->where('transaction_id', $id)
                ->update('tb_transaction', $data);
    }

    /**
     * function for delete data
     */
    public function delete($id){
      $this->db->where('transaction_id', $id)
                ->delete('tb_transaction');
    }

  }

?>