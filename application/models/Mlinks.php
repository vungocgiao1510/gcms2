<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 7/22/2018
 * Time: 11:55 AM
 */

class Mlinks extends CI_Model
{
    protected $_table = "links";
    public function __construct()
    {
        parent::__construct();
    }
    public function listAllLinks($all = 10,$start){
        $this->db->limit($all, $start);
        $this->db->order_by('link_id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
    }
    public function insertLink($data){
        $this->db->insert($this->_table,$data);
    }
    public function updateLink($data,$id){
        $this->db->where('link_id',$id);
        $this->db->update($this->_table,$data);
    }
    public function getLinkById($id){
        $this->db->where('link_id',$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function deleteLink($id){
        $this->db->delete($this->_table, $id);
    }
    public function searchLinksByKeyword($keyword,$all = 10,$start){
        $this->db->like("link_title", $keyword);
        $this->db->limit($all, $start);
        $this->db->order_by('link_id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function filterLinks($all,$start,$order="desc",$type="",$active=""){
        if($type != ""){
            $this->db->where("link_type",$type);
        }
        if($active != ""){
            $this->db->where("link_active",$active);
        }
        $this->db->limit($all, $start);
        $this->db->order_by('link_id',$order);
        return $this->db->get($this->_table)->result_array();
    }
}