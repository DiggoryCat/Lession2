<div class="my-5">
<?php 
        $u = new UserModel();
        $user = $u->getUserForUser($_GET['id']);
    ?>
    <div class="updateinfo" style="margin-top: 50px;">
        <div class="card border-1 shadow p-5 w-50" style="margin: 0 auto;">
            <h3 class="text-center">View Infomation</h3>
            <form action="" method="post" id="form-register">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" name="txtidu" value="<?php echo $user['idu']; ?>" hidden>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" name="txtname" value="<?php echo $user['username']; ?>" readonly>
                    <label for="email">Fullname</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" name="txtemail" value="<?php echo $user['email']; ?>" readonly>
                    <label for="email">Email Address</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" name="txtpwd" value="<?php echo $user['password']; ?>" readonly>
                    <label for="pwd">Password</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" name="txtrole" value="<?php echo $user['role']; ?>" readonly>
                    <label for="role">Role</label>
                </div>
            </form>
            <div class="button-group mt-3 d-flex justify-content-between">
                <div class="">
                    <a class="btn btn-secondary" name="register" style="font-size: 12px !important;" href="index.php">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>