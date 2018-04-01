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
