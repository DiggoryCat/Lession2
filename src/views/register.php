<div class=" my-5">
    <?php
        if(!isset($_GET['id'])):
    ?>
    <!-- When Register -->
    <div class="register " style="margin-top: 150px;">
        <div class="card border-1 shadow p-5 w-50" style="margin: 0 auto;">
            <h3 class="text-center">Register</h3>
            <form action="index.php?controller=register&action=register_action" method="post" id="form-register">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Enter email" name="txtname" required>
                    <label for="email">Fullname</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Enter email" name="txtemail" required>
                    <label for="email">Email Address</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" id="pwd1" placeholder="Enter password" name="txtpwd" required>
                    <label for="pwd">Password</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" id="pwd2" placeholder="Enter password" name="txtcfpwd"  required>
                    <label for="pwd">Confirm Password</label>
                    <small id="message" style="color:red;"></small>
                </div>
                <div class="button-group mt-3 d-flex justify-content-between">
                    <button class="btn btn-primary" name="register" type="submit">Create</button>
                    <div class="">
                        <label for="register" style="font-style: italic; font-size:12px;">Have an account?</label>
                        <a class="btn btn-secondary" name="register" style="font-size: 12px !important;" href="index.php">Sign in</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php 
        else:
        $u = new UserModel();
        $user = $u->getUserForUser($_GET['id']);
    ?>
    <!-- When Update infomation -->
    <div class="updateinfo" style="margin-top: 50px;">
        <div class="card border-1 shadow p-5 w-50" style="margin: 0 auto;">
            <h3 class="text-center">Update Infomation</h3>
            <form action="index.php?controller=register&action=updateinfo" method="post" id="form-register">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" name="txtidu" value="<?php echo $user['idu']; ?>" hidden>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" name="txtname" value="<?php echo $user['username']; ?>">
                    <label for="email">Fullname</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" name="txtemail" value="<?php echo $user['email']; ?>" readonly>
                    <label for="email">Email Address</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" name="txtpwd" value="<?php echo $user['password']; ?>">
                    <label for="pwd">Password</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" name="txtrole" value="<?php echo $user['role'];?>" readonly>
                    <label for="role">Role</label>
                </div>
                <div class="button-group mt-3 d-flex justify-content-between">
                    <button class="btn btn-primary" name="register" type="submit">Save</button>
                    <div class="">
                        <a class="btn btn-secondary" name="register" style="font-size: 12px !important;" href="index.php">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>

</div>