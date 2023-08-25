<div class="w-75" style="margin: 0 auto;">
    <ul class="nav nav-pills mt-5">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"><?php echo ($_SESSION['username']) ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" style="font-size: 16px !important;" href="index.php?controller=login&action=logout">Logout</a></li>
                
            </ul>
        </li>
    </ul>
</div>