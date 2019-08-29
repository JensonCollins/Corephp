<?php
// start sign up
if (empty($_POST['username']) === false) {

    $usr = clear($_POST['username']);
    $email = clear($_POST['email']);
    $password = clear($_POST['password']);
    $confirm_password = clear($_POST['confirm_password']);

    // If the Register form has been submitted

    $errors = array();

    // $errors[]='<div class="alert alert-warning alert-dismissable page-alert"><button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please select reCAPTCHA</div>';

    if ($_POST['captcha_challenge'] != $_SESSION['captcha_text']) {
        $errors[] = 'Captcha Error';
    }

    if (strlen($_POST['username']) < 4 || strlen($_POST['username']) > 32) {
        $errors[] = 'Your username must be between 4 and 32 characters!';
    }

    if (preg_match('/[^a-z0-9\-\_\.]+/i', $_POST['username'])) {
        $errors[] = 'Your username contains invalid characters!';
    }

    if ($password != $confirm_password) {
        $errors[] = 'Password does not match the confirm password';
    }

    if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 32) {
        $errors[] = 'Your Password must be between 6 and 32 characters!';
    }


    if (!checkEmail($_POST['email'])) {
        $errors[] = 'Your email is not valid!';
    }

    // ketu nese user name ekziston
    $test = user_exists($usr);

    if (!empty($test)) {
        $errors[] = 'This username already exist. Please choose another one!';
    }


    if (!count($errors)) {


        // If there are no errors
        $user_ip = clear(VisitorIP());

        $salt = 'KK856'; // SALT for encrypting , `forcePassword` = '1'
        // insert in databes
        echo json_encode($db);
        $register = $db->query("INSERT INTO `members`(user_name,pass,email,regIP,dt) VALUES ('" . $usr . "','" . md5($password . $salt) . "','" . $email . "','" . $user_ip . "', NOW())") or die(mysql_error());
        echo "INSERT INTO `members`(user_name,pass,email,regIP,dt) VALUES ('" . $usr . "','" . md5($password . $salt) . "','" . $email . "','" . $user_ip . "', NOW())";

        if ($register) {

//            echo '<div class="sucess">
//                              	<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
//                              	<center> U Have successfull register to our shop please read the rules before starting buy. </center>
//                          </div>
//
//                        <meta http-equiv="refresh" content="2; url=login" />';
        }

    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/main.css">
    <!--===============================================================================================-->
</head>
<body style="background: url('/assets/images/bg.png');"
      onLoad="document.getElementById('username').focus(); icaptcha(1,'#999999','Wrong Captcha!',10,'php')">

<br>
<div class="limiter">
    <div class="container-login100">

        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
            <form class="login100-form validate-form" action="" method="POST" id="login" name='validate'>
                  <span class="login100-form-title p-b-59">
                  <center>  Sign Up</center>
                   </span>


                <?php

                $output_errors = output_errors($errors);

                if (!empty($output_errors)) {

                    //  $_SESSION['captcha'] = captcha();
                    echo '<br><p class="alert">' . $output_errors . '</p><br>';

                }


                ?>

                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="username" placeholder="Username...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" name="email" placeholder="Email addess...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="*************">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Repeat Password is required">
                    <span class="label-input100">Repeat Password</span>
                    <input class="input100" type="password" name="confirm_password" placeholder="*************">
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Insert Captcha">
                    <center><span class="label-input100">Enter the Captcha Text</span></center>
                    <img src="../captcha.php" alt="CAPTCHA" class="captcha-image" style="width: 50%; float: left;">
                    <input class="input100" type="text" id="captcha" name="captcha_challenge" pattern="{6}"
                           style="width: 50%; float: left;">
                    <span class="focus-input100"></span>
                </div>


                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" name="signup" type="subimt">
                            Sign Up
                        </button>
                    </div>
                    <a href="login" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                        Sign in
                        <i class="fa fa-long-arrow-right m-l-5"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
</html>


<style type="text/css">
    .error {
        padding: 20px;
        background-color: #f44336;
        color: white;
        width: 100%;
    }

    .sucess {
        padding: 20px;
        background-color: #4CAF50;
        color: white;
        width: 100%;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }

    .alert {
        color: #fff;
        background: #ff000099;
        width: 100%;
    }
</style>

</body>
</html>
