<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><strong class="card-title">Support ADMIN </strong></h3>
                    </div>
                    <div class="card-body">

                        <?php if (empty($page_id)) { ?>

                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr role="row">
                                <th class="" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                    width="70px">ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                    width="70px">user_name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Type
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    View
                                </th>
                            </tr>
                            </thead>
                            <!-- class="odd"  class="even" -->
                            <tbody>

                            <?php


                            $i = '1';

                            $sql = $db->query("SELECT * FROM `tickets` ORDER BY `data` DESC ") or die();


                            while ($row = $sql->fetch_assoc()) {

                                $iplpl = $i++;


                                $type = clear($row["type"]);

                                if ($type == '1') {

                                    $tipi = '<button type="button" class="btn btn-warning   btn-custom btn-rounded waves-effect waves-light">Report</button>';


                                } elseif ($type == '2') {

                                    $tipi = '<button type="button" class="btn btn-default btn-custom btn-rounded waves-effect waves-light">Ticket</button>';

                                }


                                $statusi = clear($row["statusi"]);

                                if ($statusi == '1') {

                                    $status = '<button type="button" class="btn btn-success btn-custom btn-rounded waves-effect waves-light">Opened</button>';

                                } elseif ($statusi == '2') {

                                    $status = '<button type="button" class="btn btn-danger btn-custom btn-rounded waves-effect waves-light">Closed</button>';

                                } elseif ($statusi == '3') {

                                    $status = '<button type="button" class="btn btn-inverse btn-custom btn-rounded waves-effect waves-light">Refund</button>';

                                } elseif ($statusi == '4') {

                                    $status = '<button type="button" class="btn btn-purple btn-custom btn-rounded waves-effect waves-light">Unrefund</button>';

                                } elseif ($statusi == '5') {

                                    $status = '<button type="button" class="btn btn-warning btn-custom btn-rounded waves-effect waves-light">Pending</button>';

                                }


                                echo '<strong><tr role="row" class=" ' . $iplpl . '">
                                            <td class="sorting_1" >' . clear($row["id"]) . '</td>
                                             <td class="sorting_1" >' . clear($row["user_name"]) . '</td>
                                            <td><center>' . clear($row["data"]) . '</center></td>
                                            <td><center>' . $tipi . '</center></td>                               
                                            <td><center>' . $status . '</center></td>                                       
                                            <td><center>
                                            <a href="tickets/' . enc(clear($row['id'])) . '"> <button class="btn btn-success">View Ticket</button></center></a></td>
                                            </tr></strong>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="row gutter">


                        </div>
                    </div>

                    <?php }else{ ?>



                    <?php
                    $get_id = clear(dec($page_id));

                    if (isset($_POST['close'])) {

                        $close = $db->query("UPDATE `tickets` SET `statusi` = '2' WHERE `id` = '$get_id'") or die();


                        if ($close) {

                            //$db->query("INSERT INTO `support_log`(`user_name`, `veprimi`, `date`,`action_id`) VALUES ('$user_name','Refund',NOW(),'$post_id')") or die();

                            echo alert('Well done!  You successfully CLOSE', 'success');
                            echo ' <meta http-equiv="refresh" content="2" />';
                        }

                    }

                    if (isset($_POST['refunde'])) {


                        $tickets_sql = $db->query("SELECT * FROM `tickets` WHERE `id` = '$get_id'") or die();
                        $tickets = $tickets_sql->fetch_assoc();
                        $ticket_1 = $tickets['statusi']; // statusi

                        if ($ticket_1 == 1) {

                            // item sector
                            $item_id = $tickets['item_id'];
                            $item_sql = $db->query("SELECT * FROM `accounts` WHERE `item_id` = '$item_id'") or die();
                            $item = $item_sql->fetch_assoc();

                            $price = $item['price'];
                            $buyer = $item['buyer'];

                            //


                            $refund = $db->query("UPDATE `tickets` SET `statusi` = '3' WHERE `id` = '$get_id'") or die();
                            //  die($get_id);
                            $update .= $db->query("UPDATE `accounts` SET `refunde` = '1' WHERE `item_id` = '$item_id'");
                            $update .= $db->query("UPDATE `members` SET `krediti` = (krediti + $price) WHERE `user_name` = '$buyer'");
                            // $update .= $db->query("INSERT INTO `tickets_reply` (`tickets_id`, `message`, `user_name`, `data`) VALUES ('$get_id','Your tools is refunded','Auto',NOW())");


                            if ($update) {

                                //$db->query("INSERT INTO `support_log`(`user_name`, `veprimi`, `date`,`action_id`) VALUES ('$user_name','Refund',NOW(),'$post_id')") or die();

                                echo alert('Well done!  You successfully Refund', 'success');
                                echo ' <meta http-equiv="refresh" content="2" />';
                            }

                        } else {

                            echo alert('It is refund!', 'danger');
                            echo ' <meta http-equiv="refresh" content="2" />';
                        }


                    }

                    if (isset($_POST['reply'])) {

                        $message = clear($_POST['message']);

                        $add_tickets_reply = $db->query("INSERT INTO `tickets_reply` (`tickets_id`, `message`, `user_name`, `data`) VALUES ('$get_id','$message','Support',NOW())");

                        if ($add_tickets_reply) {


                            echo alert('<div id="message">
                                                   <div class="notifyjs-corner" style="top: 0px; left: 0px;">
                                                      <div class="notifyjs-wrapper notifyjs-hidable">
                                                         <div class="notifyjs-arrow" style=""></div>
                                                         <div class="notifyjs-container">
                                                            <div class="notifyjs-metro-base notifyjs-metro-success">
                                                               <div class="image" data-notify-html="image"><i class="fa fa-check"></i></div>
                                                               <div class="text-wrapper">
                                                                  <div class="title" data-notify-html="title">Success</div>
                                                                  <div class="text" data-notify-html="text">U have successful Reply <a href="#">Refresh</a></div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                        <meta http-equiv="refresh" content="2" />');

                        } else {

                            alert('<div class="alert alert-danger"><strong>Oh snap!</strong> Problem try submitting again.</div>');

                        }
                    }

                    function replace_kredencial($data)
                    {

                        $cha = trim(' \\\ ');
                        $cha2 = trim(' \ ');

                        return str_replace($cha, $cha2, $data);
                    }


                    $ticket_sql = $db->query("SELECT * FROM `tickets` WHERE `id` = '$get_id'") or die();
                    $ticket = $ticket_sql->fetch_assoc();


                    $type = clear($ticket["type"]);

                    if ($type == '1') {

                        $echo_tip = 'Tipi : <button type="button" class="btn btn-warning   btn-custom btn-rounded waves-effect waves-light">Report</button>';


                    } elseif ($type == '2') {

                        $echo_tip = 'Tipi : <button type="button" class="btn btn-default btn-custom btn-rounded waves-effect waves-light">Ticket</button>';

                    }


                    if ($ticket['statusi'] == 1) {

                        $show_button = '<form method="POST" action="" style="width:33%;float:left;">
                                                                        <button type="submit" name="refunde" value="' . $get_id . '" class="btn btn-warning btn-rounded waves-effect waves-light">Refunde</button>
                                                                        </form>';

                        $show_button .= '<form method="POST" action="" style="width:33%;float:left;">
                                                                        <button type="submit" name="close" value="' . $get_id . '" class="btn btn-danger btn-rounded waves-effect waves-light">Close</button>
                                                                        </form>';

                    } else if ($ticket['statusi'] == 2) {
                        echo '<button style="float:right;"  class="btn btn-danger btn-custom btn-rounded waves-effect waves-light">Closed</button>';
                    } else {
                        echo '<button  class="btn btn-warning btn-custom btn-rounded waves-effect waves-light">Refunded</button>';
                    }


                    echo '<div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">


                                                        <div class="panel">
                                                           <div class="panel-heading">
                                                              <h4 style="hight:200px">' . $echo_tip . ' </h4>
                                                             

                                                           </div>
                                                           <div class="panel-body">
                                                             <div class="row">';


                    echo '<div class="col-md-9">';

                    echo '<hr><pre class="blockquote-blue">' . $ticket['message'] . '</pre>
                                                                    <small>' . $ticket["user_name"] . ' | ' . clear($ticket["data"]) . '</small>';


                    $ticket_id = $ticket['id'];

                    $tickets_reply_sql = $db->query("SELECT * FROM `tickets_reply` WHERE  `tickets_id` = '$ticket_id'") or die();
                    while ($tickets_reply = $tickets_reply_sql->fetch_assoc()) {

                        echo '<hr><pre class="blockquote-green">' . $tickets_reply['message'] . '</pre>

                                                                      <small><strong>' . $tickets_reply["user_name"] . '</strong> | ' . clear($tickets_reply["data"]) . '</small> <hr>

                                                                     ';

                    }

                    echo '</div>';


                    if ($type == '1') {

                        $item_id = $ticket['item_id'];
                        $accounts_sql = $db->query("SELECT * FROM `accounts` WHERE `item_id` = '$item_id '") or die();

                        $accounts = $accounts_sql->fetch_assoc();

                        ?>

                        <div class="col-md-3" style="float: left;">

                            <?php echo '<p  style="float:right;margin-bottom: -26px;"> ' . $show_button . '</p> '; ?>
                            <br><br>
                            <form class="form-horizontal" role="form">

                                <div class="form-group">

                                    <input type="text" class="form-control" readonly="readonly"
                                           value="ID: <?php echo clear($accounts['item_id']); ?> | Buyer: <?php echo clear($accounts['buyer']); ?> | Price: <?php echo $accounts['price'] ?>$">

                                </div>

                                <div class="form-group">
                                    Info<br>
                                    <input type="text" class="form-control" readonly="readonly"
                                           value="<?php echo replace_kredencial($accounts['info']); ?>">
                                </div>


                                <div class="form-group">
                                    login<br>
                                    <input type="text" class="form-control" readonly="readonly"
                                           value="<?php echo replace_kredencial(trim($accounts['login'])); ?>">

                                </div>

                                <div class="form-group">
                                    Password<br>
                                    <input type="text" class="form-control" readonly="readonly"
                                           value="<?php echo replace_kredencial(trim($accounts['pass'])); ?>">
                                </div>

                                <div class="form-group">
                                    Info<br>
                                    <input type="text" class="form-control" readonly="readonly"
                                           value="<?php echo replace_kredencial(trim($accounts['addinfo'])); ?>">
                                </div>
                            </form>
                        </div>


                        <?php

                    }


                    ?>
                    <hr>
                </div>

            </div>

        </div>


        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">

            <div class="panel">
                <div class="panel-heading">
                    <h4>Ticket reply</h4>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <div class="row gutter">
                                <div class="col-md-12"><label class="control-label">Your Name</label><input
                                            disabled="disabled" type="text" placeholder="ADMIN" class="form-control"
                                            name="title"></div>
                            </div>
                        </div>


                        <div class="form-group"><label class="control-label">Mesage</label>
                            <textarea placeholder="Write reason" class="form-control" name="message"
                                      rows="5"></textarea></div>

                        <button type="reply" name="reply" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>


        <?php }
        ?>

    </div>
</div>

<script>
    $(document).ready(function() {
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

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });
    });
</script>
