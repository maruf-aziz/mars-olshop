<?php

  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class M_pages extends CI_Model{

    /**
     * function for get pages home
     */
    public function getHome(){
      $this->db->limit(1);

      return $this->db->get('tb_page_home')->row();
    }

    /**
     * function for update pages home
     */
    public function updateHome($id, $data){
      $this->db->where('id', $id)
                ->update('tb_page_home', $data);
    }

    /**
     * function for get pages shop
     */
    public function getShop(){
      $this->db->limit(1);

      return $this->db->get('tb_page_shop')->row();
    }

    /**
     * function for update pages shop
     */
    public function updateShop($id, $data){
      $this->db->where('id', $id)
                ->update('tb_page_shop', $data);
    }

    /**
     * function for get pages cart
     */
    public function getCart(){
      $this->db->limit(1);

      return $this->db->get('tb_page_cart')->row();
    }

    /**
     * function for update pages cart
     */
    public function updateCart($id, $data){
      $this->db->where('id', $id)
                ->update('tb_page_cart', $data);
    }

    /**
     * function for get pages about
     */
    public function getAbout(){
      $this->db->limit(1);

      return $this->db->get('tb_page_about')->row();
    }

    /**
     * function for update pages about
     */
    public function updateAbout($id, $data){
      $this->db->where('id', $id)
                ->update('tb_page_about', $data);
    }

    /**
     * function for get pages contact
     */
    public function getContact(){
      $this->db->limit(1);

      return $this->db->get('tb_page_contact')->row();
    }

    /**
     * function for update pages contact
     */
    public function updateContact($id, $data){
      $this->db->where('id', $id)
                ->update('tb_page_contact', $data);
    }

  }

?>