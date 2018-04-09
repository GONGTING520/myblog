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

        // 分页配置
		$this->load->library('pagination');
		$config['base_url'] = base_url()."comment/blog_comments/$user_id";
		$config['total_rows'] = count($res);
		$config['per_page'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$this->pagination->initialize($config);
		$link = '<div class="page">'.$this->pagination->create_links().'</div>';

		// 调用分页方法
		$rows = $this->comment_model->pagination_by_user_id($user_id, $this->uri->segment(4), $config['per_page']);		
		
        var_dump($this->uri->segment(4));
        $this->load->view('blog_comments', array(
            "comments" => $rows,
            "link" => $link,
            "count" => count($res)
        ));
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
