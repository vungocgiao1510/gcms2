<?php

class Muser extends CI_Model
{
    protected $_table = "users";

    public function __construct()
    {
        parent::__construct();
    }

    public function listAllUser($all, $start, $order = "desc")
    {
        $this->db->order_by("users.id", $order);
        $this->db->limit($all, $start);
        $this->db->join("users_group", "users_group.group_id=users.group_id");
        return $this->db->get($this->_table)->result_array();
    }

    public function search_users($all, $start, $keyword, $order = "desc")
    {
        $this->db->order_by("users.id", $order);
        $this->db->limit($all, $start);
        $this->db->join("users_group", "users_group.group_id=users.group_id");
        $this->db->like('users.username', $keyword);
        return $this->db->get($this->_table)->result_array();
    }

    public function filter_users($all, $start, $orderby = "desc", $group_level = "", $active = "")
    {
        $this->db->order_by("users.id", $orderby);
        $this->db->limit($all, $start);
        if ($group_level != "") {
            $this->db->where("users.group_id", $group_level);
        }
        if ($active != "") {
            $this->db->where("users.active", $active);
        }
        $this->db->join("users_group", "users_group.group_id=users.group_id");
        return $this->db->get($this->_table)->result_array();
    }

    public function count_filter_users($group_level = "", $active = "")
    {
        if ($group_level != "") {
            $this->db->where("group_id", $group_level);
        }
        if ($active != "") {
            $this->db->where("active", $active);
        }
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }

    public function count_search_users($keyword)
    {
        $this->db->join("users_group", "users_group.group_id=users.group_id");
        $this->db->like('users.username', $keyword);
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }

    public function updateUserById($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data);
    }

    public function getUserById($id)
    {
        $this->db->where("users.id", $id);
        $this->db->join("users_group", "users_group.group_id=users.group_id");
        return $this->db->get($this->_table)->row_array();
    }

    public function addUser($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function checkUser($user, $id = "")
    {
        if ($id != "") {
            $this->db->where("id !=", $id);
        }
        $this->db->where("username", $user);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function countAll()
    {
        return $this->db->count_all($this->_table);
    }

    public function deleteUser($id)
    {
        $this->db->where("id", $id);
        $this->db->delete($this->_table);
    }

    public function checkLogin($username, $password)
    {
        $this->db->where ( 'users.username', $username );
        $this->db->where ( 'users.password', $password );
        $this->db->join("users_group", "users_group.group_id=users.group_id");
        $query = $this->db->get ( $this->_table );
        if ($query->num_rows () > 0) {
            return $query->row_array ();
        } else {
            return FALSE;
        }
    }
}