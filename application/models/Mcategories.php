<?php
class Mcategories extends CI_Model
{
    protected $_table = "categories";
    protected $_table2 = "categories_type";
    public function __construct()
    {
        parent::__construct();
    }
    public function listAllMenu($orderby = "asc"){
        $this->db->order_by("cate_id",$orderby);
        return $this->db->get($this->_table)->result_array();
    }
    public function listAllMenuActive($id="",$orderby="asc"){
        $this->db->where("cate_active",1);
        if($id != ""){
            $this->db->where("catetype_id", $id);
        }
        $this->db->order_by("cate_orderby",$orderby);
        return $this->db->get($this->_table)->result_array();
    }
    public function listAllMenuActiveForProduct($orderby="asc"){
        $this->db->where("cate_active",1);
        $this->db->where("cate_type",1);
        $this->db->order_by("cate_orderby",$orderby);
        return $this->db->get($this->_table)->result_array();
    }
    public function listAllMenuActiveForProduct1($orderby="asc"){
        $this->db->where("cate_active",1);
        $this->db->where("cate_type",1);
        $this->db->order_by("cate_orderby",$orderby);
        return $this->db->get($this->_table)->result_array();
    }
    public function showCategoriesByProduct($product_id, $orderby="asc"){
        $this->db->select("cate_name");
        $this->db->where("categories.cate_active",1);
        $this->db->where("categories.cate_type",1);
        $this->db->where("relationship.product_id",$product_id);
        $this->db->join("relationship","relationship.cate_id=categories.cate_id");
        $this->db->order_by("categories.cate_orderby",$orderby);
        return $this->db->get($this->_table)->result_array();
    }
    public function showCategoriesByNews($new_id, $orderby="asc"){
        $this->db->select("cate_name");
        $this->db->where("categories.cate_active",1);
        $this->db->where("categories.cate_type",2);
        $this->db->where("news_relationship.new_id",$new_id);
        $this->db->join("news_relationship","news_relationship.cate_id=categories.cate_id");
        $this->db->order_by("categories.cate_orderby",$orderby);
        return $this->db->get($this->_table)->result_array();
    }
    public function listAllMenuActiveForNews($orderby="asc"){
        $this->db->where("cate_active",1);
        $this->db->where("cate_type",2);
        $this->db->order_by("cate_orderby",$orderby);
        return $this->db->get($this->_table)->result_array();
    }
    public function listAllMenuActiveForPage($orderby="asc"){
        $this->db->where("cate_active",1);
        $this->db->where("cate_type",3);
        $this->db->order_by("cate_orderby",$orderby);
        return $this->db->get($this->_table)->result_array();
    }
    public function listAllMenuUnActive($orderby="desc"){
        $this->db->where("cate_active",2);
        $this->db->order_by("cate_id",$orderby);
        return $this->db->get($this->_table)->result_array();
    }
    public function getCategoriesByIdActive($id){
        $this->db->where("cate_id",$id);
        $this->db->where("cate_active", 1);
        return $this->db->get($this->_table)->row_array();
    }
    public function getCategoriesByIdDeactive($id){
        $this->db->where("cate_id",$id);
        $this->db->where("cate_active", 1);
        return $this->db->get($this->_table)->row_array();
    }
    public function addCategories($data){
        $this->db->insert($this->_table,$data);
    }
    public function updateCategories($data_update,$id){
        $this->db->where("cate_id",$id);
        $this->db->update($this->_table,$data_update);
    }
    public function check_name($cate_name, $cate_id = "")
    {
        if ($cate_id != "") {
            $this->db->where("cate_id !=", $cate_id);
        }
        $this->db->where("cate_name", $cate_name);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function deleteCategories($id) {
        $this->db->where("cate_id",$id);
        $this->db->delete($this->_table);
    }

    public function listAllCateType(){
        return $this->db->get($this->_table2)->result_array();
    }
    public function getCateType($id){
        $this->db->where("id",$id);
        return $this->db->get($this->_table2)->row_array();
    }
    public function addCateType($data){
        $this->db->insert($this->_table2,$data);
    }
    public function updateCateType($data,$id){
        $this->db->where("id",$id);
        $this->db->update($this->_table2,$data);
    }
    public function deleteCateType($id){
        $this->db->where("id",$id);
        $this->db->delete($this->_table2);
    }
    // Default Call Menu
    public function default_callmenu($catetype=""){
        $this->db->where('cate_active',1);
        $this->db->where('catetype_id',$catetype);
        return $this->db->get($this->_table)->result_array();
    }
    public function default_getmenu($slug="", $id=""){
        if($slug != ""){
            $this->db->where('cate_slug',$slug);
        }
        if($id != ""){
            $this->db->where('cate_id',$id);
        }
        return $this->db->get($this->_table)->row_array();
    }
}