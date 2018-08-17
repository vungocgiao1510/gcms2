<?php
class Mseo extends CI_Model
{
    protected $_table = "seo";

    public function __construct()
    {
        parent::__construct();
    }
    public function getSeoById($id){
        $this->db->where("seo_id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateSeo($id,$data){
        $this->db->where("seo_id",$id);
        $this->db->update($this->_table,$data);
    }
}