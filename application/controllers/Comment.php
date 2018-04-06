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

    // 根据user_id查找发给用户的所有评论
    public function blog_comments($user_id){
        $res = $this->comment_model->find_by_user_id($user_id);
        if($res){
            $this->load->view('blog_comments', array(
                "comments" => $res
            ));
        }else{
            $this->load->view('index.html');
        }
    }

    // 删除一条评论信息，须传入comment_id
    public function delete_comment(){
        $comment_id = $this->input->get('commentId');
        $rows = $this->comment_model->delete_comment_by_comment_id($comment_id);
        if($rows > 0){
            echo "success";
        }else{
            echo "fail";
        }
    }
}
