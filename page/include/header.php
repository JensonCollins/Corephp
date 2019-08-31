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


} else if ($file == 'others') {

    $tilte = 'Others';
    $others = 'active';


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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <title>
        Shop - <?php echo $tilte; ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Extra details for Live View on GitHub Pages -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
    <!-- Google Tag Manager -->
    <script src="<?php echo base_url(); ?>assets/cloudflare/jquery-3.3.1.js"></script>

    <script src="<?php echo base_url(); ?>assets/custom/js/header.js"></script>

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>
    <!-- End Google Tag Manager -->
</head>
