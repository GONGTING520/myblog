<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model{

    // 根据user_id查询文章类型
    public function find_bolg_type_by_user_id($user_id){
        return $this->db->get_where("t_blog_type", array(
            "user_id" => $user_id
        ))->result();
    }

    // 插入一条博客信息
    public function save_blog($title, $content, $blog_type)
    {
        $this->db->insert("t_blog", array(
            'title' => $title,
            'content' => $content,
            'type_id' => $blog_type,
        ));
        return $this->db->affected_rows();
    }
}