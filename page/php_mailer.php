<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">PHP mailer</strong>
                    </div>
                    <div class="card-body">
                        <div style="overflow-x:auto;">
                            <table id="bootstrap-data-table-export" class="table-striped table-bordered"
                                   style="width: 100%;">
                                <thead>
                                <tr>
                                    <th width="90px">ID</th>
                                    <th>Country</th>
                                    <th>Detected Hosting</th>
                                    <th>Seller</th>
                                    <th>Send Test to</th>
                                    <th width="150px">Price</th>
                                    <th>Added on</th>
                                    <!--  <th>Last Checked</th> -->
                                    <th width="90px">Buy</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $query = $db->query("SELECT * FROM `accounts`  WHERE `sold` = '0' AND `category` = 8 ORDER BY RAND()") or die($db->error);

                                while ($row = $query->fetch_assoc()) { // preparing an array
                                    $nestedData = array();
                                    $details = json_decode($row['details'], TRUE);
                                    $mailer_server_info = $details['mailer_server_info'];
                                    echo ' <tr>
                                                <td><center>' . clear($row["item_id"]) . '</center></td>
                                                <td>' . flag($row["country"]) . ' - ' . $row["country_name"] . '</td>
                                                <td>' . $mailer_server_info. '</td>
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
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<script src="<?php echo base_url(); ?>assets/cloudflare/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
          
