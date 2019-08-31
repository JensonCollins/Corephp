<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Transaction</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>

                                <th width="90px">Amount</th>
                                <th>Username</th>
                                <th>Hash</th>
                                <th>Date</th>
                                <th>Method</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            $query = $db->query("SELECT * FROM `transaction`") or die($db->error);

                            while ($row = $query->fetch_assoc()) { // preparing an array
                                $nestedData = array();
                                echo ' <tr>
                                                        <td>$' . clear($row["amount"]) . '</td>
                                                        <td>' . $row["username"] . ' / ' . id_to_username($row["user_id"]) . '</td>
                                                        <td>' . clear($row["hash"]) . '</td>
                                                        <td>' . clear($row["date"]) . '</td>
                                                        <td>' . clear($row["state"]) . '</td>                                                   
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
    });
</script>
