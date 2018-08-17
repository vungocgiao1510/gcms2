<?php

class Mproducts extends CI_Model
{
    protected $_table = "products";
    protected $_table2 = "relationship";

    public function __construct()
    {
        parent::__construct();
    }

    public function listAllProducts($all,$start)
    {
        $this->db->limit($all, $start);
        $this->db->order_by('product_id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function getLastOneProduct(){
        $this->db->select("product_id");
        $this->db->limit(1);
        $this->db->order_by('product_id','desc');
        return $this->db->get($this->_table)->row_array();
    }
    public function getProductById($id){
        $this->db->where('product_id',$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function countAll()
    {
        return $this->db->count_all($this->_table);
    }
    public function searchProductByKeyword($keyword,$all,$start){
        $this->db->like('product_name',$keyword);
        $this->db->limit($all, $start);
        $this->db->order_by('product_id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function countSearchProductByKeyword($keyword){
        $this->db->like('product_name',$keyword);
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function filterProduct($all,$start,$category="",$order="desc",$type="",$type2="",$active=""){
        if($category != ""){
            $this->db->join("relationship","relationship.product_id=products.product_id");
            $this->db->where("relationship.cate_id",$category);
        }
        if($type != ""){
            $this->db->where("products.product_type",$type);
        }
        if($type2 != ""){
            $this->db->where("products.product_type2",$type2);
        }
        $this->db->limit($all, $start);
        $this->db->order_by('products.product_id',$order);
        return $this->db->get($this->_table)->result_array();
    }
    public function countFilterProduct($category="",$order="desc",$type="",$type2="",$active=""){
        if($category != ""){
            $this->db->join("relationship","relationship.product_id=products.product_id");
            $this->db->where("relationship.cate_id",$category);
        }
        if($type != ""){
            $this->db->where("products.product_type",$type);
        }
        if($type2 != ""){
            $this->db->where("products.product_type2",$type2);
        }
        $this->db->order_by('products.product_id',$order);
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function addProduct($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    public function updateProduct($data_update,$id){
        $this->db->where('product_id',$id);
        $this->db->update($this->_table,$data_update);
    }
    public function deleteProduct($id){
        $this->db->where('product_id',$id);
        $this->db->delete($this->_table);
    }
    public function addRelationship($data)
    {
        $this->db->insert($this->_table2, $data);
    }
    public function updateRelationship($data_update,$id)
    {
        $this->db->trans_start();
        $this->db->where("product_id",$id);
        $this->db->update($this->_table2,$data_update);
        $this->db->trans_complete();
    }
    // Load Relationship
    public function listAllRela($id){
        $this->db->where("product_id",$id);
        return $this->db->get($this->_table2)->result_array();
    }
    public function deleteRela($id){
        $this->db->where('product_id', $id);
        $this->db->delete($this->_table2);
    }
    public function checkSlug($slug,$id="")
    {
        if($id != ""){
            $this->db->where("product_id !=",$id);
        }
        $this->db->where("product_slug", $slug);
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
            $this->db->where("product_id !=",$id);
        }
        $this->db->where("product_name", $name);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    // Default
    public function callproduct_type($product_type="",$desc="desc"){
        if($product_type != ""){
            $this->db->where("product_type",$product_type);
        }
        $this->db->order_by("product_id",$desc);
        return $this->db->get($this->_table)->result_array();
    }
    public function count_callproduct($product_type="",$cate_id=""){
        if($product_type != ""){
            $this->db->where("products.product_type",$product_type);
        }
        if($cate_id != ""){
            $this->db->where("relationship.cate_id",$cate_id);
        }
        $this->db->join("relationship","relationship.product_id=products.product_id");
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function count_callproduct_main($product_type="",$cate_id=""){
        if($product_type != ""){
            $this->db->where("products.product_type",$product_type);
        }
        if($cate_id != ""){
            $this->db->where("categories.cate_parent",$cate_id);
        }
        $this->db->join("relationship","relationship.product_id=products.product_id");
        $this->db->join("categories","categories.cate_id=relationship.cate_id");
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function callproduct($product_type="",$cate_id="",$all,$start,$desc="desc"){
        if($product_type != ""){
            $this->db->where("products.product_type",$product_type);
        }
        if($cate_id != ""){
            $this->db->where("relationship.cate_id",$cate_id);
        }
        $this->db->limit($all, $start);
        $this->db->join("relationship","relationship.product_id=products.product_id");
        $this->db->order_by("products.product_id",$desc);
        return $this->db->get($this->_table)->result_array();
    }
    public function callproduct_main($product_type="",$cate_id="",$all,$start,$desc="desc"){
        if($product_type != ""){
            $this->db->where("products.product_type",$product_type);
        }
        if($cate_id != ""){
            $this->db->where("categories.cate_parent",$cate_id);
        }
        $this->db->limit($all, $start);
        $this->db->join("relationship","relationship.product_id=products.product_id");
        $this->db->join("categories","categories.cate_id=relationship.cate_id");
        $this->db->order_by("products.product_id",$desc);
        return $this->db->get($this->_table)->result_array();
    }
    public function single_product($slug){
        $this->db->where("product_slug",$slug);
        return $this->db->get($this->_table)->row_array();
    }
    public function single_productbyid($id){
        $this->db->select("product_name, product_price, product_promotion, product_image");
        $this->db->where("product_id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function like_filter_product($product_type="",$cate_id="",$all,$start,$filter,$desc="desc"){
        foreach($filter as $value){
            $this->db->like('products.attr_id',$value);
        }
        if($product_type != ""){
            $this->db->where("products.product_type",$product_type);
        }
        if($cate_id != ""){
            $this->db->where("relationship.cate_id",$cate_id);
        }
        $this->db->limit($all, $start);
        $this->db->join("relationship","relationship.product_id=products.product_id");
        $this->db->order_by("products.product_id",$desc);
        return $this->db->get($this->_table)->result_array();
    }
    public function like_filter_product_main($product_type="",$cate_id="",$all,$start,$filter,$desc="desc"){
        foreach($filter as $value){
            $this->db->like('products.attr_id',$value);
        }
        if($product_type != ""){
            $this->db->where("products.product_type",$product_type);
        }
        if($cate_id != ""){
            $this->db->where("categories.cate_parent",$cate_id);
        }
        $this->db->limit($all, $start);
        $this->db->join("relationship","relationship.product_id=products.product_id");
        $this->db->join("categories","categories.cate_id=relationship.cate_id");
        $this->db->order_by("products.product_id",$desc);
        return $this->db->get($this->_table)->result_array();
    }
    public function otherProductByCategories($id,$cate_id="",$limit="8",$desc="desc"){
        $this->db->select("products.product_name,products.product_image, products.product_price, 
        products.product_promotion, products.product_slug");
        $this->db->where('products.product_id !=', $id);
        if($cate_id != ""){
            $this->db->where('relationship.cate_id', $cate_id);
        }
        $this->db->limit($limit);
        $this->db->join("relationship","relationship.product_id=products.product_id");
        $this->db->order_by("products.product_id",$desc);
        return $this->db->get($this->_table)->result_array();
    }
    public function ProductForSitemap($active=1)
    {
        $this->db->select('product_slug, update_time');
        $this->db->where('product_active',$active);
        $this->db->order_by('product_id','desc');
        return $this->db->get($this->_table)->result_array();
    }
}
