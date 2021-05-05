<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_bank extends CI_Model{

    /**
     * function for get all data
     */
    public function get(){
      return $this->db->get('tb_bank')->result();
    }

    /**
     * function for get data by id
     */
    public function getById($id){
      $this->db->where('bank_id', $id)
                ->limit(1);

      return $this->db->get('tb_bank');
    }

    /**
     * function for insert data
     */
    public function insert($data){
      $this->db->insert('tb_bank', $data);
    }

    /**
     * function for update data
     */
    public function update($id, $data){
      $this->db->where('bank_id', $id)
                ->update('tb_bank', $data);
    }

    /**
     * function for delete data
     */
    public function delete($id){
      $this->db->where('bank_id', $id)
                ->delete('tb_bank');
    }

  }

?>