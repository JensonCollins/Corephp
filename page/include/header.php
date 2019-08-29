<?php

$file = $page_name;

if ($file == '') {
    $tilte = 'Dashboard';
    $index = 'active';
} else if (empty($file)) {
    $tilte = 'Dashboard';
    $index = 'active';
} else if ($file == 'rdps') {
    $tilte = "RDPS";
    $rdps = 'active';
}else if ($file == 'sshs') {
    $tilte = "SSHS";
    $sshs = 'active';
}else if ($file == 'cpanels') {
    $tilte = "CPANELS";
    $cpanels = 'active';
}else if ($file == 'shells') {
    $tilte = "SHELLS";
    $shells = 'active';
} else if ($file == 'smtpIP') {

    $tilte = 'SMTP IP';
    $smtpIP = 'active';

} else if ($file == 'smtpDomain') {

    $tilte = 'SMTP Domain';
    $smtpDomain = 'active';

} else if ($file == 'leads') {

    $tilte = 'Leads';
    $leads = 'active';


} else if ($file == 'purchased') {

    $tilte = 'Purchased';
    $purchased = 'active';


} else if ($file == 'balance') {

    $tilte = 'Add Balance';
    $balance = 'active';


} else if ($file == 'support') {

    $tilte = 'Support';
    $support = 'active';


} else if ($file == 'rules') {

    $tilte = 'Rules';
    $rules = 'active';


} else if ($file == 'profile') {

    $tilte = 'Profile';
    $profile = 'active';

} else {
    $tilte = "247SMTP.COM";
}


//Hosts: shells, cpanels, root ssh, rdp
//Send: php mailer, webmail
//Others: programs and scripts.


?>

<!doctype html>

<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->

<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->

<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->

<!--[if gt IE 8]><!-->

<html class="no-js" lang="en">

<!--<![endif]-->


<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Shop - <?php echo $tilte; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/login/images/icons/apple-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/login/images/icons/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/jqvmap.min.css">

    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>


    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>


    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        div#bootstrap-data-table-export_filter {
            float: right;
        }

        .badge-primary {
            color: #fff;
            background-color: #b8ce3c !important;
        }

        .btn-primary {
            color: #fff;
            background-color: #b8ce3c !important;
            border-color: #b8ce3c !important;
        }


        .rad {
            border-radius: 10%;
        }

        .pay {
            float: left;
            margin-right: 10px;
        }

        .well {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #ffffff;
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
        }

        pre {
            white-space: pre-wrap; /* css-3 */
            white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
            white-space: -pre-wrap; /* Opera 4-6 */
            white-space: -o-pre-wrap; /* Opera 7 */
            word-wrap: break-word; /* Internet Explorer 5.5+ */
        }


        .spinner {
            background: #272c33fa;
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 99;
        }

        .lodimg {
            width: 10%;
            top: 40%;
            position: absolute;
        }

        .teksti {
            font-size: 23px;
            color: black;
            font-family: monospace;
        }


        input.put.cl-Send.Test {
            display: none;
        }
    </style>

</head>


<body onload="loading()">

<div class="spinner">
    <center>
      <span class="lodimg"> 
        <img src="https://loading.io/spinners/typing/lg.-text-entering-comment-loader.gif"><br>
       <img src="<?php echo base_url(); ?>assets/images/smtp.png">
      </span>
    </center>
</div>