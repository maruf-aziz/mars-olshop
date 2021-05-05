<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_popular extends CI_Model{

    /**
     * function for get all data
     */
    public function get(){
      $this->db->select('*, tb_popular.updated_at as update')
                ->join('tb_product', 'tb_popular.popular_product = tb_product.product_id');
      return $this->db->get('tb_popular')->result();
    }

    /**
     * function for get data by id
     */
    public function getById($id){
      $this->db->where('popular_id', $id)
                ->limit(1);

      return $this->db->get('tb_popular');
    }

    /**
     * function for insert data
     */
    public function insert($data){
      $this->db->insert('tb_popular', $data);
    }

    /**
     * function for update data
     */
    public function update($id, $data){
      $this->db->where('popular_id', $id)
                ->update('tb_popular', $data);
    }

    /**
     * function for delete data
     */
    public function delete($id){
      $this->db->where('popular_id', $id)
                ->delete('tb_popular');
    }

  }

?>