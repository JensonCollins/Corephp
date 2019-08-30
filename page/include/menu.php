<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img
                        src="<?php echo base_url(); ?>assets/images/smtp.png"
                        alt="Logo"></a>
            <a class="navbar-brand hidden" href="<?php echo base_url(); ?>"><img
                        src="<?php echo base_url(); ?>assets/images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">


                <?php

                if ($page_name == 'admin') { ?>

                    <?php if ($user_data['super'] == 11) { ?>

                        <h3 class="menu-title">
                            <center>Admin</center>
                        </h3><!-- /.menu-title -->

                        <li class="">
                            <a href="<?php echo base_url(); ?>admin/"> <i
                                        class="menu-icon fa  fa-home"></i>Dashboard</a>
                        </li>

                        <li class="">
                            <a href="<?php echo base_url(); ?>admin/support"> <i
                                        class="menu-icon fa fa-pencil"></i>Support</a>
                        </li>


                        <li class="">
                            <a href="<?php echo base_url(); ?>admin/add"> <i class="menu-icon fa  fa-plus"></i>Add Tools</a>
                        </li>


                        <li class="">
                            <a href="<?php echo base_url(); ?>admin/users"> <i class="menu-icon fa  fa-users"></i>Users</a>
                        </li>


                        <li class="">
                            <a href="<?php echo base_url(); ?>admin/transactions"> <i
                                        class="menu-icon fa  fa-dollar"></i>Transactions</a>
                        </li>

                        <li class="">
                            <a href="<?php echo base_url(); ?>admin/manual"> <i
                                        class="menu-icon fa  fa-shopping-cart"></i>Manual
                                Payment</a>
                        </li>


                        <li class="">
                            <a href="<?php echo base_url(); ?>admin/unsold"> <i
                                        class="menu-icon fa  fa-shopping-cart"></i>Unsold</a>
                        </li>

                        <li class="">
                            <a href="<?php echo base_url(); ?>admin/sold"> <i
                                        class="menu-icon fa  fa-shopping-cart"></i>Sold</a>
                        </li>

                    <?php }


                } else {

                    ?>

                    <li class="<?php echo ($rdps || $sshs || $cpanels || $shells) ? 'active' : ''; ?> parent">
                        <a href="#sub-item-1" class="dropdown-toggle clickable" data-toggle="collapse">
                            <i class="menu-icon fa fa-envelope">&nbsp;</i>Hosts
                            <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
                                <em class="fa fa-plus righticon"></em>
                            </span>
                        </a>
                        <ul class="children collapse <?php echo ($rdps || $sshs || $cpanels || $shells) ? 'show' : ''; ?>"
                            id="sub-item-1">
                            <li>
                                <a href="<?php echo base_url(); ?>rdps"><i class="menu-icon fa fa-desktop">&nbsp;</i>RDPs
                                    <span class="badge badge-primary"
                                          style="border-radius: 50%;"><?php echo unsold_tools('4'); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>sshs"><i class="menu-icon fa fa-terminal">&nbsp;</i>SSH(VPS)
                                    <span class="badge badge-primary"
                                          style="border-radius: 50%;"><?php echo unsold_tools('5'); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>cpanels"><i class="menu-icon fa fa-gear">&nbsp;</i>cPanels
                                    <span class="badge badge-primary"
                                          style="border-radius: 50%;"><?php echo unsold_tools('6'); ?></span>
                                </a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>shells"><i class="menu-icon fa fa-file-code-o">&nbsp;</i>Shells
                                    <span class="badge badge-primary"
                                          style="border-radius: 50%;"><?php echo unsold_tools('7'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php echo ($php_mailer || $smtps) ? 'active' : ''; ?> parent">
                        <a href="#sub-item-1" class="dropdown-toggle clickable" data-toggle="collapse">
                            <i class="menu-icon fa fa-mail-reply">&nbsp;</i>Send
                            <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
                                <em class="fa fa-plus righticon"></em>
                            </span>
                        </a>
                        <ul class="children collapse <?php echo ($php_mailer || $smtps) ? 'show' : ''; ?>"
                            id="sub-item-1">
                            <li>
                                <a href="<?php echo base_url(); ?>php_mailer"><i class="menu-icon fa fa-leaf">&nbsp;</i>PHP
                                    mailers
                                    <span class="badge badge-primary"
                                          style="border-radius: 50%;"><?php echo unsold_tools('8'); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>smtps"><i
                                            class="menu-icon fa fa-mail-forward">&nbsp;</i>SMTPs
                                    <span class="badge badge-primary"
                                          style="border-radius: 50%;"><?php echo unsold_tools('9'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!--                    <li class="--><?php //echo $smtpIP; ?><!--">-->
                    <!--                        <a href="--><?php //echo base_url(); ?><!--smtpIP"> <i class="menu-icon fa fa-envelope"></i>IP SMTP-->
                    <!--                            <span-->
                    <!--                                    class="badge badge-primary"-->
                    <!--                                    style="border-radius: 50%;">--><?php //echo unsold_tools('1'); ?><!--</span></a>-->
                    <!--                    </li>-->
                    <!---->
                    <!--                    <li class="--><?php //echo $smtpDomain; ?><!--">-->
                    <!--                        <a href="--><?php //echo base_url(); ?><!--smtpDomain"> <i class="menu-icon fa fa-envelope-o"></i>Domain-->
                    <!--                            SMTP-->
                    <!--                            <span class="badge badge-primary"-->
                    <!--                                  style="border-radius: 50%;">--><?php //echo unsold_tools('2'); ?><!--</span></a>-->
                    <!--                    </li>-->

                    <li class="<?php echo $others; ?>">
                        <a href="<?php echo base_url(); ?>others"> <i class="menu-icon fa fa-at"></i>Others <span
                                    class="badge badge-primary"
                                    style="border-radius: 50%;"><?php echo unsold_tools('10'); ?></span></a>
                    </li>

<!--                    <li class="--><?php //echo $leads; ?><!--">-->
<!--                        <a href="--><?php //echo base_url(); ?><!--leads"> <i class="menu-icon fa fa-at"></i>Leads <span-->
<!--                                    class="badge badge-primary"-->
<!--                                    style="border-radius: 50%;">--><?php //echo unsold_tools('3'); ?><!--</span></a>-->
<!--                    </li>-->

                    <li class="<?php echo $purchased; ?>">
                        <a href="<?php echo base_url(); ?>purchased"> <i class="menu-icon fa fa-shopping-cart"></i>Purchased</a>
                    </li>


                    <li class="<?php echo $support; ?>">
                        <a href="<?php echo base_url(); ?>support"> <i class="menu-icon fa fa-users"></i>Support</a>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(); ?>balance"> <i class="menu-icon fa fa-dollar"></i>Add Funds</a>
                    </li>

                    <li class="<?php echo $rules; ?>">
                        <a href="<?php echo base_url(); ?>rules"> <i class="menu-icon fa  fa-pencil-square-o"></i>Rules</a>
                    </li>

                    <?php if ($user_data['super'] == 11) { ?>

                        <li class="<?php echo $rules; ?>">

                            <a href="<?php echo base_url(); ?>admin"> <i
                                        class="menu-icon fa  fa-user"></i><strong>ADMIN</strong> </a>

                        </li>

                    <?php } ?>


                <?php } ?>


            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->


<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-10">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">

                    <!--
                      <div class="dropdown for-notification" >


                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-bell"></i>
                              <span class="count bg-danger">5</span>
                          </button>



                          <div class="dropdown-menu" aria-labelledby="notification" style="border-top: 2px solid #b8ce3c;">
                              <p class="red">You have 4 Notification</p>


                                    <a class="dropdown-item media" href="#" style="background: #b8ce3c;">
                                        <span class="message media-body">
                                            <span class="name float-left">Jonathan Smith</span>
                                            <span class="time float-right">Just now</span>
                                                <p>Hello, this is an example msg</p>
                                        </span>
                                    </a>

                                      <a class="dropdown-item media" href="#" style="background: #b8ce3c;">
                                        <span class="message media-body">
                                            <span class="name float-left">Jonathan Smith</span>
                                            <span class="time float-right">Just now</span>
                                                <p>Hello, this is an example msg</p>
                                        </span>
                                    </a>


                                      <a class="dropdown-item media" href="#" style="background: #b8ce3c;">
                                        <span class="message media-body">
                                            <span class="name float-left">Jonathan Smith</span>
                                            <span class="time float-right">Just now</span>
                                                <p>Hello, this is an example msg</p>
                                        </span>
                                    </a>

                                      <a class="dropdown-item media" href="#" style="background: #b8ce3c;">
                                        <span class="message media-body">
                                            <span class="name float-left">Jonathan Smith</span>
                                            <span class="time float-right">Just now</span>
                                                <p>Hello, this is an example msg</p>
                                        </span>
                                    </a>



                          </div>
                      </div>  -->

                </div>

            </div>

            <div class="col-sm-2">

                <a href="<?php echo base_url(); ?>balance" class="pull-right pay">
                    <div class="alert badge-primary" role="alert">
                        $<?php echo $user_data['krediti']; ?>
                    </div>
                </a>

                <div class="user-area dropdown float-right">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="<?php echo base_url(); ?>assets/images/admin.jpg"
                             alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="<?php echo base_url(); ?>profile"><i class="fa fa-user"></i> My
                            Profile</a>
                        <a class="nav-link" href="<?php echo base_url(); ?>purchased"><i
                                    class="fa fa-shopping-cart"></i>
                            Purchased</a>
                        <a class="nav-link" href="<?php echo base_url(); ?>logout.php"><i class="fa fa-power-off"></i>
                            Logout</a>
                    </div>

                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->
    <div id="message"></div>




