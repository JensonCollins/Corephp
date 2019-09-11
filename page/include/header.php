<?php

$file = $page_name;

$active_menu = ($page_value === '') ? $page_name : $page_name . '/' . $page_value;

for ($i = 0; $i < count($menu_data); $i++) {
    if (strtolower($menu_data[$i]->menu_link) === strtolower($active_menu)) {
        $title = $menu_data[$i]->menu_title;
        break;
    } else {
        $title = "SMTP SHOP";
    }
}

if ($file == '') {
    $title = 'Dashboard';
} else if (empty($file)) {
    $title = 'Dashboard';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <title>
        Shop - <?php echo $title; ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
    <meta name="keywords" content="247smtp.net smtp.net www.247smtp.net smtp">
    <meta name="description" content="Buy Smtp">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/family_material_icons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cloudflare/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet"/>
    <!-- Google Tag Manager -->
    <script src="<?php echo base_url(); ?>assets/cloudflare/jquery-3.3.1.js"></script>

    <script src="<?php echo base_url(); ?>assets/custom/js/header.js"></script>

    <script>
        (function (w, d, s, l, i) {
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
