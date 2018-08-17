<?php
/**
 * Created by PhpStorm.
 * User: Giao Vu
 * Date: 7/24/2018
 * Time: 9:17 AM
 */

class Desginer extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index($id=1){
        $this->_data['title'] = "Cấu hình giao diện";
        $this->_data['loadPage'] = "desginer/index_view";
        $data = $this->Mdesginer->getDesginerById($id);
        $this->_data['data'] = json_decode($data['desginer']);
//        echo "<pre>";
//        print_r($this->_data['data']);
//        echo "</pre>";
        if (isset($_POST['ok'])) {
            $data_update = array(
                'desginer' => json_encode($this->input->post()),
            );
            $this->Mdesginer->updateDesginer($id, $data_update);
            $this->session->set_flashdata('flash_mess', 'Cập nhật bản ghi thành công.');
            redirect(base_url() . 'gcms/desginer/index');
        }
        $this->db->last_query();
        $this->load->view($this->_data['path'],$this->_data);
    }
}