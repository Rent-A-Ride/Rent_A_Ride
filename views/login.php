<?php
//    var_dump(password_hash('admin123',PASSWORD_DEFAULT));
    $hasErrors = isset($errors) && !empty($errors);
    $isemailError = $hasErrors && isset($errors['email']);
    $isPasswordlError = $hasErrors && isset($errors['password']);

?>


<div class="navbar">
    Rent-A-Ride
</div>
<section>
    <div class="img-bx">
        <img src="/assests/img/b.jpg" alt="">
    </div>

    <div class="content-bx">
        <div class="form-bx">
            <form action="/login" method="post">
                <h1>Login</h1>

                <div class="input-bx">
                    <span>Email:</span><br>
                    <input type="email" name="email">
                    <span class="login_errormessage"> <?php echo $isemailError? "<small>{$errors['email']}</small>" : ""?></span>
                </div>
                <div class="input-bx">
                    <span>Password:</span><br>
                    <input type="password" name="password">
                    <span class="login_errormessage"> <?php echo $isPasswordlError? "<small>{$errors['password']}</small>" : ""?></span>
                </div>
                <div class="forgot">
                    <h5>Forgot your password?? <a href="#">Reset password</a></h5>
                </div>
                <div class="input-bx">

                    <input type="submit" value="Login">
                </div>
                <div class="signup">
                    <h5>Haven't Sign Up yet <a href="/register">Sign Up</a></h5>
                </div>
            </form>
        </div>
    </div>

</section>
