<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');        
    }

    // 判断用户是否登陆成功
	public function login()
	{
        // 接收数据
		$email = $this->input->post('email');
        $pwd = $this->input->post('pwd');
        // 查询数据库
        $user = $this->user_model->find_by_email_pwd($email, $pwd);
        if($user){
            $this->session->set_userdata('user', $user);
            echo "success";
        }else{
            echo "fail";
        }
    }
    
    // 添加新得用户
    public function regist()
    {
        // 接收数据
		$email = $this->input->post('email');
		$name = $this->input->post('name');
        $pwd = $this->input->post('pwd');
        $sex = $this->input->post('sex');
        // $province = $this->input->post('province');

        // 判断接收的数据
        $row = $this->user_model->save($email, $name, $pwd, $sex);
        if($row > 0){
            echo "success";
        }else{
            echo "fail";
        }
    }

    // 判断用户邮箱是否存在
    public function check_name(){
        $email = $this->input->get('email');

        $row = $this->user_model->find_by_email($email);
        if($row){
            echo "fail";
        }else{
            echo "success";
        }
    }

    // 修改个人信息
    public function change_info()
    {
        $user_id = $this->input->post('user_id');
        $username = $this->input->post('username');
        $sex = $this->input->post('sex');
        $birthday = $this->input->post('birthday');

        $row = $this->user_model->update_by_user_id($user_id, $username, $sex, $birthday);
        if($row > 0){
            $user = $this->user_model->find_by_user_id($user_id);
            $this->session->set_userdata('user', $user);            
            echo "success";
        }else {
            echo "fail";
        }
    }

    // 显示修改密码页面
    public function change_pwd(){
        $this->load->view('change_pwd');
    }

    // 根据user_id修改密码
    public function update_pwd(){
        $user_id = $this->input->post('user_id');
        $password = $this->input->post('pwd');
        $old_pwd = $this->input->post('old_pwd');
        
        if($old_pwd != $this->session->userdata('user')->password){
            echo 'old_pwd_error';
        }else{
            $rows = $this->user_model->update_pwd_by_user_id($user_id, $password);
            if($rows > 0){
                $user = $this->user_model->find_by_user_id($user_id);
                $this->session->set_userdata('user', $user);
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }

    // 修改用户的心情
    public function update_signature()
    {
        $signature = $this->input->post('signature');
        $user_id = $this->input->post('user_id');
        $rows = $this->user_model->update_signature_by_user_id($user_id, $signature);

        if($rows > 0){
            $user = $this->user_model->find_by_user_id($user_id);
            $this->session->set_userdata('user', $user);
            echo "success";
        }else{
            echo "fail";
        }
    }
}
