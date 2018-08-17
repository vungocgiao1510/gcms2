<?php
class AdminController extends MY_Controller{
    protected $_data;
    public function __construct()
    {
        parent::__construct();
        $gcms_sess = $this->session->userdata('gcms');
        $this->load->helper("permission");
        $link_check =  $this->uri->segment(2)."/".$this->uri->segment(3);
        Permissions($gcms_sess['level'],$gcms_sess['permissions'],$link_check);
        $mod = $this->uri->segment(1);
        $this->_data['path'] = $mod."/main";
        $this->form_validation->CI =& $this;
        $this->load->helper("menu");
        $this->load->helper("toslug");
        $this->_data['permissions'] = array(
            array(
                'name' => 'Thành viên', array(
                'users/index' => array('Danh sách'),
                'users/add' => array('Thêm'),
                'users/edit' => array('Sửa'),
                'users/delete' => array('Xóa'),
            )),
            array(
                'name' => 'Phân quyền', array(
                'permissions/index' => array('Danh sách'),
                'permissions/add' => array('Thêm'),
                'permissions/edit' => array('Sửa'),
                'permissions/delete' => array('Xóa'),
            )),
            array(
                'name' => 'Chuyên mục', array(
                'categories/index' => array('Danh sách'),
                'categories/add' => array('Thêm'),
                'categories/edit' => array('Sửa'),
                'categories/delete' => array('Xóa'),
            )),
            array(
                'name' => 'Bài viết', array(
                'news/index' => array('Danh sách'),
                'news/add' => array('Thêm'),
                'news/edit' => array('Sửa'),
                'news/delete' => array('Xóa'),
            )),
            array(
                'name' => 'Sản phẩm', array(
                'products/index' => array('Danh sách'),
                'products/add' => array('Thêm'),
                'products/edit' => array('Sửa'),
                'products/delete' => array('Xóa'),
            )),
            array(
                'name' => 'Liên hệ', array(
                'contact/index' => array('Danh sách'),
                'contact/add' => array('Thêm'),
                'contact/edit' => array('Sửa'),
                'contact/delete' => array('Xóa'),
            )),
        );
    }
}