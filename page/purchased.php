<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Warning</h4>
                    <p>If we find out you have reported a valid tool, we shall clear your account funds and or disable
                        your account.</p>
                    <hr>
                    <p class="mb-0">Team 247smtp.com</p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Purchased</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <?php
                        function replace_kredencial($data)
                        {

                            $vija = "\\\\";

                            $cha = trim($vija);
                            $cha2 = trim('\ ');

                            return str_replace($cha, $cha2, $data);
                        }


                        $i = 1;
                        $koha = 600;

                        if (isset($_POST['tickets'])) {

                            $item_id = clear(dec($_POST['id']));

                            $subject = clear($_POST['subject']);
                            $message = clear($_POST['message']);
                            $user = clear($user_data['user_name']);

                            echo $item_id;

                            echo "0";
                            $tickets = $db->query("SELECT `item_id` FROM `tickets` WHERE `item_id` = '$item_id'") or die($db->error);

                            if (!empty($tickets->num_rows)) {
                                echo "1";
                                echo alert('U have already Reported this item<br>Please go to support to see your ticket</strong>', 'danger');

                            } else {

                                echo "2";
                                $sql = "INSERT INTO `tickets` (`item_id`, `subject`, `message`, `user_name`, `data`, `type`) VALUES ('$item_id','$subject','$message','$user',NOW(),'1')";
                                $add_tickets = $db->query($sql) or die($db->error);

                                if ($add_tickets) {

                                    echo alert('<strong> U have successful report this item<br>
                                                    Thank You</strong>', 'success');

                                } else {

                                    echo alert('<strong>Oh snap!</strong> Problem try submitting again.', 'danger');

                                }

                            }

                            echo "3";
                        }


                        if (isset($_POST['item_id'])) {

                            $item_id = clear(dec($_POST['item_id']));

                            $tickets = $db->query("SELECT `item_id` FROM `tickets` WHERE `item_id` = '$item_id'") or die();
                            // if dont emput ticket  / ticket exist
                            if (!empty($tickets->num_rows)) {

                                echo '<strong><div class="alert alert-danger"><center>U have already Reported this item<br>Please go to support to see your ticket</center></div></strong>';

                            } else {

                                $accounts_sql = $db->query("SELECT * FROM `accounts` WHERE `sold` = '1'  AND `buyer` = '$user_name' AND `item_id` = '$item_id'") or die($db->error);
                                $date_row = $accounts_sql->fetch_assoc();

                                $purchase_data = $date_row['date_purchased'];

                                $now_date = db_date();
                                $diff = strtotime($now_date) - strtotime($purchase_data);

                                if ($diff < $koha && $diff > 0) {  //600 = 10min


                                    ?>

                                    <div class="col-sm-8">
                                        <div class="card-box">
                                            <h4 class="m-t-0 header-title"><b>Report Tools</b></h4>
                                            <strong><p>If you are sure to report this tool, please explain the
                                                    problem.</p></strong>

                                            <form class="form-horizontal" action="" method="post">
                                                <input type="hidden" name="id" value="<?php echo enc($item_id); ?>">
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                        <textarea name="message" class="form-control" rows="10"
                                                                  placeholder="Explain the problem"></textarea></div>
                                                    <br>
                                                </div>
                                                <br>

                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                        <br>
                                                        <button type="submit" name="tickets"
                                                                class="btn btn-success waves-effect waves-light">REPORT
                                                            IT
                                                        </button>

                                                        <a href="<?php echo base_url(); ?>">
                                                            <div type="button" name="tickets"
                                                                 class="btn btn-danger waves-effect waves-light">Cancel
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">

                                        <?php

                                        $accounts_sql = $db->query("SELECT * FROM `accounts` WHERE `item_id` = '$item_id '") or die();
                                        $accounts = $accounts_sql->fetch_assoc();
                                        ?>



                                        <?php echo '<p  style="float:right;margin-bottom: -26px;"> ' . $show_button . '</p> '; ?>
                                        <br><br>
                                        <form class="form-horizontal" role="form">


                                            <div class="form-group">
                                                Contry: <?php echo($accounts["country"]); ?>
                                                | <?php echo flag($accounts["country"]); ?>
                                            </div>

                                            <div class="form-group">
                                                Info:<br>
                                                <input type="text" class="form-control" readonly="readonly"
                                                       value="<?php echo replace_kredencial($accounts['info']); ?>">
                                            </div>


                                            <div class="form-group">
                                                login:<br>
                                                <input type="text" class="form-control" readonly="readonly"
                                                       value="<?php echo replace_kredencial(trim($accounts['login'])); ?>">

                                            </div>

                                            <div class="form-group">
                                                Password:<br>
                                                <input type="text" class="form-control" readonly="readonly"
                                                       value="<?php echo replace_kredencial(trim($accounts['pass'])); ?>">
                                            </div>

                                            <div class="form-group">
                                                Host:<br>
                                                <input type="text" class="form-control" readonly="readonly"
                                                       value="<?php echo replace_kredencial(trim($accounts['addinfo'])); ?>">
                                            </div>
                                        </form>


                                    </div>


                                    <?php


                                } else { // timie is and

                                    echo '<div class="alert alert-danger"><strong> Your time is out</strong></div>';
                                } // ticket dont exist
                            }


                        } else { // nesese nuk eshte ber post vazhdo me pjesen e tableave


                            if ($page_value == null) {

                                ?>


                                <table id="bootstrap-data-table-export"
                                       class="table table-striped table-bordered dataTable no-footer" role="grid"
                                       aria-describedby="datatable_info" style="width: 100%;">
                                    <thead>
                                    <tr role="row">
                                        <th class="no-sort" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" width="100px">ID
                                        </th>
                                        <th class="no-sort" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">Type
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">Info
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">Login
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">Pass
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">URL
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">Price
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">REPORT
                                        </th>
                                    </tr>
                                    </thead>
                                    <!-- class="odd"  class="even" -->
                                    <tbody>
                                    <?php

                                    $sql = $db->query("SELECT * FROM `accounts` WHERE `sold` = '1'  AND `buyer` = '$user_name' ORDER BY `date_purchased` DESC") or die();
                                    while ($row = $sql->fetch_assoc()) {

                                        $iplpl = $i++;


                                        $now_date = db_date();
                                        $purchase_date = $row['date_purchased'];
                                        $diff = strtotime($now_date) - strtotime($purchase_date);

                                        $reporting_tools = reporting_tools($row['item_id']);

                                        if ($reporting_tools != null) {

                                            $report = '<a href="support/' . clear(enc($reporting_tools)) . '""> <div align="center"><button class="btn btn-success  waves-effect waves-light" >REPORTED </button></div></a> ';

                                        } else if ($diff > $koha) {  //600 = 10min

                                            $report = '<div align="center"><button type="button" class="btn fonti btn-danger waves-effect waves-light">Expired</button></div>';

                                        } else {

                                            $diff = $koha - $diff;
                                            $years = floor($diff / (365 * 60 * 60 * 24));
                                            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                                            $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
                                            $minuts = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
                                            //$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60));

                                            $report = '<div align="center"><form action="" method="post"><button type="submit" name="item_id" id="ck' . $iplpl . '" value=' . enc(clear($row['item_id'])) . ' class="btn btn-primary waves-effect waves-light" >REPORT | ' . $minuts . ' min left</button></form></div>';

                                        }

                                        if ($row['category'] == '9') {
                                            $name = "SMTP";
                                            $details = json_decode($row['details'], TRUE);
                                            $user_login = $details['smtp_username'];
                                            $user_pass = $details['smtp_userpass'];
                                            $smtp_server_inf = $details['smtp_server_inf'];
                                            echo '<tr role="row" class=" ' . $iplpl . '">
                                                    <td class="sorting_1" >' . $row["item_id"] . '</td>
                                                    <td class="sorting_1" >' . $name . '</td>
                                                    <td>' . trim($row["info"]) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($user_login) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($user_pass) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($smtp_server_inf) . '</td>
                                                   
                                                    <td>$' . clear($row["price"]) . '</td>
                                                    <td > ' . $report . ' </td>                                                          
                                              </tr>';
                                        } else {

                                            if ($row["category"] == '1') {
                                                $name = 'SMTP IP';
                                            } else if ($row["category"] == '2') {
                                                $name = 'SMTP Domain';
                                            } else if ($row["category"] == '3') {
                                                $name = 'Leads';
                                            }
                                            echo '<tr role="row" class=" ' . $iplpl . '">
                                                    <td class="sorting_1" >' . $row["item_id"] . '</td>
                                                    <td class="sorting_1" >' . $name . '</td>
                                                    <td>' . trim($row["info"]) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($row["login"]) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($row["pass"]) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($row["addinfo"]) . '</td>
                                                   
                                                    <td>$' . clear($row["price"]) . '</td>
                                                    <td > ' . $report . ' </td>                                                          
                                              </tr>';

                                        }

                                    }//AND while
                                    ?>
                                    </tbody>
                                </table>

                            <?php }

                        }// mbyllet jesa ku eshte  ellse nuk eshte ber post reporti
                        ?>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>


<script src="<?php echo base_url(); ?>assets/cloudflare/jquery-3.3.1.js"></script>

<script>
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });

        var table = $('#datatable').DataTable();

    });
</script>



