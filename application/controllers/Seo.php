<?php
class Seo extends DefaultController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function sitemap(){
        $this->_data['category'] = $this->Mcategories->listAllMenuActive();
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$this->_data);
    }

}