<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 7/8/2018
 * Time: 8:28 PM
 */

class Mattrproduct extends CI_Model
{
    protected $_table = "attr";

    public function __construct()
    {
        parent::__construct();
    }

    public function listAllAttr($active="",$orderby = "desc")
    {
        if($active != ""){
            $this->db->where("attr_active", $active);
        }
        $this->db->order_by('attr_orderby', $orderby);
        return $this->db->get($this->_table)->result_array();
    }
    public function listAllAttrByProduct($attr_id,$orderby = "desc")
    {
        $this->db->order_by('attr_orderby', $orderby);
        $this->db->where_in('attr_slug',$attr_id);
        return $this->db->get($this->_table)->result_array();
    }
    public function getAttrById($id)
    {
        $this->db->where('attr_id', $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function addAttr($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function updateAttr($update, $id)
    {
        $this->db->where('attr_id', $id);
        $this->db->update($this->_table, $update);
    }

    public function deleteAttr($id)
    {
        $this->db->where('attr_id', $id);
        $this->db->delete($this->_table);
    }
}