<?php
$action = "home";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "home":
        include "./src/views/home.php";
        break;
    case "view":
        include "./src/views/infomationuser.php";
        break;
    case "deleteuser":
        if(isset($_GET['id'])){
            $idu = $_GET['id'];
            $nd = new UserModel();
            $nd->deleteUser($idu);
            echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
        }
}
?>