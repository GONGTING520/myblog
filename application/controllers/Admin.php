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
}
