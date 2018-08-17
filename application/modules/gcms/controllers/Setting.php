<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 7/18/2018
 * Time: 10:44 PM
 */

class Setting extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = "Cấu hình hệ thống";
        $this->_data['loadPage'] = "setting/index_view";
        $this->load->view($this->_data['path'],$this->_data);
    }
}