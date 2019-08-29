        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ShopName</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Users</a></li>                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Users</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>

                                            <th width="90px">ID</th>
                                            <th>Username</th>  
                                            <th>Email</th>
                                            <th>Payment</th>                                            

                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php 
                                    
                                            $query = $db->query("SELECT * FROM `members`") or die($db->error);                                           

                                            while ($row = $query->fetch_assoc()) { // preparing an array
                                              $nestedData = array();
                                              echo ' <tr>
                                                        <td>'.clear($row["user_id"]).'</td>
                                                        <td>'. $row["user_name"].'</td>
                                                        <td>'.clear($row["email"]).'</td>
                                                         <td>'.clear($row["krediti"]).'</td>
                                                   
                                                    </tr>';
                                            }
                                            ?>
                                     
                                    </tbody>
                                </table>
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
                            
