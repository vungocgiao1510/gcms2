<?php

class News extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_data['title'] = "Danh sách bài viết";
        $this->_data['loadPage'] = "news/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['count_all'] = $this->Mnews->countAll();
        $this->_data['category'] = $this->Mcategories->listAllMenuActiveForNews();
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/news/index/";
        $config ['total_rows'] = $this->Mnews->countAll();
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
        $this->_data['data'] = $this->Mnews->listAllNews($config['per_page'], $start);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function search()
    {
        $keyword = $this->input->get('keyword');
        $this->_data['title'] = "Kết quả từ khóa ".$keyword;
        $this->_data['loadPage'] = "news/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['count_all'] = $this->Mnews->countAll();
        $this->_data['category'] = $this->Mcategories->listAllMenuActiveForNews();
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/news/index/";
        $config ['total_rows'] = $this->Mnews->countAll();
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
        $this->_data['data'] = $this->Mnews->searchNewsByKeyword($keyword,$config['per_page'], $start);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function filter()
    {
        $category = $this->input->get('category');
        $orderby = $this->input->get('orderby');
        $type = $this->input->get('type');
        $active = $this->input->get('active');
        $this->_data['title'] = "Danh sách bài viết";
        $this->_data['loadPage'] = "news/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['count_all'] = $this->Mnews->countAll();
        $this->_data['category'] = $this->Mcategories->listAllMenuActiveForNews();
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/news/index/";
        $config ['total_rows'] = $this->Mnews->countAll();
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
        $this->_data['data'] = $this->Mnews->filterNews($config['per_page'], $start,$category,$orderby,$type,$active);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function add()
    {
        $this->_data['title'] = "Thêm bản ghi mới";
        $this->_data['loadPage'] = "news/add_view";
        $this->_data['listMenu'] = $this->Mcategories->listAllMenuActiveForNews();
        $last_id = $this->Mnews->getLastIDNews();
        if (isset($_POST['ok'])) {
            if ($this->Mnews->checkSlug($this->input->post('new_slug')) != FALSE) {
                $slug = $this->input->post('new_slug');
            } else {
                $slug = $this->input->post('new_slug') . ($last_id['new_id'] + 1);
            }
            $data_insert = array(
                'new_name' => $this->input->post('new_name'),
                'new_slug' => ($this->input->post('new_slug') != "") ? $slug : to_slug($this->input->post('new_name')),
                'new_description' => $this->input->post('new_description'),
                'new_content' => $this->input->post('new_content'),
                'new_titleseo' => $this->input->post('new_titleseo'),
                'new_descriptionseo' => $this->input->post('new_descriptionseo'),
                'new_datetime' => date("Y-m-d H:i:s"),
                'new_type' => $this->input->post('new_type'),
                'new_active' => $this->input->post('new_active'),
                'new_image' => $this->input->post('new_image'),
                'username' => $_SESSION['gcms']['username'],
                'user_id' => $_SESSION['gcms']['id'],
            );
            $insert = $this->Mnews->addNews($data_insert);

            if (is_array($this->input->post('cate_id'))) {
                foreach ($this->input->post('cate_id') as $id) {
                    $rela_insert = array(
                        'cate_id' => $id,
                        'new_id' => $insert,
                    );
                    $this->Mnews->addRelationship($rela_insert);
                }
            }
            $this->session->set_flashdata('flash_mess', 'Thêm bản ghi thành công.');
            redirect(base_url() . 'gcms/news/index');
        }
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function edit($id = "")
    {
        $this->_data['title'] = "Cập nhật sản phẩm #" . $id;
        $this->_data['loadPage'] = "news/edit_view";
        $this->_data['listMenu'] = $this->Mcategories->listAllMenuActiveForNews();
        $this->_data['rela'] = $this->Mnews->listAllRela($id);
        $this->_data['data'] = $this->Mnews->getNewsById($id);
        $data = $this->_data['data'];
        $rela = $this->_data['rela'];
        if (isset($_POST['ok'])) {
            if ($this->Mnews->checkSlug($this->input->post('new_slug'), $id) != FALSE) {
                $slug = $this->input->post('new_slug');
            } else {
                $slug = $this->input->post('new_slug') . "-" . $id;
            }
            if ($this->Mnews->checkName($this->input->post('new_name'), $id) != FALSE) {
                $name = $this->input->post('new_name');
            } else {
                $name = $this->input->post('new_name') . "-" . $id;
            }
            $data_update = array(
                'new_name' => $this->input->post('new_name'),
                'new_slug' => ($this->input->post('new_slug') != "") ? $slug : to_slug($this->input->post('new_name')),
                'new_description' => $this->input->post('new_description'),
                'new_content' => $this->input->post('new_content'),
                'new_titleseo' => $this->input->post('new_titleseo'),
                'new_descriptionseo' => $this->input->post('new_descriptionseo'),
                'new_updatetime' => date("Y-m-d H:i:s"),
                'new_type' => $this->input->post('new_type'),
                'new_active' => $this->input->post('new_active'),
                'new_image' => $this->input->post('new_image'),
                'username' => $_SESSION['gcms']['username'],
            );
            $this->Mnews->updateNews($data_update, $id);
            $this->Mnews->deleteRela($id);
            if (is_array($this->input->post('cate_id'))) {
                foreach ($this->input->post('cate_id') as $cate_id) {
                    $rela_update = array(
                        'cate_id' => $cate_id,
                        'new_id' => $id,
                    );
                    $this->Mnews->addRelationship($rela_update);
                }
            }
            $this->session->set_flashdata('flash_mess', 'Cập nhật bản ghi thành công.');
            redirect(base_url() . 'gcms/news/index');
        }
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function delete($id = "")
    {
        $this->Mnews->deleteNews($id);
        $this->Mnews->deleteRela($id);
        $this->session->set_flashdata('flash_mess', 'Xóa bản ghi thành công.');
        redirect(base_url() . 'gcms/news/index');
    }
    public function delete_all()
    {
        if ($this->input->post("cb")) {
            foreach ($this->input->post("cb") as $del_id) {
                $del_id = ( int )$del_id;
                $this->Mnews->deleteNews($del_id);
                $this->Mnews->deleteRela($del_id);
            }
            $this->session->set_flashdata("flash_mess", "Hoàn tất thủ tục xóa bản ghi.");
            redirect(base_url() . "gcms/news/index");
        }
    }
}