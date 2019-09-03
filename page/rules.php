<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Rules</strong>
                    </div>
                    <div class="card-body">

                        Rules

                        <?php

                        if (isset($_POST['accept'])) {

                            $up_roles = $db->query("UPDATE `members` SET  `rules`='1' WHERE `user_id`='$user_id'") or die($db->error);
                            echo alert('Welcome to Vpox.ru', 'primary');
                            echo '<meta http-equiv="refresh" content="2; url=' . base_url() . '"/>';

                        }

                        if ($user_data['rules'] == "0") { ?>
                            <br> <br> <br>
                            <hr>
                            <br>
                            <form method="POST">
                                <center>
                                    <button type="submit" name="accept" class="alert badge-primary" value="1"
                                            role="alert">Agree
                                    </button>
                                    <a href="<?php echo base_url(); ?>logout.php">
                                        <div name="accept" class="alert badge-danger" value="1" role="alert"
                                             style="width: 105px">Disagree
                                        </div>
                                    </a>
                                </center>
                            </form>


                        <?php } ?>

                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
