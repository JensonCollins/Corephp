<?php
//sendTestmailSMTP("smtp.utoronto.ca", "pfhr@utoronto.ca","pfhr2013", "465","jenson.collins@hotmail.com");
?>

<style>
    tfoot > tr > th {
        font-weight: 400;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="row mt-3">
                            <div class="col-md-2 ml-4">
                                <h4 class="card-title">Found SMTPs: <?php echo unsold_tools('2'); ?></h4>
                            </div>
                            <div class="col-md-3 ml-auto">
                                <div class="form-group">
                                    <button class="btn btn-success" onclick="edit_checker_email()">Edit Checker Email
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="checker_default_email" value="<?php echo $user_data['checker_email']; ?>">
                    <div class="card-body">
                        <div class="toolbar">
                        </div>
                        <div class="material-datatables">
                            <table id="datatables"
                                   class="table table-striped table-hover table-fixed table-bordered dataTable"
                                   cellspacing="0" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="disabled-sorting">ID</th>
                                    <th>Country</th>
                                    <th>Detected ISP</th>
                                    <th>Port</th>
                                    <th class="send_test_to">Send Test
                                        to <?php echo $user_data['checker_email']; ?></th>
                                    <th>Price</th>
                                    <th class="disabled-sorting m-auto">Buy</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Country</th>
                                    <th>Detected ISP</th>
                                    <th>Port</th>
                                    <th class="send_test_to">Send Test
                                        to <?php echo $user_data['checker_email']; ?></th>
                                    <th>Price</th>
                                    <th class="disabled-sorting">Buy</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php

                                $query = $db->query("SELECT * FROM `accounts`  WHERE `sold` = '0' AND `category` = '2' AND is_deleted != 1 ORDER BY RAND()") or die($db->error);

                                while ($row = $query->fetch_assoc()) { // preparing an array
                                    $nestedData = array();
                                    $details = json_decode($row['details'], TRUE);
//                                    $smtp_webmail = $details['smtp_webmail'];
                                    $smtp_server_inf = $details['detected_isp'];
                                    $port = $details['smtp_port'];
                                    echo ' <tr id="row' . clear($row["item_id"]) . '">
                                                <td><center>' . clear($row["item_id"]) . '</center></td>
                                                <td>' . flag($row["country"]) . ' - ' . $row["country_name"] . '</td>
                                                <td>' . $smtp_server_inf . '</td>
                                                <td>' . $port . '</td>
                                                <td><button class="btn btn-info btn-sm" onclick="smtpCheck(this, ' . clear($row["item_id"]) . ')"><i class="fa fa-send"></i>&nbsp;&nbsp;Check</button></td>
                                                <td><strong>$' . ($row["price"]) . '</strong></td>
                                                <td>
                                                     <center><button onclick="buy(\'' . ($row['item_id']) . '\',\'tools\')" class="btn rad btn-primary btn-sm hide' . clear(($row['item_id'])) . '"> <i class="menu-icon fa fa-shopping-cart"></i> Buy</button>
                                                     </center>
                                                </td>
                                            </tr>';
                                }
                                ?>
                                </tbody>
                            </table>
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
<link rel="stylesheet" type="text/css"
      href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
<script>

    var checking_count = 0;

    $(document).ready(function () {
        var table = $('#datatables').DataTable({
            "pagingType": "full_numbers",
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            },
            fixedHeader: {
                header: true,
                footer: true
            },
            "paging": false
        });

        // table.row($("#row79")).remove().draw();
        // console.log($(table.columns('.send_test_to').header()[0]).html("send"));
        // console.log($(table.columns('.send_test_to').footer()[0]).html("send"));
        /*$('#datatables thead tr').clone(true).appendTo('#datatables thead');

        $('#datatables thead tr:eq(1) th').each(function (i) {
            var title = $(this).text();
            $(this).html('<input type="text" class="put cl-' + title + '" placeholder="Search ' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });*/
    });

    function smtpCheck(self, smtp_id) {
        var table = $('#datatables').DataTable();
        if (checking_count >= 5) {
            swal({
                title: "Other checking operation is executed!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning",
                type: 'warning'
            }).catch(swal.noop);
        } else {
            checking_count++;
            $(self).removeClass("btn-success");
            $(self).addClass("btn-danger");
            $(self).html("<i class='fa fa-send'></i>&nbsp;&nbsp;Sending...");
            var recepient_name = $("#checker_default_email").val();
            $.ajax({
                url: '<?php echo base_url();?>ajax',
                type: 'POST',
                data: {
                    smtp_id: smtp_id,
                    recepient_name: recepient_name
                },
                success: function (response) {
                    checking_count--;
                    var jsonData = JSON.parse(response);
                    if (jsonData.success === 1) {
                        $(self).removeClass("btn-danger");
                        $(self).addClass("btn-success");
                        $(self).html("<i class=\"material-icons\">check</i>&nbsp;&nbsp;Sent to " + recepient_name + " (#" + smtp_id + ")");
                    } else {
                        table.row($("#row"+smtp_id)).remove().draw();
                        $(self).html("bad");
                    }
                },
                error: function (error) {
                    swal({
                        title: "Server Error!",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-danger",
                        type: 'error'
                    }).catch(swal.noop);
                }
            })
        }
    }

    function email_change(self) {
        $("#checker_default_email").val($(self).val());
    }

    function change_checker_email() {
        var table = $("#datatables").DataTable();
        $(table.columns('.send_test_to').header()[0]).html("Send Test to " + $("#checker_default_email").val());
        $(table.columns('.send_test_to').footer()[0]).html("Send Test to " + $("#checker_default_email").val());
        $.ajax({
            url: '<?php echo base_url();?>ajax',
            type: 'POST',
            data: {
                checker_email: $("#checker_default_email").val(),
                member_id: "<?php echo $user_data['user_id']; ?>"
            },
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success === 1) {
                    swal({
                        title: "Email Checker Address Updated",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                        type: 'success'
                    }).catch(swal.noop);
                } else {
                    swal({
                        title: "Update Failed!",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-danger",
                        type: 'error'
                    }).catch(swal.noop);
                    $(self).html("<i class='fa fa-warning'></i>&nbsp;&nbsp;Failed to " + recepient_name);
                }
            },
            error: function (error) {
                swal({
                    title: "Server Error!",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-danger",
                    type: 'error'
                }).catch(swal.noop);
            }
        })
    }

    function edit_checker_email() {
        swal({
            title: 'Change Checker Email Address',
            html: '<input type="email" class="form-control" id="checker_email" onchange="email_change(this)" value="' + $("#checker_default_email").val() + '">',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success change_checker_email',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function (result) {
            console.log(result.value);
            if (result.value) {
                change_checker_email();
            }
        }).catch(swal.noop)
    }
</script>

<style>
    thead > tr > th {
        font-weight: 700;
    }
</style>