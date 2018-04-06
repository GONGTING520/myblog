<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('blog_model');
		$num = $this->blog_model->find_blog_user_blog_type_num();

		// 分页配置
		$this->load->library('pagination');
		$config['base_url'] = base_url().'welcome/index';
		$config['total_rows'] = count($num);
		$config['per_page'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$this->pagination->initialize($config);
		$link = '<div class="page">'.$this->pagination->create_links().'</div>';

		// 调用分页方法
		// $this->uri->segment(3)指获取基础路径后面通过“/”分割后的第三个值
		$rows = $this->blog_model->pagination_blog_user_blog_type($this->uri->segment(3), $config['per_page']);
		$this->load->view('index', array(
			"blogs" => $rows,
			"link" => $link
		));
	}

	// 显示一条微博详情页
    public function blog_detail(){
		$blog_id = $this->input->get('blogId');
		$user_id = $this->input->get('userId');
		$this->load->model('blog_model');		
        // 查询博客信息
        $res = $this->blog_model->find_blog_by_blog_id($blog_id);
        // 查询评论信息
		$comments = $this->blog_model->find_comment_by_blog_id($blog_id);
		$this->load->model('user_model');
		$user = $this->user_model->find_by_user_id($user_id);
        if($res){
            $this->load->view('one_blog_detail', array(
                "blog" => $res,
				"comments" => $comments,
				"user" => $user
            ));
        }else{
            $this->load->view('index.html');
        }
    }

	// 显示一个传入的user_id的全部博客列表
	public function blogs($user_id)
	{
		$this->load->model('user_model');
		$user = $this->user_model->find_by_user_id($user_id);

		// 查找文章		
		$this->load->model('blog_model');
		$res = $this->blog_model->find_blog_by_user_id($user_id);

		// 分页配置
		$this->load->library('pagination');
		$config['base_url'] = base_url().'welcome/blogs/'.$user_id;
		$config['total_rows'] = count($res);
		$config['per_page'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$this->pagination->initialize($config);
		$link = '<div class="page">'.$this->pagination->create_links().'</div>';

		// 调用分页方法
		// $this->uri->segment(4)指获取基础路径后面通过“/”分割后的第4个值
		$rows = $this->blog_model->pagination_blog_by_user_id($user_id, $this->uri->segment(4), $config['per_page']);
		
		$this->load->view('one_blog_list', array(
			"blogs" => $rows,
			"link" => $link,
			"user" => $user
		));
	}
	public function login()
	{
		$this->load->view('login');
	}

	public function regist()
	{
		$this->load->view('regist');
	}

	public function logined()
	{
		// 通过session获取用户id
		$user = $this->session->userdata('user');
		if(!$user){
			redirect("welcome/index");
		}
		// 查找文章
		$this->load->model('blog_model');
		$res = $this->blog_model->find_blog_by_user_id($user->user_id);

		// 分页配置
		$this->load->library('pagination');
		$config['base_url'] = base_url().'welcome/logined';
		$config['total_rows'] = count($res);
		$config['per_page'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$this->pagination->initialize($config);
		$link = '<div class="page">'.$this->pagination->create_links().'</div>';

		// 调用分页方法
		// $this->uri->segment(3)指获取基础路径后面通过“/”分割后的第三个值
		$rows = $this->blog_model->pagination_blog_by_user_id($user->user_id, $this->uri->segment(3), $config['per_page']);
		
		$this->load->view('index_logined', array(
			"blogs" => $rows,
			"link" => $link
		));
	}
}
