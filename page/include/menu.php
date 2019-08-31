<div id="message"></div>

<body class="">
<!-- Extra details for Live View on GitHub Pages -->
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black"
         data-image="<?php echo base_url(); ?>assets/assets/img/sidebar-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
  
          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
            <a href="<?php echo base_url(); ?>" class="simple-text logo-mini">
                ST
            </a>
            <a href="<?php echo base_url(); ?>" class="simple-text logo-normal">
                Smtp Shop
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="<?php echo base_url(); ?>assets/images/admin.jpg" alt="avatar"/>
                </div>
                <div class="user-info">
                    <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <?php echo $user_data['user_name']; ?>
                <b class="caret"></b>
              </span>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="sidebar-mini"> MP </span>
                                    <span class="sidebar-normal"> My Profile </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="sidebar-mini"> EP </span>
                                    <span class="sidebar-normal"> Edit Profile </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="sidebar-mini"> S </span>
                                    <span class="sidebar-normal"> Settings </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <?php

                if ($page_name == 'admin') { ?>

                    <?php if ($user_data['super'] == 11) { ?>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin" class="nav-link">
                                <i class="menu-icon fa fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/support" class="nav-link">
                                <i class="menu-icon fa fa-pencil"></i>
                                <p>Support</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/add" class="nav-link">
                                <i class="menu-icon fa  fa-plus"></i>
                                <p>Add Tools</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/users" class="nav-link">
                                <i class="menu-icon fa  fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/transactions" class="nav-link">
                                <i class="menu-icon fa  fa-dollar"></i>
                                <p>Transactions</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/manual" class="nav-link">
                                <i class="menu-icon fa  fa-shopping-cart"></i>
                                <p>Manual Payment</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/unsold" class="nav-link">
                                <i class="menu-icon fa  fa-shopping-cart"></i>
                                <p>Unsold</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/sold" class="nav-link">
                                <i class="menu-icon fa  fa-shopping-cart"></i>
                                <p>Sold</p>
                            </a>
                        </li>
                    <?php }
                } else {
                    ?>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">image</i>
                            <p> Send
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?php echo base_url(); ?>smtps">
                                        <span class="sidebar-mini"> S </span>
                                        <span class="sidebar-normal"> SMTPs </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
<!--                    <li class="nav-item --><?php //echo $others; ?><!--">-->
<!--                        <a class="nav-link" href="--><?php //echo base_url(); ?><!--others">-->
<!--                            <i class="menu-icon fa fa-at"></i>-->
<!--                            <p>Others-->
<!--                                <span class="badge badge-primary" style="border-radius: 50%; text-align: right;">-->
<!--                                --><?php //echo unsold_tools('10'); ?>
<!--                            </span></p>-->
<!--                        </a>-->
<!--                    </li>-->
                    <li class="nav-item <?php echo $purchased; ?>">
                        <a class="nav-link" href="<?php echo base_url(); ?>purchased">
                            <i class="menu-icon fa fa-shopping-cart"></i>
                            <p>Purchased</p>
                        </a>
                    </li>


                    <li class="nav-item <?php echo $support; ?>">
                        <a class="nav-link" href="<?php echo base_url(); ?>support">
                            <i class="menu-icon fa fa-users"></i>
                            <p>Support</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>balance">
                            <i class="menu-icon fa fa-dollar"></i>
                            <p>Add Funds</p>
                        </a>
                    </li>

                    <li class="nav-item <?php echo $rules; ?>">
                        <a class="nav-link" href="<?php echo base_url(); ?>rules">
                            <i class="menu-icon fa  fa-pencil-square-o"></i>
                            <p>Rules</p>
                        </a>
                    </li>

                    <?php if ($user_data['super'] == 11) { ?>

                        <li class="nav-item <?php echo $rules; ?>">

                            <a class="nav-link" href="<?php echo base_url(); ?>admin">
                                <i class="menu-icon fa  fa-user"></i>
                                <p><strong>ADMIN</strong></p>
                            </a>

                        </li>

                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo"><?php echo $tilte; ?></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>balance" class="pay">
                                <div class="badge-green badge badge-primary">
                                    $<?php echo $user_data['krediti']; ?>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="<?php echo base_url(); ?>profile">Profile</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>purchased">Purchased</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>logout.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>