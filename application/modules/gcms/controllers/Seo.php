<?php
class Seo extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index($id=1){
        $this->_data['title'] = "Quản lý SEO";
        $this->_data['loadPage'] = "seo/index_view";
        $this->_data['data'] = $this->Mseo->getSeoById($id);
        if (isset($_POST['ok'])) {
            $data_update = array(
                'home_title' => $this->input->post('home_title'),
                'home_description' => $this->input->post('home_description'),
                'home_image' => $this->input->post('home_image'),
                'archive_title' => $this->input->post('archive_title'),
                'archive_description' => $this->input->post('archive_description'),
                'post_title' => $this->input->post('post_title'),
                'post_description' => $this->input->post('post_description'),
                'product_title' => $this->input->post('product_title'),
                'product_description' => $this->input->post('product_description'),
            );
            $this->Mseo->updateSeo($id, $data_update);
            $this->session->set_flashdata('flash_mess', 'Cập nhật bản ghi thành công.');
            redirect(base_url() . 'gcms/seo/index');
        }
        $this->load->view($this->_data['path'],$this->_data);
    }
}