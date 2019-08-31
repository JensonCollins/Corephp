<div class="content">
    <div class="container-fluid">
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
                                            <td>' . clear($row["user_id"]) . '</td>
                                            <td>' . $row["user_name"] . '</td>
                                            <td>' . clear($row["email"]) . '</td>
                                            <td>' . clear($row["krediti"]) . '</td>
                                       
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
    });
</script>