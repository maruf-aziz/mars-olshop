<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_product extends CI_Model{

    /**
     * function for get all data
     */
    public function get(){
      $this->db->select('*, tb_product.updated_at as update')
                ->join('tb_category_product', 'tb_product.product_category = tb_category_product.category_id')
                ->order_by('tb_product.updated_at', 'DESC');
      return $this->db->get('tb_product')->result();
    }

    /**
     * function for get data by id
     */
    public function getById($id){
      $this->db->where('product_id', $id)
                ->limit(1);

      return $this->db->get('tb_product');
    }

    /**
     * function get by name
     */
    public function getByName($id){
      $this->db->select('*, tb_product.updated_at as update')
                ->join('tb_category_product', 'tb_product.product_category = tb_category_product.category_id')
                ->where('tb_product.product_name', $id);
      return $this->db->get('tb_product')->row();
    }

    /**
     * function for get 6 new 5
     */
    public function getNewProduct(){
      $this->db->select('*, tb_product.updated_at as update')
                ->join('tb_category_product', 'tb_product.product_category = tb_category_product.category_id')
                ->order_by('tb_product.updated_at', 'DESC')
                ->limit(6);
      return $this->db->get('tb_product')->result();
    }

    /**
     * function for insert data
     */
    public function insert($data){
      $this->db->insert('tb_product', $data);
    }

    /**
     * function for update data
     */
    public function update($id, $data){
      $this->db->where('product_id', $id)
                ->update('tb_product', $data);
    }

    /**
     * function for delete data
     */
    public function delete($id){
      $this->db->where('product_id', $id)
                ->delete('tb_product');
    }

    /**
     * function for select price max
     */
    public function selectPriceMax(){
      $this->db->select_max('product_price');

      return $this->db->get('tb_product')->row();
    }

    /**
     * function for select by id category
     */
    public function getByIdCategory($id){
      $this->db->select('*, tb_product.updated_at as update')
                ->join('tb_category_product', 'tb_product.product_category = tb_category_product.category_id')
                ->where('tb_category_product.category_name', $id)
                ->order_by('tb_product.created_at', 'DESC');
      return $this->db->get('tb_product')->result();
    }

  }

?>