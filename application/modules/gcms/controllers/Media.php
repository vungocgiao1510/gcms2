<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 7/25/2018
 * Time: 3:21 PM
 */

class Media extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = "Quản lý hình ảnh";
        $this->_data['loadPage'] = "media/index_view";
        $this->load->view($this->_data['path'],$this->_data);

    }
}