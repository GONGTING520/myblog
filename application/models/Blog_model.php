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

    // 根据user_id查询文章信息
    public function find_blog_by_user_id($user_id){
        $this->db->select('b.*,bt.type_name');
        $this->db->from('t_blog b');
        $this->db->join('t_blog_type bt', 'b.type_id=bt.type_id');
        $this->db->where('bt.user_id', $user_id);
        return $this->db->get()->result();
    }

    // 根据user_id查询文章信息，然后分页
    public function pagination_blog_by_user_id($user_id, $offset, $page_length){
        $this->db->select('b.*,bt.type_name');
        $this->db->from('t_blog b');
        $this->db->join('t_blog_type bt', 'b.type_id=bt.type_id');
        $this->db->where('bt.user_id', $user_id);
        $this->db->order_by('b.post_time', 'DESC');
        $this->db->limit($page_length, $offset);
        return $this->db->get()->result();
    }

    // 根据blog_id删除一条博客
    public function delete_blog($blog_id){
        $this->db->delete('t_blog', array('blog_id' => $blog_id));
        return $this->db->affected_rows();
    }

    // 根据blog_id查询一条博客
    public function find_blog_by_blog_id($blog_id){
        return $this->db->get_where('t_blog', array("blog_id"=>$blog_id))->row();
    }

    // 根据blog_id查询此博客的评论
    public function find_comment_by_blog_id($blog_id){
        $this->db->select('*');
        $this->db->from('t_user u');
        $this->db->join('t_comment c', 'u.user_id=c.user_id');
        $this->db->where('c.blog_id', $blog_id);
        $this->db->order_by('c.post_time', 'DESC');
        return $this->db->get()->result();
    }

    // 查询所有的博客的数量
    public function find_blog_user_blog_type_num(){
        return $this->db->get('t_blog')->result();
    }

    // 查询所有的博客信息
    public function pagination_blog_user_blog_type($offset, $page_length){
        $this->db->select('*');
        $this->db->from('t_blog b');
        $this->db->join('t_blog_type bt', 'bt.type_id=b.type_id');
        $this->db->join('t_user u', 'u.user_id=bt.user_id');
        $this->db->order_by('b.post_time', 'DESC');
        $this->db->limit($page_length, $offset);
        return $this->db->get()->result();
    }

    // 根据user_id查询所有博客类型
    public function find_blog_type_by_user_id($user_id){
        $this->db->select('*,(SELECT COUNT(*) FROM t_blog b WHERE b.type_id=bt.type_id) AS num', false)->from('t_blog_type bt');
        $this->db->where('bt.user_id', $user_id)->order_by('bt.order_num', "ASC");
        return $this->db->get()->result();
    }

    // 插入一条博客类型信息
    public function save_blog_type($type_name, $user_id, $order_num){
        $this->db->insert('t_blog_type', array(
            "type_name" => $type_name,
            "user_id" => $user_id,
            "order_num" => $order_num,
        ));
        return $this->db->affected_rows();
    }

    // 更新一条博客信息
    public function update_blog($blog_id, $blog_type, $content, $title){
        $this->db->where('b.blog_id', $blog_id);
        $this->db->update('t_blog b', array(
            'title' => $title,
            'content' => $content,
            'type_id' => $blog_type,
        ));
        return $this->db->affected_rows();
    }

    // 根据user_id关联用户、信息表查询所有留言
    public function find_comments_by_user_id($user_id){
        $this->db->select('m.*,u.username');
        $this->db->from('t_message m');
        $this->db->join('t_user u', 'u.user_id=m.sender');
        $this->db->where('m.receiver', $user_id);
        $this->db->order_by('post_time', 'DESC');
        return $this->db->get()->result();
    }

    // 根据user_id关联用户、信息表查询所有已发送留言
    public function find_send_comments_by_user_id($user_id){
        $this->db->select('m.*,u.username');
        $this->db->from('t_message m');
        $this->db->join('t_user u', 'u.user_id=m.receiver');
        $this->db->where('m.sender', $user_id);
        $this->db->order_by('post_time', 'DESC');
        return $this->db->get()->result();
    }
}