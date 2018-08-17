<?php
class Dashboard extends AdminController{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = "Danh sách tài khoản";
        $this->_data['loadPage'] = "dashboard/index_view";
        $this->load->view($this->_data['path'], $this->_data);
//        $stringA = "chien-binh-bao-den-post2432";
//        echo $stringA."<br />";
//        $toFind = "2432";
//        $result = strchr($stringA,$toFind);
//        echo $result;

    }
}