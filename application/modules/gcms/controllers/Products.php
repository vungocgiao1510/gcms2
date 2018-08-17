<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 7/8/2018
 * Time: 4:12 PM
 */

class Products extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        $this->_data['title'] = "Danh sách sản phẩm";
        $this->_data['loadPage'] = "products/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['count_all'] = $this->Mproducts->countAll();
        $this->_data['category'] = $this->Mcategories->listAllMenuActiveForProduct1();
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/products/index/";
        $config ['total_rows'] = $this->Mproducts->countAll();
        $config ['per_page'] = ($this->session->userdata('limit')) ? $this->session->userdata('limit') : 10;
        $config ['uri_segment'] = 4;
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
        $this->_data['data'] = $this->Mproducts->listAllProducts($config['per_page'], $start);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }
    public function search(){
        $keyword = $this->input->get('keyword');
        $this->_data['title'] = "Kết quả từ khóa ".$keyword;
        $this->_data['loadPage'] = "products/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['group_level'] = $this->Mpermissions->listAllGroup("", "", "asc");
        $this->_data['count_all'] = $this->Mproducts->countSearchProductByKeyword($keyword);
        $this->_data['category'] = $this->Mcategories->listAllMenuActiveForProduct1();
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/products/search?keyword=".$keyword;
        $config ['total_rows'] = $this->Mproducts->countSearchProductByKeyword($keyword);
        $config ['per_page'] = ($this->session->userdata('limit')) ? $this->session->userdata('limit') : 10;
        $config ['uri_segment'] = 4;
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
        $this->_data['data'] = $this->Mproducts->searchProductByKeyword($keyword,$config['per_page'], $start);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }
    public function filter(){
        $category = $this->input->get('category');
        $orderby = $this->input->get('orderby');
        $type = $this->input->get('type');
        $type2 = $this->input->get('type2');
        $active = $this->input->get('active');

        $this->_data['title'] = "Lọc thuộc tính sản phẩm";
        $this->_data['loadPage'] = "products/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['category'] = $this->Mcategories->listAllMenuActiveForProduct1();
        $this->_data['count_all'] = $this->Mproducts->countFilterProduct($category,$orderby,$type,$type2,$active);;
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/products/index/";
        $config ['total_rows'] = $this->Mproducts->countFilterProduct($category,$orderby,$type,$type2,$active);
        $config ['per_page'] = ($this->session->userdata('limit')) ? $this->session->userdata('limit') : 10;
        $config ['uri_segment'] = 4;
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
        $this->_data['data'] = $this->Mproducts->filterProduct($config['per_page'], $start,$category,$orderby,$type,$type2,$active);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function add()
    {
//        echo "<pre>";
//        print_r($this->input->post());
//        echo "</pre>";
        $this->_data['title'] = "Thêm mới sản phẩm";
        $this->_data['loadPage'] = "products/add_view";
        $this->_data['listMenu'] = $this->Mcategories->listAllMenuActiveForProduct();
        $this->_data['listAttr'] = $this->Mattrproduct->listAllAttr();
        $lastIDProduct = $this->Mproducts->getLastOneProduct();
        if (isset($_POST['ok'])) {
            if($this->Mproducts->checkSlug($this->input->post('product_slug')) != FALSE){
                $slug = $this->input->post('product_slug');
            } else {
                $slug = $this->input->post('product_slug').($lastIDProduct['product_id'] + 1);
            }
            $data_insert = array(
                'product_name' => $this->input->post('product_name'),
                'product_slug' => ($this->input->post('product_slug') != "") ? $slug : to_slug($this->input->post('product_name')),
                'product_title' => $this->input->post('product_title'),
                'product_info' => $this->input->post('product_info'),
                'product_description' => $this->input->post('product_description'),
                'product_content' => $this->input->post('product_content'),
                'product_image' => $this->input->post('product_image'),
                'product_images' => $this->input->post('product_images'),
                'product_price' => $this->input->post('product_price'),
                'product_promotion' => $this->input->post('product_promotion'),
                'datetime' => date("Y-m-d H:i:s"),
                'product_active' => $this->input->post('product_active'),
                'product_type' => $this->input->post('product_type'),
                'product_type2' => $this->input->post('product_type2'),
                'product_code' => $this->input->post('product_code'),
                'attr_id' => json_encode($this->input->post('attr_id')),
                'user_id' => $_SESSION['gcms']['id'],
                'primary_id' => $this->input->post('primary_id'),

            );
            $insert = $this->Mproducts->addProduct($data_insert);

            if (is_array($this->input->post('cate_id'))) {
                foreach ($this->input->post('cate_id') as $id) {
                    $rela_insert = array(
                        'cate_id' => $id,
                        'product_id' => $insert,
                    );
                    $this->Mproducts->addRelationship($rela_insert);
                }
            }
            $this->session->set_flashdata('flash_mess', 'Thêm bản ghi thành công.');
            redirect(base_url() . 'gcms/products/index');
        }
        $this->load->view($this->_data['path'], $this->_data);

    }

    public function edit($id = "")
    {
        $this->_data['title'] = "Cập nhật sản phẩm #".$id;
        $this->_data['loadPage'] = "products/edit_view";
        $this->_data['listMenu'] = $this->Mcategories->listAllMenuActiveForProduct();
        $this->_data['listAttr'] = $this->Mattrproduct->listAllAttr();
        $this->_data['rela'] = $this->Mproducts->listAllRela($id);
        $this->_data['data'] = $this->Mproducts->getProductById($id);
        $lastIDProduct = $this->Mproducts->getLastOneProduct();
        $data = $this->_data['data'];
        $rela = $this->_data['rela'];
        if ($data['attr_id'] != 'null') {
            $attr_id = json_decode($data['attr_id']);
            $this->_data['attr_product'] = $this->Mattrproduct->listAllAttrByProduct($attr_id);
        } else {
            $this->_data['attr_product'] = "";
        }
        if (isset($_POST['ok'])) {
            if($this->Mproducts->checkSlug($this->input->post('product_slug'),$id) != FALSE){
                $slug = $this->input->post('product_slug');
            } else {
                $slug = $this->input->post('product_slug')."-".$id;
            }
            if($this->Mproducts->checkName($this->input->post('product_name'),$id) != FALSE){
                $name = $this->input->post('product_name');
            } else {
                $name = $this->input->post('product_name')."-".$id;
            }
            $data_update = array(
                'product_name' => $this->input->post('product_name'),
                'product_slug' => ($this->input->post('product_slug') != "") ? $slug : to_slug($name),
                'product_title' => $this->input->post('product_title'),
                'product_info' => $this->input->post('product_info'),
                'product_description' => $this->input->post('product_description'),
                'product_content' => $this->input->post('product_content'),
                'product_image' => $this->input->post('product_image'),
                'product_images' => $this->input->post('product_images'),
                'product_price' => $this->input->post('product_price'),
                'product_promotion' => $this->input->post('product_promotion'),
                'update_time' => date("Y-m-d H:i:s"),
                'product_active' => $this->input->post('product_active'),
                'product_type' => $this->input->post('product_type'),
                'product_type2' => $this->input->post('product_type2'),
                'product_code' => $this->input->post('product_code'),
                'product_author' => $_SESSION['gcms']['username'],
                'attr_id' => json_encode($this->input->post('attr_id')),
                'primary_id' => $this->input->post('primary_id'),
            );
            $this->Mproducts->updateProduct($data_update, $id);
            $this->Mproducts->deleteRela($id);
            if (is_array($this->input->post('cate_id'))) {
                foreach ($this->input->post('cate_id') as $cate_id) {
                    $rela_update = array(
                        'cate_id' => $cate_id,
                        'product_id' => $id,
                    );
                    $this->Mproducts->addRelationship($rela_update);
                }
            }
            $this->session->set_flashdata('flash_mess', 'Cập nhật bản ghi thành công.');
            redirect(base_url() . 'gcms/products/index');
        }
        $this->load->view($this->_data['path'], $this->_data);

    }

    public function delete($id = "")
    {
        $this->Mproducts->deleteProduct($id);
        $this->Mproducts->deleteRela($id);
        $this->session->set_flashdata('flash_error', 'Xóa bản ghi thành công.');
        redirect(base_url() . 'gcms/products/index');
    }

    public function delete_all()
    {
        if ($this->input->post("cb")) {
            foreach ($this->input->post("cb") as $del_id) {
                $del_id = ( int )$del_id;
                $this->Mproducts->deleteProduct($del_id);
                $this->Mproducts->deleteRela($del_id);
            }
            $this->session->set_flashdata("flash_mess", "Hoàn tất thủ tục xóa bản ghi.");
            redirect(base_url() . "gcms/products/index");
        }
    }
}