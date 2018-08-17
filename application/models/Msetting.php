<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 8/2/2018
 * Time: 8:52 AM
 */

class Msetting extends CI_Model
{
    protected $_table;
    public function __construct()
    {
        parent::__construct();
    }
    public function getSetting($id='1'){
        $this->db->where('setting_id',$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateSetting($id='1',$data){
        $this->db->where('setting_id',$id);
        $this->db->update($this->_table,$data);
    }
}