<?php
logged_in_redirect();
$errors = array();


//$captcha_code = $_SESSION['captcha']['code'];
//if ($captcha_code != $_POST['CAPTCHA'] or empty($captcha_code)){  
//   $_SESSION['captcha'] = captcha();
//   $captcha_code = $_SESSION['captcha']['code'];
//}

if (empty($_POST['username']) === false) {
    $errors = array();
    $user = clear($_POST['username']);
    $password = clear($_POST['password']);


    if ($_POST['captcha_challenge'] != $_SESSION['captcha_text']) {
        $errors[] = 'Captcha Error';

    } elseif (empty($user) === true || empty($user) === true) {
        $errors[] = alert('Put the correct password or username', 'error');

    } else if (user_exists($user) === false) {
        $errors[] = alert('You are not a member? Sign up now!', 'error');

    } else if (user_active($user) === false) {

        $errors[] = alert('Your profile is deactivated', 'error');

    } else {

        $login = login($user, $password);

        if ($login === false) {

            $errors[] = alert('Password is incorrect', 'error');

        } else {

            // session_start();

            $_SESSION['user_id'] = $login;
            $_SESSION['login_time'] = db_date();

            header('Location: home');
            exit('index');

        }


    }

} // and login form

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in</title>
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
<body style="background: url('assets/images/bg.png');"
      onload="document.getElementById('username').focus(); icaptcha(1,'#999999','Wrong Captcha!',10,'php')">
<br>
<div class="limiter">
    <div class="container-login100">

        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">

            <form class="login100-form validate-form" action="" method="POST" id="login" name='validate'>

					<span class="login100-form-title p-b-59">
						<center>Login</center>
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
                    <input class="input100" id="username" type="text" name="username" placeholder="Username...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="*************">
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Insert Captcha">
                    <center><span class="label-input100">Enter the Captcha Text</span></center>
                    <img src="captcha.php" alt="CAPTCHA" class="captcha-image" style="width: 50%; float: left;">
                    <input class="input100" type="text" id="captcha" name="captcha_challenge" pattern="{6}"
                           style="width: 50%; float: left;">
                    <span class="focus-input100"></span>
                </div>


                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" name="login" type="submit">
                            Sign in
                        </button>
                    </div>


                    <a href="register" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                        Sign Up
                        <i class="fa fa-long-arrow-right m-l-5"></i>
                    </a>


                </div>
            </form>


            <style type="text/css">
                h4.alert {
                    color: #fff;
                    background: #ff000099;
                }
            </style>


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