<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">SOLD</strong>
                    </div>
                    <div class="card-body">
                        <?php
                        function replace_kredencial($data)
                        {

                            $vija = "\\\\";

                            $cha = trim($vija);
                            $cha2 = trim('\ ');

                            return str_replace($cha, $cha2, $data);
                        }

                        ?>
                        <table id="bootstrap-data-table-export"
                               class="table table-striped table-bordered dataTable no-footer" role="grid"
                               aria-describedby="datatable_info" style="width: 100%;">
                            <thead>
                            <tr role="row">
                                <th class="no-sort" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    No
                                </th>
                                <th class="no-sort" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Type
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Info
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Login
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Pass
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">URL
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Price
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Buyer
                                </th>
                            </tr>
                            </thead>
                            <!-- class="odd"  class="even" -->
                            <tbody>
                            <?php

                            $sql = $db->query("SELECT * FROM `accounts` WHERE `sold` = '1' ORDER BY `date_purchased` DESC") or die();
                            $i = 0;
                            while ($row = $sql->fetch_assoc()) {

                                $iplpl = $i++;

                                echo '<tr role="row" class=" ' . $iplpl . '">
                                                    <td>' . $i . '</td>
                                                    <td class="sorting_1" >' . $row["category"] . '</td>
                                                    <td>' . trim($row["info"]) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($row["login"]) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($row["pass"]) . '</td>
                                                    <td contenteditable="true" onClick="select();">' . replace_kredencial($row["addinfo"]) . '</td>                                                   
                                                    <td>$' . clear($row["price"]) . '</td>
                                                    <td>' . clear($row["buyer"]) . '</td>                                                   
                                                                                                   
                                              </tr>';

                            }//AND while
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