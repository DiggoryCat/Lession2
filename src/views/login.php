<div class=" my-5">
    <div class="login " style="margin-top: 150px;">
        <div class="card border-1 shadow p-5 w-50" style="margin: 0 auto;">
            <h3 class="text-center">Sign In</h3>
            <form action="index.php?controller=login&action=login_action" method="post">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Enter email" name="txtemail" <?php if(isset($_COOKIE['email'])){ echo 'value="'.$_COOKIE['email'].'"';} ?>>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" placeholder="Enter password" name="txtpwd" <?php if(isset($_COOKIE['pwd'])){ echo 'value="'.$_COOKIE['pwd'].'"';} ?>>
                    <label for="pwd">Password</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="check1" name="remember" value="something"<?php if(isset($_COOKIE['email'])){ echo 'checked';} ?>>
                    <label class="form-check-label">Remember me!</label>
                </div>
                <div class="button-group mt-3 d-flex justify-content-between">
                    <button class="btn btn-primary" name="login" type="submit">Sign in</button>
                    <div class="">
                        <label for="register" style="font-style: italic; font-size:12px;">Need an account?</label>
                        <a class="btn btn-secondary" name="register" style="font-size: 12px !important;" href="index.php?controller=register">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div></div>
</div>