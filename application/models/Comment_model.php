<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model{

    // 插入一条评论数据
    public function save($content, $user_id, $blog_id){
        $this->db->insert('t_comment', array(
            'content' => $content,
            'blog_id' => $blog_id,
            'user_id' => $user_id
        ));
        return $this->db->affected_rows();
    }
}