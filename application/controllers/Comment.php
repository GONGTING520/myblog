<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

    // 构造函数
    public function __construct(){
        parent::__construct();
		$this->load->model('comment_model');       
    }

    // 添加一条评论
    public function add_comment(){
        $content = $this->input->post('content');
        $user_id = $this->input->post('user_id');
        $blog_id = $this->input->post('blog_id');
        $rows = $this->comment_model->save($content, $user_id, $blog_id);
        if($rows > 0){
            echo "success";
        }else{
            echo "fail";
        }
    }
}
