<?php

abstract class PersonModel{
    private $username;
    private $email;

    public function setUserName($name){
        $this->username = $name;
    }

    public function getUserName(){
        return $this->username;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }
}

?>