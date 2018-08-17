<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 7/6/2018
 * Time: 8:41 PM
 */

class Categories extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_data['title'] = "Quản lý chuyên mục";
        $this->_data['loadPage'] = "categories/type_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['data'] = $this->Mcategories->listAllCateType();
        $this->load->view($this->_data['path'], $this->_data);

    }
    public function type_add()
    {
        $this->_data['title'] = "Thêm tên chuyên mục";
        $this->_data['loadPage'] = "categories/typeadd_view";
        if(isset($_POST['ok'])){
            $name = $this->input->post("name");
            $data = array('name' => $name);
            $this->Mcategories->addCateType($data);
            $this->session->set_flashdata("flash_mess", "Thêm tên chuyên mục thành công");
            redirect(base_url() . "gcms/categories/index");
        }
        $this->load->view($this->_data['path'], $this->_data);

    }
    public function type_edit($id="")
    {
        $this->_data['title'] = "Quản lý chuyên mục";
        $this->_data['loadPage'] = "categories/typeedit_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['data'] = $this->Mcategories->getCateType($id);
        if(isset($_POST['ok'])){
            $name = $this->input->post("name");
            $data = array('name' => $name);
            $this->Mcategories->updateCateType($data,$id);
            $this->session->set_flashdata("flash_mess", "Cập nhật tên chuyên mục thành công");
            redirect(base_url() . "gcms/categories/index");
        }
        $this->load->view($this->_data['path'], $this->_data);

    }
    public function type_delete()
    {

    }

    public function listcate($id="")
    {
        $this->_data['type_list'] = $this->Mcategories->getCateType($id);
        $typelist = $this->_data['type_list'];
        $this->_data['title'] = $typelist['name'];
        $this->_data['loadPage'] = "categories/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['listMenu'] = $this->Mcategories->listAllMenu();
        $this->_data['data'] = $this->Mcategories->listAllMenuActive($id);
        $this->_data['data2'] = $this->Mcategories->listAllMenuUnActive();
        $this->load->view($this->_data['path'], $this->_data);

    }

    public function add()
    {
        $this->_data['title'] = "Thêm mới chuyên mục";
        $this->_data['loadPage'] = "categories/add_view";
        $this->_data['listMenu'] = $this->Mcategories->listAllMenu();
        $this->_data['type_list'] = $this->Mcategories->listAllCateType();
        $this->form_validation->set_message('required', '{field} không được để trống.');
        $this->form_validation->set_message('min_length', '{field} phải nhiều hơn 5 ký tự.');
        $this->form_validation->set_message('max_length', '{field} phải nhỏ hơn 50 ký tự.');
        $this->form_validation->set_message('matches', '{field} không đúng, vui lòng nhập lại.');
        $this->form_validation->set_rules('cate_name', 'Tên chuyên mục', 'required|min_length[5]|max_length[50]|callback_check_name');
        $this->_data['type_list'] = $this->Mcategories->listAllCateType();
        if ($this->form_validation->run() == TRUE) {
            $data_insert = array(
                'cate_name' => $this->input->post('cate_name'),
                'cate_slug' => $this->input->post('cate_slug'),
                'cate_description' => $this->input->post('cate_description'),
                'cate_parent' => $this->input->post('cate_parent'),
                'cate_orderby' => $this->input->post('cate_orderby'),
                'cate_type' => $this->input->post('cate_type'),
                'cate_image' => $this->input->post('cate_image'),
                'cate_active' => $this->input->post('cate_active'),
                'catetype_id' => $this->input->post('catetype_id'),
                'cate_check' => $this->input->post('cate_check'),
            );
            $this->Mcategories->addCategories($data_insert);
            $this->session->set_flashdata("flash_mess", "Thêm chuyên mục thành công");
            redirect(base_url() . "gcms/categories/listcate/".$this->input->post('catetype_id'));
        }
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function edit($id = "")
    {
        $this->_data['title'] = "Cập nhật chuyên mục đã kích hoạt";
        $this->_data['loadPage'] = "categories/edit_view";
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['listMenu'] = $this->Mcategories->listAllMenuActive();
        $this->_data['data'] = $this->Mcategories->getCategoriesByIdActive($id);
        $this->_data['type_list'] = $this->Mcategories->listAllCateType();
        $this->form_validation->set_message('required', '{field} không được để trống.');
        $this->form_validation->set_message('min_length', '{field} phải nhiều hơn 5 ký tự.');
        $this->form_validation->set_message('max_length', '{field} phải nhỏ hơn 14 ký tự.');
        $this->form_validation->set_message('matches', '{field} không đúng, vui lòng nhập lại.');
        $this->form_validation->set_rules('cate_name', 'Tên chuyên mục', 'required|min_length[5]|max_length[50]|callback_check_name');
        if ($this->form_validation->run() == TRUE) {
            $data_update = array(
                'cate_name' => $this->input->post('cate_name'),
                'cate_slug' => $this->input->post('cate_slug'),
                'cate_title' => $this->input->post('cate_title'),
                'cate_description' => $this->input->post('cate_description'),
                'cate_content' => $this->input->post('cate_content'),
                'cate_parent' => $this->input->post('cate_parent'),
                'cate_orderby' => $this->input->post('cate_orderby'),
                'cate_type' => $this->input->post('cate_type'),
                'cate_image' => $this->input->post('cate_image'),
                'cate_banner' => $this->input->post('cate_banner'),
                'cate_active' => $this->input->post('cate_active'),
                'catetype_id' => $this->input->post('catetype_id'),
                'cate_check' => $this->input->post('cate_check'),
            );
            $this->Mcategories->updateCategories($data_update, $id);
            $this->session->set_flashdata("flash_mess", "Cập nhật chuyên mục thành công");
            redirect(base_url() . "gcms/categories/listcate/".$this->input->post('catetype_id'));
        }
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function edit2($id = "")
    {
        $this->_data['title'] = "Cập nhật chuyên mục chưa kích hoạt";
        $this->_data['loadPage'] = "categories/edit_view";
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['listMenu'] = $this->Mcategories->listAllMenuUnActive();
        $this->_data['data'] = $this->Mcategories->getCategoriesByIdDeactive($id);
        $this->form_validation->set_message('required', '{field} không được để trống.');
        $this->form_validation->set_message('min_length', '{field} phải nhiều hơn 5 ký tự.');
        $this->form_validation->set_message('max_length', '{field} phải nhỏ hơn 14 ký tự.');
        $this->form_validation->set_message('matches', '{field} không đúng, vui lòng nhập lại.');
        $this->form_validation->set_rules('cate_name', 'Tên chuyên mục', 'required|min_length[5]|max_length[20]|callback_check_name');
        if ($this->form_validation->run() == TRUE) {
            $data_update = array(
                'cate_name' => $this->input->post('cate_name'),
                'cate_slug' => $this->input->post('cate_slug'),
                'cate_title' => $this->input->post('cate_title'),
                'cate_description' => $this->input->post('cate_description'),
                'cate_content' => $this->input->post('cate_content'),
                'cate_parent' => $this->input->post('cate_parent'),
                'cate_orderby' => $this->input->post('cate_orderby'),
                'cate_type' => $this->input->post('cate_type'),
                'cate_image' => $this->input->post('cate_image'),
                'cate_banner' => $this->input->post('cate_banner'),
                'cate_active' => $this->input->post('cate_active'),
            );
            $this->Mcategories->updateCategories($data_update, $id);
            $this->session->set_flashdata("flash_mess", "Cập nhật chuyên mục thành công");
            redirect(base_url() . "gcms/categories/index");
        }
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function delete($id = "")
    {
        $this->Mcategories->deleteCategories($id);
        $this->session->set_flashdata("flash_error", "Xóa chuyên mục thành công.");
        redirect(base_url() . "gcms/categories/index");
    }

    public function check_name($name)
    {
        $id = $this->uri->segment(4);
        if ($this->Mcategories->check_name($name, $id) == FALSE) {
            $this->form_validation->set_message("check_name", "Chuyên mục này đã tồn tại.");
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function active_menu(){
        $id = $this->uri->segment(4);
        $type_id = $this->uri->segment(5);
        $data_update['cate_active'] = 1;
        $data_update['catetype_id'] = $type_id;
        $this->Mcategories->updateCategories($data_update,$id);
        $this->session->set_flashdata("flash_mess", "Cập nhật chuyên mục thành công");
        redirect(base_url() . "gcms/categories/listcate/".$type_id);
    }
    public function deactive_menu(){
        $id = $this->uri->segment(4);
        $type_id = $this->uri->segment(5);
        $data_update['cate_active'] = 2;
        $data_update['catetype_id'] = 0;
        $this->Mcategories->updateCategories($data_update,$id);
        $this->session->set_flashdata("flash_mess", "Cập nhật chuyên mục thành công");
        redirect(base_url() . "gcms/categories/listcate/".$type_id);
    }
}