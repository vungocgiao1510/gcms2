<?php
class Mpermissions extends CI_Model{
    protected $_table = "users_group";
    public function __construct(){
        parent::__construct();
    }
    public function listAllGroup($all="", $start="",$order="desc"){
        if($all !="" && $start != ""){
            $this->db->limit ( $all, $start );
        }
        $this->db->order_by("group_id",$order);
        return $this->db->get ( $this->_table )->result_array ();
    }
    public function getGroupById($id){
        $this->db->where("group_id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function addGroup($data){
        $this->db->insert($this->_table,$data);
    }
    public function editGroup($data,$id){
        $this->db->where("group_id",$id);
        $this->db->update($this->_table,$data);
    }
    public function checkGroup($user, $id = "") {
        if ($id != "") {
            $this->db->where ( "group_id !=", $id );
        }
        $this->db->where ( "name", $user );
        $query = $this->db->get ( $this->_table );
        if ($query->num_rows () > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
    }
    public function delete($id){
        $this->db->where("group_id",$id);
        $this->db->delete($this->_table);
    }
}