<?php
set_include_path(get_include_path() . PATH_SEPARATOR . './src/models/');
spl_autoload_extensions('.php');
spl_autoload_register();
session_start();
?>
<!-- 
    author: Huỳnh Phúc Công Anh
    date: 23/08/2023
 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/assets/css/style.css">
    <script src="https://kit.fontawesome.com/00ab326edb.js" crossorigin="anonymous"></script>
    <title>Lession2_HPCA</title>
</head>

<body>
    <?php if (isset($_SESSION['username'])) : ?>
        <!-- Header -->
        <?php include "./src/views/include/header.php"; ?>
        <div id="app" class="w-100">
            <!-- Main -->
            <div id="main">
                <?php
                $ctrl = 'home';
                if (isset($_GET['controller'])) {
                    $ctrl = $_GET['controller'];
                }
                include "./src/controllers/" . $ctrl . ".php";
                ?>
            </div>
        </div>
    <?php else : ?>
        <?php
        $ctrl = 'login';
        if (isset($_GET['controller'])) {
            $ctrl = $_GET['controller'];
        }
        include "./src/controllers/" . $ctrl . ".php";
        ?>


    <?php endif; ?>
    <?php include "./src/views/include/footer.php"; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./src/assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.7/sweetalert2.all.min.js"></script>
    <script>
        function confirmaction(controller, action, idu) {
            Swal.fire({
                title: 'Are you sure delete this user?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `index.php?controller=${controller}&action=${action}&id=${idu}`;
                }
            })
        }

        function copytext(name, email, role) {
            let all = 'Fullname: ' + name + ' - Email: ' + email + ' - Role: ' + role; 
            console.log(all);
            let input = document.createElement('input') // tạo thẻ input giả
            document.body.appendChild(input) // gán thẻ đó vào bất kì đâu (sao cho không bị ảnh hướng layout nào là được)
            input.value = all // gán giá trị vào input
            input.select() // focus vào input
            document.execCommand('copy') // dùng lệnh này để copy text từ input
            input.remove() // sau đó xóa thẻ
        }
    </script>
</body>

</html>