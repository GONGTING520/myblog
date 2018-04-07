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

    // 根据user_id查找所有发送给自己的评论
    public function find_by_user_id($user_id){
        $this->db->select('c.*, b.title, b.blog_id, u.username');
        $this->db->from('t_blog_type bt');
        $this->db->join('t_blog b', "bt.type_id=b.type_id");
        $this->db->join('t_comment c', "b.blog_id=c.blog_id");
        $this->db->join('t_user u', "u.user_id=c.user_id");
        $this->db->where('bt.user_id', $user_id);
        $this->db->order_by('c.post_time', 'DESC');
        return $this->db->get()->result();
    }

    // 根据user_id查找所有发送给自己的评论,分页
    public function pagination_by_user_id($user_id, $offset, $page_length){
        $this->db->select('c.*, b.title, b.blog_id, u.username');
        $this->db->from('t_blog_type bt');
        $this->db->join('t_blog b', "bt.type_id=b.type_id");
        $this->db->join('t_comment c', "b.blog_id=c.blog_id");
        $this->db->join('t_user u', "u.user_id=c.user_id");
        $this->db->where('bt.user_id', $user_id);
        $this->db->order_by('c.post_time', 'DESC');
        $this->db->limit($page_length, $offset);
        return $this->db->get()->result();
    }

    // 根据comment_id删除一条评论信息
    public function delete_comment_by_comment_id($comment_id){
        $this->db->delete('t_comment', array("comment_id"=>$comment_id));
        return $this->db->affected_rows();
    }
}