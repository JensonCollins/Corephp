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
    <div class="sidebar" data-color="<?php echo $user_data['sidebar_color']; ?>"
         data-background-color="<?php echo $user_data['sidebar_back_color']; ?>"
         data-image="<?php echo $user_data['sidebar_back_image']; ?>">
        <div class="logo">
            <a href="<?php echo base_url(); ?>" class="simple-text logo-mini">

            </a>
            <a href="<?php echo base_url(); ?>" class="simple-text logo-normal">
                Smtp Shop
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="user-info">
                    <a data-toggle="collapse" href="#collapseExample" class="username">
              <span style="text-align: center;">
                Welcome <?php echo $user_data['user_name']; ?>
                <b class="caret"></b>
              </span>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>profile">
                                    <span class="sidebar-mini"> MP </span>
                                    <span class="sidebar-normal"> My Profile </span>
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

                        <?php
                        for ($i = 0; $i < count($menu_data); $i++) {
                            if ($menu_data[$i]->menu_type == 11) {
                                if (menuHasChild($menu_data[$i]->id) >= 1) {
                                    $child_menu = getChildMenu($menu_data[$i]->id);
                                    ?>

                                    <li class="nav-item ">
                                        <a class="nav-link" data-toggle="collapse"
                                           href="#<?php echo $menu_data[$i]->menu_name . 'example'; ?>">
                                            <?php echo $menu_data[$i]->menu_icon; ?>
                                            <p> <?php echo $menu_data[$i]->menu_name; ?>
                                                <b class="caret"></b>
                                            </p>
                                        </a>
                                        <div class="collapse" id="<?php echo $menu_data[$i]->menu_name . 'example'; ?>">
                                            <ul class="nav">
                                                <?php for ($j = 0; $j < count($child_menu); $j++) { ?>
                                                    <li class="nav-item ">
                                                        <a class="nav-link"
                                                           href="<?php echo base_url() . $child_menu[$j]->menu_link; ?>">
                                                            <span class="sidebar-mini"> <?php echo ucfirst(substr($child_menu[$j]->menu_name, 0, 1)) ?> </span>
                                                            <span class="sidebar-normal"> <?php echo $child_menu[$j]->menu_name ?> </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </li>
                                <?php } else if (!menuHasParent($menu_data[$i]->id)) { ?>
                                    <li class="nav-item  <?php echo (strtolower($menu_data[$i]->menu_link) == strtolower($active_menu)) ? 'active' : ''; ?>">
                                        <a class="nav-link"
                                           href="<?php echo base_url() . $menu_data[$i]->menu_link; ?>">
                                            <?php echo $menu_data[$i]->menu_icon; ?>
                                            <p><?php echo $menu_data[$i]->menu_name; ?></p>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                        } ?>

                    <?php }
                } else {
                    ?>

                    <?php
                    for ($i = 0; $i < count($menu_data); $i++) {
                        if ($menu_data[$i]->menu_type == 0) {
                            if (menuHasChild($menu_data[$i]->id) >= 1) {
                                $child_menu = getChildMenu($menu_data[$i]->id);
                                ?>

                                <li class="nav-item <?php echo (strtolower($menu_data[$i]->menu_link) == strtolower($active_menu)) ? 'active' : ''; ?>">
                                    <a class="nav-link" data-toggle="collapse"
                                       href="#<?php echo $menu_data[$i]->menu_name . 'example'; ?>">
                                        <?php echo $menu_data[$i]->menu_icon; ?>
                                        <p> <?php echo $menu_data[$i]->menu_name; ?>
                                            <b class="caret"></b>
                                        </p>
                                    </a>
                                    <div class="collapse" id="<?php echo $menu_data[$i]->menu_name . 'example'; ?>">
                                        <ul class="nav">
                                            <?php for ($j = 0; $j < count($child_menu); $j++) { ?>
                                                <li class="nav-item ">
                                                    <a class="nav-link"
                                                       href="<?php echo base_url() . $child_menu[$j]->menu_link; ?>">
                                                        <span class="sidebar-mini"> <?php echo ucfirst(substr($child_menu[$j]->menu_name, 0, 1)) ?> </span>
                                                        <span class="sidebar-normal"> <?php echo $child_menu[$j]->menu_name ?> </span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php } else if (!menuHasParent($menu_data[$i]->id)) { ?>
                                <li class="nav-item <?php echo (strtolower($menu_data[$i]->menu_link) == strtolower($active_menu)) ? 'active' : ''; ?>">
                                    <a class="nav-link" href="<?php echo base_url() . $menu_data[$i]->menu_link; ?>">
                                        <?php echo $menu_data[$i]->menu_icon; ?>
                                        <p><?php echo $menu_data[$i]->menu_name; ?></p>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                    } ?>

                    <?php if ($user_data['super'] == 11) { ?>

                        <li class="nav-item">

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
                    <a class="navbar-brand" href=""><?php echo $title; ?></a>
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
                            <a href="<?php echo base_url(); ?>balance" class="btn btn-primary">
                                $&nbsp;<?php echo $user_data['krediti']; ?>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="" id="navbarDropdownProfile" data-toggle="dropdown"
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