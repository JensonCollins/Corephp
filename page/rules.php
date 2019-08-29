        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ShopName</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Rules</a></li>                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>






        <div class="content mt-3">
            <div class="animated fadeIn">
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
                                    
                                        $up_roles =  $db->query("UPDATE `members` SET  `rules`='1' WHERE `user_id`='$user_id'")or die($db->error);
                                        echo alert('Welcome to 247Smtp.com','primary');
                                        echo '<meta http-equiv="refresh" content="2; url='.$path.'"/>';                 

                                }

                                if ($user_data['rules'] == "0") { ?>  
                                    <br> <br> <br>
                                    <hr>
                                     <br>
                                <form method="POST">
                                    <center>
                                    <button type="submit" name="accept" class="alert badge-primary" value="1" role="alert">Agree</button>
                                        <a href="<?php echo base_url(); ?>logout.php"><div  name="accept" class="alert badge-danger" value="1" role="alert" style="width: 105px">Disagree</div></a>
                                    </center>
                                </form>



                            <?php }  ?>

                           </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
