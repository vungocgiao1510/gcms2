<?php

class Users extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $mod = $this->uri->segment(1);
        $this->_data['index'] = $mod . "/users/index";
        $this->_data['add'] = $mod . "/users/add";
        $this->_data['edit'] = $mod . "/users/edit";
        $this->_data['delete'] = $mod . "/users/delete";
    }

    public function index()
    {
        $this->_data['title'] = "Danh sách tài khoản";
        $this->_data['loadPage'] = "users/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['group_level'] = $this->Mpermissions->listAllGroup("","","asc");
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/users/index/";
        $config ['total_rows'] = $this->Muser->countAll();
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
        $this->_data['data'] = $this->Muser->listAllUser($config['per_page'], $start);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }
    public function search(){
        $keyword = $this->input->get("keyword");
        $this->_data['title'] = "Kết quả tìm kiếm từ khóa ".$keyword;
        $this->_data['loadPage'] = "users/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['group_level'] = $this->Mpermissions->listAllGroup("","","asc");
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/users/search?keyword=".$keyword;
        $config ['total_rows'] = $this->Muser->count_search_users($keyword);
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
        $this->_data['data'] = $this->Muser->search_users($config['per_page'], $start,$keyword);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }
    public function filter(){
        $orderby = $this->input->get("orderby");
        $level = $this->input->get("level");
        $active = $this->input->get("active");
        $this->_data['title'] = "Kết quả danh sách";
        $this->_data['loadPage'] = "users/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['group_level'] = $this->Mpermissions->listAllGroup("","","asc");
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/users/index/";
        $config ['total_rows'] = $this->Muser->count_filter_users($level,$active);
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
        $this->_data['data'] = $this->Muser->filter_users($config['per_page'], $start,$orderby,$level,$active);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function add()
    {
        $this->_data['title'] = "Thêm mới tài khoản";
        $this->_data['loadPage'] = "users/add_view";
        $this->_data['data'] = $this->Mpermissions->listAllGroup("","","asc");
        $this->form_validation->set_message('required', '{field} không được để trống.');
        $this->form_validation->set_message('min_length', '{field} phải nhiều hơn 5 ký tự.');
        $this->form_validation->set_message('max_length', '{field} phải nhỏ hơn 14 ký tự.');
        $this->form_validation->set_message('matches', '{field} không đúng, vui lòng nhập lại.');
        $this->form_validation->set_rules('username', 'Tài khoản', 'required|min_length[5]|max_length[14]|callback_check_user');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[5]|max_length[14]');
        $this->form_validation->set_rules('password2', 'Xác nhận mật khẩu', 'trim|required|matches[password]|min_length[5]|max_length[14]');
        if ($this->form_validation->run() == TRUE) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $data_insert = array(
                "username" => $this->input->post("username"),
                "password" => md5($this->input->post("password")),
                "email" => $this->input->post("email"),
                "phone" => $this->input->post("phone"),
                "address" => $this->input->post("address"),
                "active" => $this->input->post("active"),
                "group_id" => $this->input->post("level"),
                "datetime" => date("Y-m-d"),
                "active" => $this->input->post("active"),
            );
            $this->Muser->addUser($data_insert);
            $this->session->set_flashdata("flash_mess", "Hoàn tất thủ tục thêm thành viên.");
            redirect(base_url() . "gcms/users/index");
        }

        $this->load->view($this->_data['path'], $this->_data);
    }

    public function edit($id="")
    {
        $this->_data['title'] = "Cập nhật tài khoản";
        $this->_data['loadPage'] = "users/edit_view";
        $this->_data['data'] = $this->Muser->getUserById($id);
        $this->_data['group'] = $this->Mpermissions->listAllGroup();
        $this->form_validation->set_message('required', '{field} không được để trống.');
        $this->form_validation->set_message('min_length', '{field} phải nhiều hơn 5 ký tự.');
        $this->form_validation->set_message('max_length', '{field} phải nhỏ hơn 14 ký tự.');
        $this->form_validation->set_message('matches', '{field} không đúng, vui lòng nhập lại.');
        $this->form_validation->set_rules('username', 'Tài khoản', 'required|min_length[5]|max_length[14]|callback_check_user');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'min_length[5]|max_length[14]');
        $this->form_validation->set_rules('password2', 'Xác nhận mật khẩu', 'trim|matches[password]|min_length[5]|max_length[14]');
        if ($this->form_validation->run() == TRUE) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $data_update = array(
                "username" => $this->input->post("username"),
                "email" => $this->input->post("email"),
                "phone" => $this->input->post("phone"),
                "address" => $this->input->post("address"),
                "active" => $this->input->post("active"),
                "group_id" => $this->input->post("level"),
                "datetime" => date("Y-m-d"),
                "active" => $this->input->post("active"),
            );
            if($this->input->post("password")){
                $data_update["password"] = md5($this->input->post("password"));
            }
            $this->Muser->updateUserById($data_update,$id);
            $this->session->set_flashdata("flash_mess", "Cập nhật thành công");
            redirect(base_url() . "gcms/users/index");
        }
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function delete($id = "")
    {
        if ($id == 1) {
            $this->session->set_flashdata("flash_error", "Bạn không đủ quyền hạn để xóa thành viên này.");
            redirect(base_url() . "gcms/users/index");
        } else {
            $this->Muser->deleteUser($id);
            $this->session->set_flashdata("flash_mess", "Xóa thành công");
            redirect(base_url() . "gcms/users/index");
        }
    }
    public function delete_all(){
        if ($this->input->post("cb")) {
            foreach ($this->input->post("cb") as $del_id) {
                $del_id = ( int )$del_id;
                $this->Muser->deleteUser($del_id);
            }
            $this->session->set_flashdata("flash_mess", "Hoàn tất thủ tục xóa thành viên.");
            redirect(base_url() . "gcms/users/index");
        } else {
            $this->session->set_flashdata("flash_error", "Bạn chưa chọn thành viên cần xóa.");
            redirect(base_url() . "gcms/users/index");

        }
    }

    public function check_user($user)
    {
        $id = $this->uri->segment(4);
        if ($this->Muser->checkUser($user, $id) == FALSE) {
            $this->form_validation->set_message("check_user", "Tài khoản này đã tồn tại.");
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function shownumber(){
        $value = $this->input->post("value");
        $ses_number = array(
            "limit" => $value
        );
        $this->session->set_userdata($ses_number);
    }

}