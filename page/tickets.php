<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Support Tickets</h4>
                    </div>
                    <div class="card-body">
                        <div class="main-container">
                            <div class="row gutter">

                                <?php
                                if (empty($page_value)) { ?>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable"
                                               class="table table-striped table-bordered dataTable no-footer"
                                               role="grid" aria-describedby="datatable_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1">ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" width="170px">Date
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1">Message
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1">Type
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1">Status
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1">View
                                                </th>
                                            </tr>
                                            </thead>
                                            <!-- class="odd"  class="even" -->
                                            <tbody>

                                            <?php


                                            $i = '1';

                                            $sql = $db->query("SELECT * FROM `tickets` WHERE `user_name` = '$user_name' ORDER BY `data` DESC ") or die();


                                            while ($row = $sql->fetch_assoc()) {

                                                $iplpl = $i++;


                                                $type = clear($row["type"]);

                                                if ($type == '1') {

                                                    $tipi = '<button type="button" class="btn btn-warning btn-xs  btn-custom btn-rounded waves-effect waves-light">Report</button>';


                                                } elseif ($type == '2') {

                                                    $tipi = '<button type="button" class="btn btn-default btn-xs btn-custom btn-rounded waves-effect waves-light">Ticket</button>';

                                                }


                                                $statusi = clear($row["statusi"]);

                                                if ($statusi == '1') {

                                                    $status = '<button type="button" class="btn btn-success btn-xs btn-custom btn-rounded waves-effect waves-light">Opened</button>';

                                                } elseif ($statusi == '2') {

                                                    $status = '<button type="button" class="btn btn-danger btn-xs btn-custom btn-rounded waves-effect waves-light">Closed</button>';

                                                } elseif ($statusi == '3') {

                                                    $status = '<button type="button" class="btn btn-inverse  btn-xs btn-custom btn-rounded waves-effect waves-light">Refund</button>';

                                                } elseif ($statusi == '4') {

                                                    $status = '<button type="button" class="btn btn-purple btn-xs  btn-custom btn-rounded waves-effect waves-light">Unrefund</button>';

                                                } elseif ($statusi == '5') {

                                                    $status = '<button type="button" class="btn btn-warning btn-xs  btn-custom btn-rounded waves-effect waves-light">Pending</button>';

                                                }


                                                echo '<strong><tr role="row" class=" ' . $iplpl . '">
                                                         
                                                          <td class="sorting_1" >' . clear($row["id"]) . '</td>
                                                          <td><center>' . clear($row["data"]) . '</center></td>
                                                          <td>' . clear($row["message"]) . '</td>
                                                          <td><center>' . $tipi . '</center></td>                               
                                                          <td><center>' . $status . '</center></td>                                       
                                                          <td><center>
                                                          <a href="tickets/' . enc(clear($row['id'])) . '"> <button class="btn  btn-xs btn-success">View Ticket</button></center></a></td>
                                                          </tr></strong>';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row gutter">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                                                <a href="<?php echo base_url(); ?>tickets/new"
                                                   class="btn btn-primary btn-lg" style="color: #fff;">OPEN TICKET
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </div>
                                            <?php
                                            if ($user_data['super'] == 11) {
                                                echo '<div class="col-lg-12 col-md-3 col-sm-3 col-xs-6">     
                                                        <div class="panel no-border red-bg">
                                                        <div class="panel-body text-center">
                                                            <div class="user-stats">                                                 
                                                                                                                
                                                                <h5></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                        
                                                    </div>';
                                            }
                                            ?>
                                        </div>
                                    </div>

                                <?php } else if ($page_value == 'new') {


                                    if (isset($_POST['add_ticket'])) {

                                        $message = clear($_POST['reason']);
                                        $user = clear($user_data['user_name']);

                                        $add_tickets = $db->query("INSERT INTO `tickets` (`message`, `user_name`, `data`, `type`) VALUES ('$message','$user',NOW(),'2')") or die($db->error);

                                        if ($add_tickets) {

                                            echo '<meta http-equiv="refresh" content="2; url=../support" />';
                                            die('<div class="alert alert-success"><strong> Send Successfully .</strong></div> ');


                                        } else {

                                            echo '<div class="alert alert-danger"><strong>Oh snap!</strong> Problem try submitting again.</div>';

                                        }


                                    }

                                    ?>

                                    <div class="col-md-4">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h4>New Ticket</h4>
                                            </div>
                                            <div class="panel-body">
                                                <form id="movieForm" method="post">

                                                    <div class="form-group">
                                                        <div class="row gutter">
                                                            <div class="col-md-12">
                                                                <label class="control-label">Your Name</label><input
                                                                        disabled="disabled" type="text"
                                                                        placeholder="<?php echo $user_data['user_name']; ?>"
                                                                        class="form-control" name="title">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="row gutter">
                                                            <div class="col-md-12">
                                                                <label class="control-label">Reason</label>
                                                                <textarea placeholder="Write reason"
                                                                          class="form-control" name="reason"
                                                                          rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="add_ticket" class="btn btn-info">
                                                        Submit
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="bs-component">
                                            <div class="well" style="background: #e9ecef;padding: 35px">
                                                <ul>
                                                    <li>In order to refund ticket go to <b>Account</b> -&gt; <b>My
                                                            Orders</b> and choose the tool and click on <b>Report</b>
                                                        button
                                                    </li>
                                                    <li>Do not create double-tickets , create just one ticket and
                                                        include all your problems then wait for your ticket to be
                                                        replied
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                <?php } else { ?>

                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="panel">
                                    <div class="panel-heading">
                                        <h4>Conversation</h4>
                                    </div>
                                    <div class="panel-body">

                                    <?php

                                    $get_id = clear(dec($page_value));

                                    $ticket_sql = $db->query("SELECT * FROM `tickets` WHERE `user_name` = '$user_name' AND `id` = '$get_id'") or die();
                                    $ticket = $ticket_sql->fetch_assoc();

                                    echo '<hr><pre class="blockquote-blue">' . $ticket['message'] . '</pre> 
                                                                                                <small>' . $ticket["user_name"] . ' | ' . clear($ticket["data"]) . ' </small>

                                                                                               ';
                                    $ticket_id = $ticket['id'];

                                    $tickets_reply_sql = $db->query("SELECT * FROM `tickets_reply` WHERE  `tickets_id` = '$ticket_id'") or die();
                                    while ($tickets_reply = $tickets_reply_sql->fetch_assoc()) {

                                        echo '<hr><pre class="blockquote-green">' . $tickets_reply['message'] . '</pre>
                                                                                                  <small><strong>' . $tickets_reply["user_name"] . '</strong> | ' . clear($tickets_reply["data"]) . '</small><hr>';
                                    }


                                    if ($ticket['statusi'] == 2) {
                                        echo "<strong><center>Ticket is Close</center></strong>";
                                    } else {

                                        if (isset($_POST['replay_ticket'])) {

                                            $message = clear($_POST['comment']);
                                            $user = clear($user_data['user_name']);

                                            $add_tickets = $db->query("INSERT INTO `tickets_reply` (`tickets_id`, `user_name`, `message`, `data`) VALUES ('$ticket_id','$user','$message', NOW())") or die($db->error);

                                            if ($add_tickets) {

                                                echo '<meta http-equiv="refresh" content="2; url=../support" />';

                                                die('<div class="alert alert-success"><strong> Sent Successfully</strong></div> ');


                                            } else {

                                                echo '<div class="alert alert-danger"><strong>Oh snap!</strong> Problem try submitting again.</div>';

                                            }

                                        }

                                        ?>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4>Replay</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <form id="movieForm" method="post">
                                                        <div class="form-group">
                                                            <div class="row gutter">
                                                                <div class="col-md-8"><label class="control-label">Your
                                                                        Name</label><input disabled="disabled"
                                                                                           type="text"
                                                                                           placeholder="<?php echo $user_data['user_name']; ?>"
                                                                                           class="form-control"
                                                                                           name="title"></div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group"><label
                                                                    class="control-label">Comment</label>
                                                            <textarea placeholder="Write reason" class="form-control"
                                                                      name="comment" rows="5"></textarea></div>

                                                        <button type="submit" name="replay_ticket" class="btn btn-info">
                                                            Submit
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        </div>
                                        </div>
                                        </div>


                                    <?php }
                                }
                                ?>

                            </div>
                        </div>
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

<script>
    $(document).ready(function () {
        $('#datatables').DataTable({
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
