<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 7/22/2018
 * Time: 11:55 AM
 */

class Mimages extends CI_Model
{
    protected $_table = "images";
    public function __construct()
    {
        parent::__construct();
    }
    public function listAllImages($all = 10,$start){
        $this->db->limit($all, $start);
        $this->db->order_by('img_id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
    }
    public function insertImage($data){
        $this->db->insert($this->_table,$data);
    }
    public function updateImage($data,$id){
        $this->db->where('img_id',$id);
        $this->db->update($this->_table,$data);
    }
    public function getImageById($id){
        $this->db->where('img_id',$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function deleteImage($id){
        $this->db->delete($this->_table, $id);
    }
    public function searchImagesByKeyword($keyword,$all = 10,$start){
        $this->db->like("img_title", $keyword);
        $this->db->limit($all, $start);
        $this->db->order_by('img_id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function filterImages($all,$start,$order="desc",$type="",$active=""){
        if($type != ""){
            $this->db->where("img_type",$type);
        }
        if($active != ""){
            $this->db->where("img_active",$active);
        }
        $this->db->limit($all, $start);
        $this->db->order_by('img_id',$order);
        return $this->db->get($this->_table)->result_array();
    }
    // Default

    public function default_callimage($img_type="", $orderby="desc"){
        if($img_type != ""){
            $this->db->where('img_type', $img_type);
        }
        $this->db->where('img_active',1);
        $this->db->order_by('img_id', $orderby);
        return $this->db->get($this->_table)->result_array();
    }
}