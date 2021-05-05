<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_category extends CI_Model{

    /**
     * function for get all data
     */
    public function get(){
      $this->db->order_by('category_name', 'ASC');
      return $this->db->get('tb_category_product')->result();
    }

    /**
     * function for get data by id
     */
    public function getById($id){
      $this->db->where('category_id', $id)
                ->limit(1);

      return $this->db->get('tb_category_product');
    }

    /**
     * function for insert data
     */
    public function insert($data){
      $this->db->insert('tb_category_product', $data);
    }

    /**
     * function for update data
     */
    public function update($id, $data){
      $this->db->where('category_id', $id)
                ->update('tb_category_product', $data);
    }

    /**
     * function for delete data
     */
    public function delete($id){
      $this->db->where('category_id', $id)
                ->delete('tb_category_product');
    }

  }

?>