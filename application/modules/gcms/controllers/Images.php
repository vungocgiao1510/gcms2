<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 7/18/2018
 * Time: 10:46 PM
 */

class Images extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->_data['title'] = "Đường dẫn tĩnh";
        $this->_data['loadPage'] = "images/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['count_all'] = $this->Mimages->countAll();
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/images/index/";
        $config ['total_rows'] = $this->Mimages->countAll();
        $config ['per_page'] = ($this->session->userdata('limit')) ? $this->session->userdata('limit') : 10;
        $config ['uri_segment'] = 4;
        $config ['full_tag_open'] = '<ul class="pagination">';
        $config ['full_tag_close'] = '</ul>';
        $config ['first_image'] = 'Đầu trang';
        $config ['last_image'] = 'Cuối trang';
        $config ['first_tag_open'] = '<li>';
        $config ['first_tag_close'] = '</li>';
        $config ['last_tag_open'] = '<li>';
        $config ['last_tag_close'] = '</li>';
        $config ['prev_image'] = '&laquo;';
        $config ['prev_tag_open'] = '<li>';
        $config ['prev_tag_close'] = '</li>';
        $config ['next_image'] = '&raquo;';
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
        $this->_data['data'] = $this->Mimages->listAllImages($config['per_page'], $start);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }
    public function filter(){
        $orderby = $this->input->get('orderby');
        $type = $this->input->get('type');
        $active = $this->input->get('active');
        $this->_data['title'] = "Lọc trạng thái";
        $this->_data['loadPage'] = "images/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['count_all'] = $this->Mimages->countAll();
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/images/index/";
        $config ['total_rows'] = $this->Mimages->countAll();
        $config ['per_page'] = ($this->session->userdata('limit')) ? $this->session->userdata('limit') : 10;
        $config ['uri_segment'] = 4;
        $config ['full_tag_open'] = '<ul class="pagination">';
        $config ['full_tag_close'] = '</ul>';
        $config ['first_image'] = 'Đầu trang';
        $config ['last_image'] = 'Cuối trang';
        $config ['first_tag_open'] = '<li>';
        $config ['first_tag_close'] = '</li>';
        $config ['last_tag_open'] = '<li>';
        $config ['last_tag_close'] = '</li>';
        $config ['prev_image'] = '&laquo;';
        $config ['prev_tag_open'] = '<li>';
        $config ['prev_tag_close'] = '</li>';
        $config ['next_image'] = '&raquo;';
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
        $this->_data['data'] = $this->Mimages->filterImages($config['per_page'], $start,$orderby,$type,$active);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }
    public function search(){
        $keyword = $this->input->post('keyword');
        $this->_data['title'] = "Tìm kiếm";
        $this->_data['loadPage'] = "images/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['count_all'] = $this->Mimages->countAll();
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/images/index/";
        $config ['total_rows'] = $this->Mimages->countAll();
        $config ['per_page'] = ($this->session->userdata('limit')) ? $this->session->userdata('limit') : 10;
        $config ['uri_segment'] = 4;
        $config ['full_tag_open'] = '<ul class="pagination">';
        $config ['full_tag_close'] = '</ul>';
        $config ['first_image'] = 'Đầu trang';
        $config ['last_image'] = 'Cuối trang';
        $config ['first_tag_open'] = '<li>';
        $config ['first_tag_close'] = '</li>';
        $config ['last_tag_open'] = '<li>';
        $config ['last_tag_close'] = '</li>';
        $config ['prev_image'] = '&laquo;';
        $config ['prev_tag_open'] = '<li>';
        $config ['prev_tag_close'] = '</li>';
        $config ['next_image'] = '&raquo;';
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
        $this->_data['data'] = $this->Mimages->searchImagesByKeyword($keyword,$config['per_page'], $start);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }
    public function add(){
        $this->_data['title'] = "Thêm bản ghi mới";
        $this->_data['loadPage'] = "images/add_view";
        if (isset($_POST['ok'])) {
            $data_insert = array(
                'img_title' => $this->input->post('img_title'),
                'img_link' => $this->input->post('img_link'),
                'img_avatar' => $this->input->post('img_avatar'),
                'img_orderby' => $this->input->post('img_orderby'),
                'img_type' => $this->input->post('img_type'),
                'img_active' => $this->input->post('img_active'),
            );
            $insert = $this->Mimages->insertImage($data_insert);
            $this->session->set_flashdata('flash_mess', 'Thêm bản ghi thành công.');
            redirect(base_url() . 'gcms/images/index');
        }
        $this->load->view($this->_data['path'], $this->_data);

    }
    public function edit($id=""){
        $this->_data['title'] = "Thêm bản ghi mới";
        $this->_data['loadPage'] = "images/edit_view";
        $this->_data['data'] = $this->Mimages->getImageById($id);
        if (isset($_POST['ok'])) {
            $data_update = array(
                'img_title' => $this->input->post('img_title'),
                'img_link' => $this->input->post('img_link'),
                'img_avatar' => $this->input->post('img_avatar'),
                'img_orderby' => $this->input->post('img_orderby'),
                'img_type' => $this->input->post('img_type'),
                'img_active' => $this->input->post('img_active'),
                'img_description' => $this->input->post('img_description'),
            );
            $insert = $this->Mimages->updateImage($data_update,$id);
            $this->session->set_flashdata('flash_mess', 'Cập nhật bản ghi thành công.');
            redirect(base_url() . 'gcms/images/index');
        }
        $this->load->view($this->_data['path'], $this->_data);
    }
    public function delete($id=""){
        $this->Mimages->deleteImage($id);
        $this->session->set_flashdata('flash_mess', 'Xóa thành công bản ghi');
        redirect(base_url() . 'gcms/images/index');
    }
    public function delete_all()
    {
        if ($this->input->post("cb")) {
            foreach ($this->input->post("cb") as $del_id) {
                $del_id = ( int )$del_id;
                $this->Mimages->deleteImage($del_id);
            }
            $this->session->set_flashdata("flash_mess", "Hoàn tất thủ tục xóa bản ghi.");
            redirect(base_url() . "gcms/images/index");
        }
    }
}