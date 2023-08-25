<?php
$action = "login";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "login":
        include "./src/views/login.php";
        break;
    case "login_action":
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["txtemail"];
            $pass = $_POST["txtpwd"];
            $remember = $_POST["remember"];
            $dt = new UserModel();
            $result = $dt->login($email, $pass);

            if ($result != false) {
                //If choose remember account, setcookie for email and password 6hours ~ 3600secs
                if($remember){
                    setcookie('email',$result[2], time()+3600) ;
                    setcookie('pwd',$result[3], time()+3600) ;
                }
                $_SESSION['idu'] = $result[0];
                $_SESSION['username'] = $result[1];
                $_SESSION['role'] = $result[4];
                echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
            } else {
                echo "<script> alert('Wrong email or password. Enter again!');</script>";
                echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
            }
        }
        break;
    case 'logout':
        unset($_SESSION['idu']);
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
        break;
}
?>