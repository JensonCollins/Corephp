<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Smtps</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="disabled-sorting">ID</th>
                                    <th>Country</th>
                                    <th>Webmail</th>
                                    <th>Detected Hosting</th>
                                    <th>Seller</th>
                                    <th>Send Test to</th>
                                    <th>Price</th>
                                    <th>Added on</th>
                                    <th class="disabled-sorting center">Buy</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Country</th>
                                    <th>Webmail</th>
                                    <th>Detected Hosting</th>
                                    <th>Seller</th>
                                    <th>Send Test to</th>
                                    <th>Price</th>
                                    <th>Added on</th>
                                    <th class="disabled-sorting">Buy</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php

                                $query = $db->query("SELECT * FROM `accounts`  WHERE `sold` = '0' AND `category` = '9' ORDER BY RAND()") or die($db->error);

                                while ($row = $query->fetch_assoc()) { // preparing an array
                                    $nestedData = array();
                                    $details = json_decode($row['details'], TRUE);
                                    $smtp_webmail = $details['smtp_webmail'];
                                    $smtp_server_inf = $details['smtp_server_inf'];
                                    echo ' <tr>
                                                <td><center>' . clear($row["item_id"]) . '</center></td>
                                                <td>' . flag($row["country"]) . ' - ' . $row["country_name"] . '</td>
                                                <td>' . $smtp_webmail. '</td>
                                                <td>' . $smtp_server_inf. '</td>
                                                <td>'.$row['seller'].'</td>
                                                <td>Check</td>
                                                <td><strong>$' . ($row["price"]) . '</strong></td>
                                                <td>' . ($row["date_added"]) . '</td>
                                                
                                                <td>
                                                     <center><button onclick="buy(\'' . enc($row['item_id']) . '\',\'tools\')" class="btn rad btn-primary btn-xs hide' . clear(enc($row['item_id'])) . '"> <i class="menu-icon fa fa-shopping-cart"></i> Buy</button>
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

<script>
    $(document).ready(function() {
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
