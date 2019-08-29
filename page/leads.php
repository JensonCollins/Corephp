        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Leads</strong>
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>

                                            <th width="90px">ID</th>
                                            <th>Country</th>  
                                            <th>Description</th>
                                            <th width="100px">Quantity</th>
                                            <th width="150px">Price</th>
                                          <!--  <th>Last Checked</th> -->
                                            <th width="90px">Buy</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php 
                                    
                                            $query = $db->query("SELECT * FROM `accounts`  WHERE `sold` = '0' AND `category` = '3' ORDER BY RAND()") or die($db->error);                                           

                                            while ($row = $query->fetch_assoc()) { // preparing an array
                                              $nestedData = array();
                                              echo ' <tr>
                                                        <td>'.clear($row["item_id"]).'</td>
                                                        <td>'. flag($row["country_name"]) .' - '. $row["country_name"].'</td>
                                                        <td>'.clear($row["info"]).'</td>
                                                         <td>'.clear($row["login"]).'</td>
                                                        <td><strong>$'.($row["price"]).'</strong></td>
                                                        <td>
                                                             <center><button onclick="buy(\'' . enc($row['item_id']) . '\',\'tools\')" class="btn rad btn-primary btn-xs hide' .clear(enc($row['item_id'])) . '"> <i class="menu-icon fa fa-shopping-cart"></i> Buy</button>
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

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>




<style type="text/css">

</style>
                            
