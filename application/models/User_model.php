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

    // 根据user_id查询t_user表
    public function find_by_user_id($user_id){
        return $this->db->get_where("t_user", array(
            "user_id" => $user_id
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

    // 根据user_id修改一条数据
    public function update_by_user_id($user_id, $username, $sex, $birthday){
        $this->db->where("user_id", $user_id);
        $this->db->update("t_user", array(
            "username" => $username,
            "sex" => $sex,
            "birthday" => $birthday
        ));
        return $this->db->affected_rows();
    }

    // 根据user_id修改用户的password
    public function update_pwd_by_user_id($user_id, $password){
        $this->db->where('user_id', $user_id);
        $this->db->update('t_user', array("password"=>$password));
        return $this->db->affected_rows();
    }

    // 根据user_id修改用户的signature
    public function update_signature_by_user_id($user_id, $signature){
        $this->db->where('user_id', $user_id);
        $this->db->update('t_user', array("signature"=>$signature));
        return $this->db->affected_rows();
    }
}