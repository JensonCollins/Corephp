<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">RDPS</strong>
                    </div>
                    <div class="card-body">
                        <div style="overflow-x:auto;">
                            <table id="bootstrap-data-table-export" class="table-striped table-bordered"
                                   style="width: 100%;">
                                <thead>
                                <tr>

                                    <th width="90px">ID</th>
                                    <th>Country</th>
                                    <th>Windows</th>
                                    <th>Ram</th>
                                    <th>Username</th>
                                    <th>Detected Hosting</th>
                                    <th>Seller</th>
                                    <th width="150px">Price</th>
                                    <!--  <th>Last Checked</th> -->
                                    <th width="90px">Buy</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $query = $db->query("SELECT * FROM `accounts`  WHERE `sold` = '0' AND `category` = '4' ORDER BY RAND()") or die($db->error);

                                while ($row = $query->fetch_assoc()) { // preparing an array
                                    $nestedData = array();
                                    $info = json_decode($row['details'], TRUE);
                                    $version = $info['version'];
                                    $ram = $info['ram'];
                                    $username = $info['username'];
                                    $userpass = $info['userpass'];
                                    $detected_hosting = $info['detected_hosting'];
                                    echo ' <tr>
                                                <td><center>' . clear($row["item_id"]) . '</center></td>
                                                <td>' . flag($row["country"]) . ' - ' . $row["country_name"] . '</td>
                                                <td><center>' . $version . '</center></td>
                                                <td><center>' . $ram . '</center></td>
                                                <td><center>' . $username . '</center></td>
                                                <td><center>' . $detected_hosting . '</center></td>
                                                <td>'.$row['seller'].'</td>
                                                <td><strong>$' . ($row["price"]) . '</strong></td>
                                                
                                                <td>
                                                     <center><button onclick="buy(\'' . ($row['item_id']) . '\',\'tools\')" class="btn rad btn-primary btn-xs hide' . clear(enc($row['item_id'])) . '"> <i class="menu-icon fa fa-shopping-cart"></i> Buy</button>
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
          
