<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    // 构造函数
    public function __construct(){
        parent::__construct();
		$this->load->model('blog_model');        
    }

    // 显示登陆后的blog界面
	public function index()
	{
		$this->load->view('admin_index');
    }
    
    // 显示留言板界面
    public function inbox()
	{
        $user = $this->session->userdata('user');
        if($user){
            $res = $this->blog_model->find_comments_by_user_id($user->user_id);
            $send = $this->blog_model->find_send_comments_by_user_id($user->user_id);
            $this->load->view('inbox', array(
                "comments" => $res,
                "send_num" => count($send)
            ));
        }else{
            redirect('welcome/index');
        }
    }

    // 显示发送留言界面
    public function outbox()
	{
        $user = $this->session->userdata('user');
        if($user){
            $res = $this->blog_model->find_comments_by_user_id($user->user_id);
            $send = $this->blog_model->find_send_comments_by_user_id($user->user_id);
            $this->load->view('outbox', array(
                "comments" => $send,
                "receive_num" => count($res)
            ));
        }else{
            redirect('welcome/index');
        }
    }

    // 显示所有该用户博客界面
    public function blogs()
	{
        // 通过session获取用户id
		$user = $this->session->userdata('user');
		if(!$user){
			redirect("welcome/index");
		}
		// 查找文章
		$res = $this->blog_model->find_blog_by_user_id($user->user_id);

		// 分页配置
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/blogs';
		$config['total_rows'] = count($res);
		$config['per_page'] = 10;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$this->pagination->initialize($config);
		$link = '<div class="page">'.$this->pagination->create_links().'</div>';

		// 调用分页方法
		// $this->uri->segment(3)指获取基础路径后面通过“/”分割后的第三个值
		$rows = $this->blog_model->pagination_blog_by_user_id($user->user_id, $this->uri->segment(3), $config['per_page']);		
		
		$this->load->view('blogs', array(
			"blogs" => $rows,
			"link" => $link
		));
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

        $row = $this->blog_model->save_blog($title, $content, $blog_type);
        if($row > 0){
            echo "success";
        }else {
            echo "fail";
        }
    }

    // 删除一条博客
    public function delete_blog($blog_id){
        $rows = $this->blog_model->delete_blog($blog_id);
        if($rows > 0){
            echo "success";
        }else{
            echo "fail";
        }
    }

    // 显示一条微博详情页
    public function blog_detail(){
        $blog_id = $this->input->get('blogId');
        // 查询博客信息
        $res = $this->blog_model->find_blog_by_blog_id($blog_id);
        // 查询评论信息
        $comments = $this->blog_model->find_comment_by_blog_id($blog_id);
        if($res){
            $this->load->view('blog_detail', array(
                "blog" => $res,
                "comments" => $comments
            ));
        }else{
            $this->load->view('index.html');
        }
    }

    // 根据user_id获取所有的博客类型
    public function blog_catalogs($user_id){
        $res = $this->blog_model->find_blog_type_by_user_id($user_id);
        $this->load->view('blog_catalogs', array("blog_types"=>$res));
    }

    // 插入一条博客类型
    public function save_blog_catalogs(){
        $type_name = $this->input->post('type_name');
        $order_num = $this->input->post('order_num');
        $user_id = $this->input->post('user_id');
        $rows = $this->blog_model->save_blog_type($type_name, $user_id, $order_num);
        if($rows > 0){
            echo "success";
        }else{
            echo "fail";
        }
    }

    // 跳转到编辑博客
    public function edit_blog($blog_id){
        $res = $this->blog_model->find_blog_by_blog_id($blog_id);
        $blog_type = $this->blog_model->find_bolg_type_by_user_id($this->session->userdata('user')->user_id);
        $this->load->view('edit_blog', array(
            'blog' => $res,
            'blog_types'=> $blog_type
        ));
    }

    //  修改博客的内容
    public function update_blog(){
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $blog_type = $this->input->post('blog_type');
        $blog_id = $this->input->post('blog_id');

        $rows = $this->blog_model->update_blog($blog_id, $blog_type, $content, $title);
        if($rows > 0){
            echo "success";
        }else{
            echo "fail";
        }
    }
}
