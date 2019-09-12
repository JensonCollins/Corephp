<div class="content">
    <div class="container-fluid pt-3">
        <div class="row">

            <div class="col-md-12">
                <div class="alert text-center" role="alert">
                    <h4>
                        <i class="fas material-icons">shopping_cart</i> Your Orders
                    </h4>
                    <p>You can only report a bad tool within 10 minutes by clicking on <a
                                class="label label-primary p-1 rounded" style="background-color: #2c3e50; color: #fff">Report
                            #ID</a> , Otherwise we can't give you refund or replacement!</p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
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

                        function get_reportid($item_id) {
                            global $db;
                            $tickets = $db->query("SELECT * FROM `tickets` WHERE `item_id` = '$item_id'") or die($db->error);
                            $row = $tickets->fetch_assoc();
                            return $row['id'];
                        }

                        $i = 1;
                        $koha = 600;

                        if (isset($_POST['tickets'])) {
                            $item_id = clear(($_POST['id']));
                            $subject = "";
                            if (isset($_POST['subject'])) {
                                $subject = clear($_POST['subject']);
                            } else
                                $subject = "";
                            $message = clear($_POST['message']);
                            $user = clear($user_data['user_name']);

                            $tickets = $db->query("SELECT `item_id` FROM `tickets` WHERE `item_id` = '$item_id'") or die($db->error);

                            if (!empty($tickets->num_rows)) {
                                echo alert('U have already Reported this item Please go to support to see your ticket', 'warning');

                            } else {
                                $sql = "INSERT INTO `tickets` (`item_id`, `subject`, `message`, `user_name`, `data`, `type`) VALUES ('$item_id','$subject','$message','$user',NOW(),'1')";
                                $add_tickets = $db->query($sql) or die($db->error);

                                if ($add_tickets) {

                                    echo alert('<strong> U have successful report this item<br>
                                                    Thank You</strong>', 'success');

                                } else {

                                    echo alert('<strong>Oh snap!</strong> Problem try submitting again.', 'danger');

                                }

                            }

                        }


                        if (isset($_POST['item_id'])) {

                            $item_id = clear(($_POST['item_id']));

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
                                                <input type="hidden" name="id" value="<?php echo($item_id); ?>">
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

                                                        <a href="<?php echo base_url(); ?>purchased">
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
                                        $details = json_decode($accounts['details'], TRUE);
                                        $smtp_server_inf = $details['smtp_server_inf'];
                                        $smtp_username = $details['smtp_username'];
                                        $smtp_userpass = $details['smtp_userpass'];
                                        $smtp_port = $details['smtp_port'];
                                        $detected_isp = $details['detected_isp'];
                                        ?>

                                        <?php //echo '<p  style="float:right;margin-bottom: -26px;"> ' . $show_button . '</p> '; ?>
                                        <br><br>
                                        <form class="form-horizontal" role="form">


                                            <div class="form-group">
                                                Country: <?php echo($accounts["country_name"]); ?>
                                                | <?php echo flag($accounts["country"]); ?>
                                            </div>

                                            <div class="form-group">
                                                Info:<br>
                                                <input type="text" class="form-control" readonly="readonly"
                                                       value="<?php //echo replace_kredencial($accounts['info']);
                                                       echo $detected_isp; ?>">
                                            </div>


                                            <div class="form-group">
                                                login:<br>
                                                <input type="text" class="form-control" readonly="readonly"
                                                       value="<?php //echo replace_kredencial(trim($accounts['login']));
                                                       echo $smtp_username ?>">

                                            </div>

                                            <div class="form-group">
                                                Password:<br>
                                                <input type="text" class="form-control" readonly="readonly"
                                                       value="<?php //echo replace_kredencial(trim($accounts['pass']));
                                                       echo $smtp_userpass; ?>">
                                            </div>

                                            <div class="form-group">
                                                Host:<br>
                                                <input type="text" class="form-control" readonly="readonly"
                                                       value="<?php //echo replace_kredencial(trim($accounts['addinfo']));
                                                       echo $smtp_server_inf . ":" . $smtp_port; ?>">
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
                                            colspan="1">Item
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">Open(View)
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">Price
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">REPORT
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1">Date
                                        </th>
                                        <th style="visibility: hidden;">

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

                                            $report = '<a href="tickets/' . clear(($reporting_tools)) . '""> <div align="center"><button class="btn btn-success btn-sm waves-effect waves-light" >#'.get_reportid($row["item_id"]).' </button></div></a> ';

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

                                            $report = '<div align="center"><form action="" method="post"><button type="submit" name="item_id" id="ck' . $iplpl . '" value=' . (clear($row['item_id'])) . ' class="btn btn-primary waves-effect waves-light" >REPORT | ' . $minuts . ' min left</button></form></div>';

                                        }

                                        if ($row['category'] == '2') {
                                            $name = "SMTP";
                                            $details = json_decode($row['details'], TRUE);
                                            $detected_isp = $details['detected_isp'];
                                            $user_login = $details['smtp_username'];
                                            $user_pass = $details['smtp_userpass'];
                                            $smtp_server_inf = $details['smtp_server_inf'];

                                            $item = $row['country_name'] . " | " . $smtp_server_inf . " | " . $user_login . " | " . $user_pass;

                                            echo '<tr role="row" class=" ' . $iplpl . '">
                                                    <td class="sorting_1" >' . $row["item_id"] . '</td>
                                                    <td class="sorting_1" >' . $name . '</td>
                                                    <td>' . ($item) . '</td>
                                                    <td><button class="btn btn-info wave-effect btn-sm edit">Open #' . $row['item_id'] . '</button></td>
                                                    <td>$' . clear($row["price"]) . '</td>
                                                    <td > ' . $report . ' </td>                                                          
                                                    <td > ' . $row['date_added'] . ' </td>                                                          
                                                    <td style="visibility: hidden;"> ' . $row['country'] . ' </td>                                                          
                                              </tr>';
                                            /*<td>' . trim($detected_isp) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($user_login) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($user_pass) . '</td>*/
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

<!-- notice modal -->
<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Order #12345</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">close</i>
                </button>
                <hr>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>SMTP</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-3">
                        <div class="col-md-4">
                            Country
                        </div>
                        <div class="col-md-8" id="smtp_country">
                            <img src="https://uploads.strikinglycdn.com/static/icons/country-flags-24/JP.png"/>Japan
                        </div>
                    </div>
                    <hr>
                    <div class="row m-3">
                        <div class="col-md-4">
                            HOST/IP
                        </div>
                        <div class="col-md-6">
                            <input type="text" readonly id="smtp_hostip" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-sm btn-success btn-round" id="btn_hostip_copy">copy</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-3">
                        <div class="col-md-4">
                            Port
                        </div>
                        <div class="col-md-8" id="smtp_port">
                            Japan
                        </div>
                    </div>
                    <hr>
                    <div class="row m-3">
                        <div class="col-md-4">
                            User
                        </div>
                        <div class="col-md-6">
                            <input type="text" readonly id="smtp_user" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-sm btn-success btn-round" id="btn_smtpuser_copy">copy</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-3">
                        <div class="col-md-4">
                            Pass
                        </div>
                        <div class="col-md-6">
                            <input type="text" readonly id="smtp_pass" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-sm btn-success btn-round" id="btn_smtppass_copy">copy</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-3">
                        <div class="col-md-4">
                            Sender Email
                        </div>
                        <div class="col-md-6">
                            <input type="text" readonly id="smtp_senderemail" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-sm btn-success btn-round" id="btn_smtp_senderemail_copy">copy</button>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->

<script src="<?php echo base_url(); ?>assets/cloudflare/jquery-3.3.1.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#bootstrap-data-table-export').DataTable({
            "columnDefs": [
                {
                    "targets": [ 7 ],
                    "visible": false
                }
            ],
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

        table.order([0, 'desc']).draw();

        table.on('click', '.edit', function () {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            var item = data[2];
            var country_name = item.split("|")[0].trim();
            var server_info = item.split("|")[1].trim();
            var smtp_user = item.split("|")[2].trim();
            var smtp_pass = item.split("|")[3].trim();

            $("#myModalLabel").html("Order #" + data[0]);
            $("#smtp_country").html("<img src=\"https://uploads.strikinglycdn.com/static/icons/country-flags-24/" + data[7].toLowerCase() + ".png\"/>" + country_name);
            $("#smtp_hostip").val(server_info);
            $("#smtp_port").html(465);
            $("#smtp_user").val(smtp_user);
            $("#smtp_pass").val(smtp_pass);
            $("#smtp_senderemail").val(smtp_user);
            $("#noticeModal").modal({show: true});
        });

        $("#btn_hostip_copy").on('click', function() {
            $("#smtp_hostip").focus();
            $("#smtp_hostip").select();
            document.execCommand('copy');
        });

        $("#btn_smtpuser_copy").on('click', function() {
            $("#smtp_user").focus();
            $("#smtp_user").select();
            document.execCommand('copy');
        });

        $("#btn_smtppass_copy").on('click', function() {
            $("#smtp_pass").focus();
            $("#smtp_pass").select();
            document.execCommand('copy');
        });

        $("#btn_smtp_senderemail_copy").on('click', function() {
            $("#smtp_senderemail").focus();
            $("#smtp_senderemail").select();
            document.execCommand('copy');
        });
    });

</script>