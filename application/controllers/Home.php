<?php

class Home extends DefaultController
{
    public function __construct()
    {
        parent::__construct();
        $this->_data['navbar_menu'] = $this->Mcategories->default_callmenu(1);
        $this->_data['menu_left'] = $this->Mcategories->default_callmenu(2);
        $this->_data['slide'] = $this->Mimages->default_callimage(1);
        $this->_data['icon_header'] = $this->Mimages->default_callimage(5);
        $desginer = $this->Mdesginer->getDesginerById();
        $this->_data['des'] = json_decode($desginer['desginer']);
    }

    public function index()
    {
        $setting = $this->_data['des'];
        $this->_data['title'] = ($setting->global_title != "") ? $setting->global_title : 'Trang Chủ';
        $this->_data['description'] = ($setting->global_title != "") ? $setting->global_title : '';
        $this->_data['home_qc'] = $this->Mimages->default_callimage(4);
        $this->_data['home_brand'] = $this->Mimages->default_callimage(3);
        $this->_data['home_brand1'] = $this->Mimages->default_callimage(3, 'asc');
        $this->_data['home_product_type'] = $this->Mproducts->callproduct_type(1);
        $this->load->view("template/main", $this->_data);
    }

    public function archive()
    {
        $slug = $this->uri->segment(1);
        if($slug === 'sitemap.xml'){
            $this->sitemap();
        } else {
            $get_cate = $this->Mcategories->default_getmenu($slug);
            switch ($get_cate['cate_type']) {
                case '1':
                    $this->_data['title'] = $get_cate['cate_name'];
                    $this->products($get_cate['cate_id']);
                    break;
                case '2':
                    $this->_data['title'] = $get_cate['cate_name'];
                    $this->news($get_cate['cate_id']);
                    break;
                default:
                    $this->error404();
                    break;
            }
        }
    }
    public function sitemap(){
        $this->_data['category'] = $this->Mcategories->listAllMenuActive();
        $this->_data['products'] = $this->Mproducts->ProductForSitemap();
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$this->_data);
    }
    public function error404(){
        echo "<h1>404 ERROR !!</h1>";
    }
    public function news($id)
    {
        $cate = $this->Mcategories->default_getmenu("", $id);
        $this->load->view("template/news", $this->_data);
    }

    public function products($id)
    {
        $this->_data['uri'] = $this->uri->segment(1);
        $cate = $this->Mcategories->default_getmenu("", $id);
        if($cate['cate_check'] != 1){
            $count_all = $this->Mproducts->count_callproduct("", $id);
        } else {
            $count_all = $this->Mproducts->count_callproduct_main("", $id);
        }
        $this->_data['attrs'] = $this->Mattrproduct->listAllAttr();
        $config ['base_url'] = base_url() . $cate['cate_slug'];
        $config ['total_rows'] = $count_all;
        $config ['per_page'] = 10;
        $config ['uri_segment'] = 1;
        $config ['full_tag_open'] = '<ul class="pagination">';
        $config ['full_tag_close'] = '</ul>';
        $config ['first_link'] = 'Đầu trang';
        $config ['last_link'] = 'Cuối trang';
        $config ['first_tag_open'] = '<li>';
        $config ['first_tag_close'] = '</li>';
        $config ['last_tag_open'] = '<li>';
        $config ['last_tag_close'] = '</li>';
        $config ['prev_link'] = '&laquo;';
        $config ['prev_tag_open'] = '<li>';
        $config ['prev_tag_close'] = '</li>';
        $config ['next_link'] = '&raquo;';
        $config ['next_tag_open'] = '<li>';
        $config ['next_tag_close'] = '</li>';
        $config ['num_tag_open'] = '<li>';
        $config ['num_tag_close'] = '</li>';
        $config ['cur_tag_open'] = '<li class="active"><a href="#">';
        $config ['cur_tag_close'] = '</a></li>';
        $config ['use_page_numbers'] = TRUE;
        $config ['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        $this->_data ['pagination'] = $this->pagination->create_links();
        $current_page = ($this->input->get("per_page")) ? $this->input->get("per_page") : 1;
        $start = ($current_page - 1) * $config ['per_page'];
        $list_attrs = array();
        if ($this->input->get("filter")) {
            foreach ($this->_data['attrs'] as $list_attr) {
                if ($list_attr['attr_parent'] == 0) {
                    if (isset($_GET[$list_attr['attr_slug']])) {
                        $list_attrs[] = $_GET[$list_attr['attr_slug']] . "";
                    }
                }
            }
            if ($cate['cate_check'] != 1) {
                $this->_data['data'] = $this->Mproducts->like_filter_product("", $id, $config['per_page'], $start, $list_attrs);
            } else {
                $this->_data['data'] = $this->Mproducts->like_filter_product_main("", $id, $config['per_page'], $start, $list_attrs);
            }
        } else {
            if ($cate['cate_check'] != 1) {
                $this->_data['data'] = $this->Mproducts->callproduct("", $id, $config['per_page'], $start);
            } else {
                $this->_data['data'] = $this->Mproducts->callproduct_main("", $id, $config['per_page'], $start);
            }
        }
//        $this->_data['pagination'] = $this->pagination->create_links();
//        echo $this->db->last_query();
        $this->load->view("template/products", $this->_data);
    }

    public function single_new()
    {

    }

    public function search()
    {

    }

    public function single_product()
    {
        $slug = $this->uri->segment(2);
        $this->_data['data'] = $this->Mproducts->single_product($slug);
        $data = $this->_data['data'];
        $this->_data['attrs'] = "";
        if ($data['attr_id'] != 'null') {
            $attr_id = json_decode($data['attr_id']);
            $this->_data['attrs'] = $this->Mattrproduct->listAllAttrByProduct($attr_id);
        }
        $this->_data['title'] = ($data['product_title']) ? $data['product_title'] : $data['product_name'];
        if($data['primary_id'] != 0){
            $this->_data['other'] = $this->Mproducts->otherProductByCategories($data['product_id'],$data['primary_id']);
        } else {
            $this->_data['other'] = $this->Mproducts->otherProductByCategories($data['product_id']);
        }
        $this->load->view("template/single-product", $this->_data);
    }
    public function addcard($id){
        $data = $this->Mproducts->single_productbyid($id);
        echo "<pre>";
        print_r($data);
    }
}