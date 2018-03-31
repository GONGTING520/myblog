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
		$this->load->view('index');
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
		$rows = $this->blog_model->find_bolg_by_user_id($user->user_id);
		$this->load->view('index_logined', array(
			"blogs" => $rows
		));
	}
}
