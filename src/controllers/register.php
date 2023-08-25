<?php
$action="register";
if(isset($_GET["action"])){
    $action = $_GET["action"];
}
switch ($action){
    case "register":
        include "./src/views/register.php";
        break;

    case "register_action":
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $username = $_POST["txtname"];
            $email = $_POST["txtemail"];
            $pwd = $_POST["txtpwd"];
            $data = array(
                "username" => $username, 
                "email" => $email, 
                "password" => $pwd, 
                "role" => 'User');
            $nu = new UserModel();
            $result = $nu->checkExistUser($email);
            if(!$result){
                $res = $nu->register($data);
                echo '<script> alert("Register success!"); </script>';
                echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
            }else{
                echo '<script> alert("Existed Email. Enter other email address!"); </script>';
                echo "<meta http-equiv='refresh' content='0;url=./index.php?controller=register' />";
            }
        }
        break;
    
    case "updateinfo":
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $idu = $_POST["txtidu"];
            $username = $_POST["txtname"];
            $pwd = $_POST["txtpwd"];
            $ou = new UserModel();
            $result = $ou->updateuser($idu,$username, $pwd);
            if($result){
                echo '<script> alert("Updated success!!!"); </script>';
                echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
            }
        }else{
            echo '<script> alert("Updated success!!!"); </script>';
            echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
        }
        break;
}




?>