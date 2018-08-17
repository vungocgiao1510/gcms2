<?php

class AttrProduct extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_data['title'] = "Quản lý thuộc tính";
        $this->_data['loadPage'] = "attrproduct/index_view";
        $this->_data ['error'] = $this->session->flashdata("flash_error");
        $this->_data ['success'] = $this->session->flashdata("flash_mess");
        $this->_data['data'] = $this->Mattrproduct->listAllAttr(1);
        $this->_data['data2'] = $this->Mattrproduct->listAllAttr(2);
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function add()
    {
        $this->_data['title'] = "Thêm mới thuộc tính";
        $this->_data['loadPage'] = "attrproduct/add_view";
        $this->_data['data'] = $this->Mattrproduct->listAllAttr();
        if (isset($_POST['ok'])) {
            $data_insert = array(
                'attr_name' => $this->input->post('attr_name'),
                'attr_slug' => $this->input->post('attr_slug'),
                'attr_parent' => $this->input->post('attr_parent'),
                'attr_orderby' => $this->input->post('attr_orderby'),
                'attr_active' => $this->input->post('attr_active'),
                'attr_form' => ($this->input->post('attr_form')) ? $this->input->post('attr_form') : 0,
            );
            $this->Mattrproduct->addAttr($data_insert);
            $this->session->set_flashdata("flash_mess", "Thêm thành công");
            redirect(base_url() . "gcms/attrproduct/index");
        }
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function edit($id = "")
    {
        $this->_data['title'] = "Cập nhật thuộc tính";
        $this->_data['loadPage'] = "attrproduct/edit_view";
        $this->_data['listAttr'] = $this->Mattrproduct->listAllAttr();
        $this->_data['data'] = $this->Mattrproduct->getAttrById($id);
        if (isset($_POST['ok'])) {
            $data_update = array(
                'attr_name' => $this->input->post('attr_name'),
                'attr_slug' => $this->input->post('attr_slug'),
                'attr_parent' => $this->input->post('attr_parent'),
                'attr_orderby' => $this->input->post('attr_orderby'),
                'attr_active' => $this->input->post('attr_active'),
                'attr_form' => ($this->input->post('attr_form')) ? $this->input->post('attr_form') : 0,
            );
            $this->Mattrproduct->updateAttr($data_update, $id);
            $this->session->set_flashdata("flash_mess", "Cập nhật thành công");
            redirect(base_url() . "gcms/attrproduct/index");
        }
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function delete($id = "")
    {
        $this->Mattrproduct->deleteAttr($id);
        $this->session->set_flashdata("flash_mess", "Xóa thành công");
        redirect(base_url() . "gcms/attrproduct/index");
    }
}