<?php
class Mnews extends CI_Model{
    protected $_table = "news";
    protected $_table2 = "news_relationship";
    public function __construct()
    {
        parent::__construct();
    }
    public function listAllNews($all = 10,$start){
        $this->db->limit($all, $start);
        $this->db->order_by('new_id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function getLastIDNews(){
        $this->db->select("new_id");
        $this->db->limit(1);
        $this->db->order_by("new_id","desc");
        return $this->db->get($this->_table)->row_array();
    }
    public function getNewsById($id){
        $this->db->where("new_id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function searchNewsByKeyword($keyword,$all = 10,$start){
        $this->db->like("new_name", $keyword);
        $this->db->limit($all, $start);
        $this->db->order_by('new_id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function filterNews($all,$start,$category="",$order="desc",$type="",$active=""){
        if($category != ""){
            $this->db->join("news_relationship","news_relationship.new_id=news.new_id");
            $this->db->where("news_relationship.cate_id",$category);
        }
        if($type != ""){
            $this->db->where("news.new_type",$type);
        }
        if($active != ""){
            $this->db->where("news.new_active",$active);
        }
        $this->db->limit($all, $start);
        $this->db->order_by('news.new_id',$order);
        return $this->db->get($this->_table)->result_array();
    }
    public function updateNews($data,$id){
        $this->db->where("new_id",$id);
        $this->db->update($this->_table,$data);
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
    }
    public function addNews($data){
        $this->db->insert($this->_table,$data);
        return $this->db->insert_id();
    }
    public function addRelationship($data){
        $this->db->insert($this->_table2, $data);
    }
    public function deleteRela($id){
        $this->db->where("new_id",$id);
        $this->db->delete($this->_table2);
    }
    public function listAllRela($id){
        $this->db->where("new_id",$id);
        return $this->db->get($this->_table2)->result_array();
    }
    public function checkSlug($slug,$id="")
    {
        if($id != ""){
            $this->db->where("new_id !=",$id);
        }
        $this->db->where("new_slug", $slug);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function checkName($name,$id="")
    {
        if($id != ""){
            $this->db->where("new_id !=",$id);
        }
        $this->db->where("new_name", $name);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function deleteNews($id){
        $this->db->where('new_id',$id);
        $this->db->delete($this->_table);
    }
}