<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    // 显示登陆后的blog界面
	public function index()
	{
		$this->load->view('admin_index');
    }
    
    // 显示留言板界面
    public function inbox()
	{
		$this->load->view('inbox');
    }

    // 显示所有博客界面
    public function blogs()
	{
		$this->load->view('blogs');
    }

    // 显示所有会员资料设置
    public function profile()
	{
		$this->load->view('profile');
    }
    
    // 显示发表博客界面
    public function new_blog()
    {
        // 获取session，如果有则去数据库中查找博客类型
        $user = $this->session->userdata('user');
        if($user){
            $this->load->model('blog_model');
            $types = $this->blog_model->find_bolg_type_by_user_id($user->user_id);
            $this->load->view('new_blog', array(
                "blog_types" => $types
            ));
        }
    }

    // 保存一条博客
    public function save_blog()
    {
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $blog_type = $this->input->post('blog_type');

        $this->load->model('blog_model');
        $row = $this->blog_model->save_blog($title, $content, $blog_type);
        if($row > 0){
            echo "success";
        }else {
            echo "fail";
        }
    }

    // 修改个人信息
    public function change_info()
    {
        $user_id = $this->input->post('user_id');
        $username = $this->input->post('username');
        $sex = $this->input->post('sex');
        $birthday = $this->input->post('birthday');

        $this->load->model('user_model');
        $row = $this->user_model->update_by_user_id($user_id, $username, $sex, $birthday);
        if($row > 0){
            echo "success";
        }else {
            echo "fail";
        }
    }
}
