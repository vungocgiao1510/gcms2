<?php
class Permissions extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = "Nhóm chức năng";
        $this->_data['loadPage'] = "permissions/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        // config setting phần phân trang.
        $config ['base_url'] = base_url() . "gcms/users/index/";
        $config ['total_rows'] = $this->Mpermissions->countAll();
        $config ['per_page'] = 10;
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
        $this->_data['data'] = $this->Mpermissions->listAllGroup($config['per_page'], $start);
//        echo $this->db->last_query();
        $this->load->view($this->_data['path'], $this->_data);
    }
    public function add(){
        $this->_data['title'] = "Thêm mới";
        $this->_data['loadPage'] = "permissions/add_view";
        $this->form_validation->set_message('required', '{field} không được để trống.');
        $this->form_validation->set_message('min_length', '{field} phải nhiều hơn 5 ký tự.');
        $this->form_validation->set_message('max_length', '{field} phải nhỏ hơn 14 ký tự.');
        $this->form_validation->set_message('matches', '{field} không đúng, vui lòng nhập lại.');
        $this->form_validation->set_rules('name', 'Tên chức vụ', 'required|min_length[5]|max_length[14]|callback_check_name');
        if ($this->form_validation->run() == TRUE) {
            $permissions = json_encode($this->input->post("per"));
            $data_insert = array(
                "name" => $this->input->post("name"),
                "level" => $this->input->post("level"),
                "permissions" => $permissions,
        );
            $this->Mpermissions->addGroup($data_insert);
            $this->session->set_flashdata("flash_mess", "Cập nhật thành công");
            redirect(base_url() . "gcms/permissions/index");
        }

        $this->load->view($this->_data['path'], $this->_data);
    }
    public function edit($id=""){
        $this->_data['title'] = "Cập nhật";
        $this->_data['loadPage'] = "permissions/edit_view";
        $this->_data['data'] = $this->Mpermissions->getGroupById($id);
        $this->form_validation->set_message('required', '{field} không được để trống.');
        $this->form_validation->set_message('min_length', '{field} phải nhiều hơn 5 ký tự.');
        $this->form_validation->set_message('max_length', '{field} phải nhỏ hơn 14 ký tự.');
        $this->form_validation->set_message('matches', '{field} không đúng, vui lòng nhập lại.');
        $this->form_validation->set_rules('name', 'Tên chức vụ', 'required|min_length[5]|max_length[14]|callback_check_name');
        if ($this->form_validation->run() == TRUE) {
            $permissions = json_encode($this->input->post("per"));
            $data_update = array(
                "name" => $this->input->post("name"),
                "level" => $this->input->post("level"),
                "permissions" => $permissions,
            );
            $this->Mpermissions->editGroup($data_update,$id);
            $this->session->set_flashdata("flash_mess", "Cập nhật thành công");
            redirect(base_url() . "gcms/permissions/index");
        }
        $this->load->view($this->_data['path'], $this->_data);
    }
    public function delete($id=""){
        $this->Mpermissions->delete($id);
        $this->session->set_flashdata("flash_error","Xóa thành công");
        redirect(base_url()."gcms/permissions/index");
    }
    public function check_name($name)
    {
        $id = $this->uri->segment(4);
        if ($this->Mpermissions->checkGroup($name, $id) == FALSE) {
            $this->form_validation->set_message("check_name", "Chức năng này đã tồn tại.");
            return FALSE;
        } else {
            return TRUE;
        }
    }
}