<?php
$wall_paper = "images/bg.jpg";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intinial-scale=1">
    <link rel="stylesheet" href="themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body style="background-image: url(<?php echo $wall_paper ?>);background-repeat: no-repeat">

    <div class="signup-box">
        <form method="post" action="action/register.php">
            <span class="icon-close">
                <a href="index.php"><i class="ti-close"></i></a>
            </span>
            <h2>Register</h2>
            <div class="input-box">
                <span class="icon"><i class="ti-user"></i></span>
                <input type="text" name="u_name" required>
                <label>UserName</label>
            </div>
            <div class="input-box">
                <span class="icon"><i class="ti-email"></i></span>
                <input type="text" name="u_email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><i class="ti-lock"></i></span>
                <input type="password"name="u_pass1"required>
                <label>Password</label>
            </div>
            <div class="input-box">
                <span class="icon"><i class="ti-lock"></i></span>
                <input type="password" name="u_pass" required>
                <label>Confirm Password</label>
            </div>
            <button name ="rs" type="submit">Register</button>
            <div class="register-link">
                <p>Already have an account?<a href="login_form.php"> Login</a></p>
            </div>
        </form>
    </div>

</body>

</html>