<?php

if (!empty($_POST['delete'])) {

    $item_id = clear($_POST['delete']);
    $sql = $db->query("DELETE FROM `accounts` WHERE `item_id` = '$item_id '") or die($db->error);

    if ($sql) {
        echo alert('<center>Deletet Successful</center>', 'success');
    } else {
        echo alert('<center>Sql Error</center>', 'danger');
    }

}


if (!empty($_POST['update'])) {

    $category = clear($_POST['category']);
    $info = clear($_POST['info']);
    $login = clear($_POST['login']);
    $pass = clear($_POST['pass']);
    $addinfo = clear($_POST['addinfo']);
    $price = clear($_POST['price']);

    $item_id = clear($_POST['update']);


    $sql = $db->query("UPDATE `accounts` SET `category`= '$category' ,`info`= '$info',`addinfo`= '$addinfo',`login`= '$login',`pass`= '$pass',`price`= '$price'  WHERE `item_id`= '$item_id'") or die($db->error);

    if ($sql) {
        echo alert('<center>Updated Successful</center>', 'success');
    } else {
        echo alert('<center>Sql Error</center>', 'danger');
    }

}


?>
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">UNSOLD</strong>
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
                                    ID
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
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    URL
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Price
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <!-- class="odd"  class="even" -->
                            <tbody>
                            <?php

                            $sql = $db->query("SELECT * FROM `accounts` WHERE `sold` = '0' ORDER BY `date_added` DESC") or die();
                            $i = 0;
                            while ($row = $sql->fetch_assoc()) {

                                $iplpl = $i++;

                                echo '<tr role="row" class=" ' . $iplpl . '">
                                                <form action="" method="post">
                                                    <td>' . $row["item_id"] . ' </td>
                                                    <td><input value="' . $row["category"] . '" name="category"> </td>
                                                    <td><input value="' . trim($row["info"]) . '" name="info"></td>
                                                    <td><input value="' . replace_kredencial($row["login"]) . '" name="login"></td>
                                                    <td><input value="' . replace_kredencial($row["pass"]) . '" name="pass"></td>
                                                    <td><input value="' . replace_kredencial($row["addinfo"]) . '" name="addinfo"></td>
                                                    <td>$<input value="' . clear($row["price"]) . '" name="price"></td>
                                                    <td>
                                                      <button type="submit" class="btn btn-success" name="update" value="' . clear($row["item_id"]) . '">Update</button> - 
                                                      <button type="submit" class="btn btn-danger" name="delete" value="' . clear($row["item_id"]) . '">DELETE</button>
                                                    </td>

                                                  </form>                                                   
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