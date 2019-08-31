<?php
if (isset($_POST['addbalance'])) {


    $username = clear($_POST['user_name']); //
    $userid = username_to_id($username);
    $amount = clear($_POST['amount']);

    $addbalance = $db->query("UPDATE `members` SET krediti = (krediti + $amount) WHERE `user_id` = '$userid'") or die($db->error);

    if ($addbalance) {

        $db->query("INSERT INTO `transaction`(`amount`, `user_id`, `state`, `date`) VALUES ('$amount','$userid','Manual',now())") or die($db->error);
        echo alert("Sendet  " . $amount . "$ Successful!</br> To: " . $username, 'success');

    } else {
        echo alert("Error!");
    }

}
?>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Add Manual</strong>
                    </div>
                    <div class="card-body">


                        <div class="row">

                            <div class="col-md-8">

                                <form class="form-horizontal" action="" method="post">

                                    <br><br>

                                    <div class="form-group">

                                        <label class="col-sm-2 control-label">Select User</label>

                                        <div class="col-sm-10">

                                            <input class="form-control" name="user_name" required="">


                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <label class="col-md-2 control-label">Amount</label>

                                        <div class="col-md-10">

                                            <input type="text" class="form-control" name="amount" required="">

                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <label class="col-md-11 control-label"> </label>

                                        <div class="col-md-1">

                                            <button type="submit" name="addbalance"
                                                    class="btn btn-default waves-effect waves-light">Add Balance
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>