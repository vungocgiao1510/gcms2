<?php
class Mdesginer extends CI_Model
{
    protected $_table = "desginer";

    public function __construct()
    {
        parent::__construct();
    }
    public function getDesginerById($id="1"){
        $this->db->where("id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateDesginer($id,$data){
        $this->db->where("id",$id);
        $this->db->update($this->_table,$data);
    }
}