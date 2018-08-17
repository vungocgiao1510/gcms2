<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 7/18/2018
 * Time: 10:44 PM
 */

class Contact extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = "Danh sách liên hệ";
        $this->_data['loadPage'] = "contact/index_view";
        $this->load->view($this->_data['path'],$this->_data);
    }
}