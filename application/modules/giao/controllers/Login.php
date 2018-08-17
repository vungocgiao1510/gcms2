<?php
class Login extends LoginController{
    public $_data;
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = "Hệ thống quản trị GCMS";
        $this->form_validation->set_message ( 'required', '{field} không được để trống.' );
        $this->form_validation->set_message ( 'min_length', '{field} phải nhiều hơn 5 ký tự.' );
        $this->form_validation->set_message ( 'max_length', '{field} phải nhỏ hơn 14 ký tự.' );
        $this->form_validation->set_rules ( 'username', 'Tài khoản', 'required|min_length[5]|max_length[14]' );
        $this->form_validation->set_rules ( 'password', 'Mật khẩu', 'required|min_length[5]|max_length[14]' );
        if ($this->form_validation->run() == TRUE) {
            $username = htmlspecialchars($this->input->post("username"));
            $password = htmlspecialchars(md5($this->input->post("password")));
            $data = $this->Muser->checkLogin($username,$password);
            if($data == true){
                $data = $this->Muser->checkLogin($username,$password);
                $ses_data = array(
                    'gcms' => array(
                        'id'          => $data['id'],
                        'username'    => $data['username'],
                        'active'      => $data['active'],
                        'name'        => $data['name'],
                        'level'       => $data['level'],
                        'permissions' => $data['permissions'],
                    ),
                    'KCFINDER' => array(
                        'disabled' => false, // Bật kcfinder cho phép upload (mặc định = true;)
//                        'uploadURL' => '../../../uploads/'.$data['username']
                    )
                );
                $this->session->set_userdata($ses_data);

                $this->session->set_flashdata("flash_mess", "Đăng nhập thành công");
                redirect(base_url() . "gcms/dashboard/index");
            }
        }
        $this->load->view("giao/index_view", $this->_data);
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url() . "gcms");
    }
}