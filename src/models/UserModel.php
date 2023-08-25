<?php

/**
 * author: Huỳnh Phúc Công Anh
 * Class Object User 
 */
class UserModel extends PersonModel{


    public function __construct() {
    }

    /**
     * function register an new account
     */
    public function register($data)
    {
        $db = new ConnectModel();
        $check = "select * from user where email = '$data[2]'";
        $checkexist = $db->getInstance($check);
        if($checkexist){
            return;
        }else{
            return $db->insert('user', $data);
        }
    }

    /**
     * function update infomation of an account
     */
    public function updateuser($idu,$username, $pwd)
    {
        $db = new ConnectModel();
        $sql = "UPDATE user SET username = '$username', password = '$pwd' WHERE idu = '$idu' ";
        return $db->exec($sql);
    }


    /**
     * function login 
     */
    public function login($email, $pass)
    {
        $db = new ConnectModel();
        $select = "select * from user where email='$email' and password='$pass'";
        $result = $db -> getList($select);
        // echo gettype($result);
        $set = $result->fetch();
        return $set;
    }

    /**
     * function get list all Users for Admin UI 
     */
    public function getUserForAdmin(){
        $db = new ConnectModel();
        $sql = "SELECT * FROM user";
        $result = $db->getList($sql);
        return $result;
            
    }

    /**
     * function get $limit users from $start (panigation)
     */
    public function getUserLimit($start, $limit){
        $db = new ConnectModel();
        $sql = "SELECT * FROM user LIMIT $start, $limit";
        $result = $db->getList($sql);
        return $result;
    }

    /**
     * function get myself infomation when login by user role 
     */
    public function getUserForUser($idu){
        $db = new ConnectModel();
        $sql = "select * from user where idu = '$idu' ";
        $result = $db->getInstance($sql);
        return $result;
    }
    

    /**
     * Check exist an email when register an new account. if exist this email, function return true 
     */
    public function checkExistUser($email)
    {
        $db = new ConnectModel();
        $check = "select * from user where email = '$email'";
        $checkexist = $db->getInstance($check);
        if($checkexist){
            return true;
        }else{
            return false;
        }
    }

    /**
     * function delete an account when confirm the alert
     */
    public function deleteUser($idu){
        $db = new ConnectModel();
        $sql = "delete FROM user WHERE idu= '$idu'";
        $db->exec($sql);
    }
}

?>