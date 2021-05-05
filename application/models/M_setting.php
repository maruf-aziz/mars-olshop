<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_setting extends CI_Model{

    /**
     * function for get all data
     */
    public function get($setting_type = null, $setting_name = null){

      if($setting_type != null) $this->db->where('setting_type', $setting_type);
      if($setting_name != null) $this->db->where('setting_name', $setting_name);

      return $this->db->get('tb_setting')->result();
    }

    /**
     * function for get data by name
     */
    public function getByName($setting_type, $setting_name){
      
      $this->db->where('setting_type', $setting_type)
                ->where('setting_name', $setting_name);

      return $this->db->get('tb_setting')->row('setting_value');
    }

    /**
     * function for update data
     */
    public function update($setting_name, $data){

      $this->db->where('setting_name', $setting_name)
                ->update('tb_setting', $data);
    }


  }

?>