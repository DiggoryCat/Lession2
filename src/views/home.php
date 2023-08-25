<div class="home w-75 mt-5"  style="margin: 0 auto;">
    <h3><?php echo $_SESSION['role']; ?></h3>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>No</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 0;
                $u = new UserModel();
                if($_SESSION['role']=='Admin'){
                    $result = $u->getUserForAdmin();//get all account
                    $count_user = count($result->fetchAll()); //count account
                    $limit = 3;//limit 3account every page
                    $pages = ($count_user % $limit == 0) ? $count_user/$limit : ceil($count_user/$limit); //count pages
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1; //set current page
                    if (isset($_GET['page'])) {
                        $start = ($current_page - 1) * $limit;
                    } else {
                        $start = 0;
                        $_GET['page'] = 1;
                    }
                    //fetch from $start 
                    $data = $u->getUserLimit($start, $limit);
                    while($user = $data->fetch()):
                        $no = $no +1;
                        $ele = $user['idu'];
            ?>
            <!-- All User show here -->
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td>                    
                    <a class="btn" href="index.php?controller=register&id=<?php echo $user['idu']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn" href="index.php?controller=home&action=view&id=<?php echo $user['idu']; ?>"><i class="fa-solid fa-eye"></i></a>
                    <?php  echo "<a class='btn' onclick=copytext('$user[username]',". "'$user[email]',". "'$user[role]')><i class='fa-solid fa-copy'></i></a>"; ?>
                    <?php if($user['role']=='User'){
                        echo "<a class='btn' onclick=confirmaction('home','deleteuser','$user[idu]')><i class='fa-solid fa-trash'></i></a>"; 
                    } 
                    ?>
                </td>
            </tr>
            <?php 
                endwhile;
                }
                else{
                    $result = $u->getUserForUser($_SESSION['idu']);
                    
            ?>
            <!-- One User'Infomation show -->
            <tr>
                <td>1</td>
                <td><?php echo $result['username']; ?></td>
                <td><?php echo $result['email']; ?></td>
                <td><?php echo $result['role']; ?></td>
                <td>
                    <a class="btn" href="index.php?controller=register&id=<?php echo $result['idu'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn" href="index.php?controller=home&action=view&id=<?php echo $result['idu'] ?>"><i class="fa-solid fa-eye"></i></a>
                    <?php  echo "<a class='btn' onclick=copytext('$result[username]',". "'$result[email]',". "'$result[role]')><i class='fa-solid fa-copy'></i></a>"; ?>
                </td>
            </tr>
            <?php
                };
            ?>
        </tbody>
    </table>
    
    <!-- Panigation -->
    <?php
        if($_SESSION['role']=='Admin'):
    ?>
    <div class="d-flex justify-content-center mt-5">
        <ul class="pagination">
            <?php if ($current_page > 1 || $_GET['page'] > 1) : ?>
                <li class="page-item "><a class="page-link" href="index.php?controller=home&page=<?php echo ($current_page - 1) ?>">Back</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $pages; $i++) : ?>
                <li class="page-item <?php echo ($i == $_GET['page']) ? 'active' : '' ?>"><a class="page-link " href="index.php?controller=home&page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php endfor; ?>

            <?php if ($current_page < $pages && $pages > 1) : ?>
                <li class="page-item"><a class="page-link" href="index.php?controller=home&page=<?php echo ($current_page + 1) ?>">Next</a></li>
            <?php endif ?>
        </ul>
    </div>
    <?php endif; ?>
</div>
