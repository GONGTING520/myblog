<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    // 根据邮箱和密码查询t_user表
    public function find_by_email_pwd($email, $pwd){
        return $this->db->get_where("t_user", array(
            "email" => $email,
            "password" => $pwd
        ))->row();
    }

    // 根据邮箱查询t_user表
    public function find_by_email($email){
        return $this->db->get_where("t_user", array(
            "email" => $email
        ))->row();
    }

    // 插入一条数据
    public function save($email, $name, $pwd, $sex){
        $this->db->insert('t_user', array(
            "email" => $email,
            "username" => $name,
            "password" => $pwd,
            "sex" => $sex,
        ));
        return $this->db->affected_rows();
    }
}