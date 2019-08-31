<?php

if (isset($_POST['add'])) {
    //Array ( [price] => 5 [category] => 2 [value] => sadasdas|sadas|sdaa|asdasda [add] => )
    $price = clear($_POST['price']);
    $category = clear($_POST['category']);
    $country = clear($_POST['country']);
    $country_name = $country_array[$country];
    $info = "";

    if ($price < 0.9) {
        echo alert('<center><strong>Limit for the price is 1$</strong></center>', 'warning');
        die('<meta http-equiv="refresh" content="3;" />');
    }


    if (empty($price) || empty($category)) {
        echo alert('Please go back and make sure you enter the required parameters!');
        die('<meta http-equiv="refresh" content="2;" />');
    }

    if ($category == "4") {

        $version = clear($_POST['windows_versions']);
        $ram = clear($_POST['ram']);
        $username = clear($_POST['username']);
        $userpass = clear($_POST['userpass']);
        $detected_hosting = clear($_POST['detected_hosting']);

        $info = json_encode(array('version' => $version, 'ram' => $ram, 'username' => $username, 'userpass' => $userpass, 'detected_hosting' => $detected_hosting), JSON_FORCE_OBJECT);

    } else if ($category == "5") {
        $ssh_info = clear($_POST['ssh_info']);
        $ssh_ram = clear($_POST['ssh_ram']);
        $ssh_whm = clear($_POST['ssh_whm']);
        $ssh_detected_hosting = clear($_POST['ssh_detected_hosting']);
        $info = json_encode(array('ssh_info' => $ssh_info, 'ssh_ram' => $ssh_ram, 'ssh_whm' => $ssh_whm, 'ssh_detected_hosting' => $ssh_detected_hosting), JSON_FORCE_OBJECT);
    } else if ($category == "6") {
        $cpanel_tld = clear($_POST['cpanel_tld']);
        $cpanel_ssl = clear($_POST['cpanel_ssl']);
        $cpanel_detected_hosting = clear($_POST['cpanel_detected_hosting']);
        $info = json_encode(array('cpanel_tld' => $cpanel_tld, 'cpanel_ssl' => $cpanel_ssl, 'cpanel_detected_hosting' => $cpanel_detected_hosting), JSON_FORCE_OBJECT);
    } else if ($category == "7") {
        $shell_tld = clear($_POST['shell_tld']);
        $shell_ssl = clear($_POST['shell_ssl']);
        $shell_server_info = clear($_POST['shell_server_info']);
        $shell_server_os = clear($_POST['shell_server_os']);
        $shell_detected_hosting = clear($_POST['shell_detected_hosting']);
        $info = json_encode(array('shell_tld' => $shell_tld, 'shell_ssl' => $shell_ssl, 'shell_server_info' => $shell_server_info, 'shell_server_os' => $shell_server_os, 'shell_detected_hosting' => $shell_detected_hosting), JSON_FORCE_OBJECT);
    } else if ($category == "8") {
        $mailer_server_info = clear($_POST['mailer_server_info']);
        $info = json_encode(array('mailer_server_info' => $mailer_server_info), JSON_FORCE_OBJECT);
    } else if ($category == "9") {
        $smtp_webmail = clear($_POST['smtp_webmail']);
        $smtp_server_info = clear($_POST['smtp_server_info']);
        $smtp_username = clear($_POST['smtp_username']);
        $smtp_userpass = clear($_POST['smtp_userpass']);
        $info = json_encode(array('smtp_webmail' => $smtp_webmail, 'smtp_server_inf' => $smtp_server_info, 'smtp_username' => $smtp_username, 'smtp_userpass' => $smtp_userpass), JSON_FORCE_OBJECT);
    } else {
        $basefile = htmlspecialchars($_POST['value']);
        $text = trim($basefile);
        $textAr = explode("\n", $text);
        $textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind


        foreach ($textAr as $line) {
            $details = explode(',', $line);

            foreach ($details as &$value) {
                $value = clear($value);
                if ($value == "") {
                    $value = "NONE";
                }
            }

            unset($value);


            $details[0] = $db->real_escape_string($details[0]);
            $details[1] = $db->real_escape_string($details[1]);
            $details[2] = $db->real_escape_string($details[2]);

            if (!empty($details[0]) && !empty($details[1]) && !empty($details[2])) {

                $sqlz = $db->query("SELECT * FROM `accounts` WHERE `addinfo` = '$details[0]' AND `login` = '$details[1]' AND `pass`= '$details[2]'") or die('error #accaunt ');

                if ($db->affected_rows >= 1) {
                    $invalid++;
                } else {

                    if ($category == 3) {
                        // Url ,descript ,amount
                        $db->query("INSERT INTO `accounts` (`country_name`,`category`,`price`, `addinfo`, `info` ,`login`, `date_added`) 
                                             VALUES ('$country','$category', '$price', '$details[0]', '$details[1]', '$details[2]',NOW())") or die ($db->error);
                        $inserted++;

                    } else {

                        $db->query("INSERT INTO `accounts` (`category`,`price`, `addinfo`, `login`, `pass`, `date_added`) VALUES ('$category', '$price', '$details[0]', '$details[1]', '$details[2]',NOW())") or die ($db->error);
                        $inserted++;
                    }

                }

                // nese nuk jan boshe
            } else {

                echo alert('Please use the format!');
                // die('<meta http-equiv="refresh" content="2;" />');

            }


            $totaladded++;// numri i eshte hedhur

        }

        $report = 'Done! <br>Total: ' . $totaladded * 1 . ' |  Total Duplicated: ' . $invalid * 1 . '|  Inserted: ' . $inserted * 1;
        echo alert($report, 'success');
    }

    if($category!="1" && $category!="2" && $category!="3") {
        $sqlz = $db->query("SELECT * FROM accounts where info='$info'") or die('error #account');

        if($db->affected_rows >= 1) {
            $invalid++;
        } else {
            $db->query("INSERT INTO accounts (category, country,country_name, details, price, date_added) values ('$category','$country','$country_name', '$info','$price', now())");
            $inserted ++;
        }
    }

}

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><strong class="card-title">Add Multiple</strong></h3>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="">
                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Price in $:</h5>
                                            <input type="number" name="price" class="form-control" id="recipient-name" number="true"
                                                   value="5"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <h5>Country</h5>
                                            <select class="selectpicker form-control" data-size="7" data-style="btn btn-primary btn-round" name="country">
                                                <?php
                                                    foreach($country_array as $key => $value) {
                                                        echo "<option value='$key'>$value</option>";
                                                ?>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <?php
                                        $categories = $db->query("select * from category where visible=1;");
                                        ?>

                                        <div class="form-group">
                                            <h5>Category</h5>
                                            <select class="selectpicker form-control" data-size="7" data-style="btn btn-primary btn-round" id="category" name="category" required>
                                                <option value="">-Select-</option>
                                                <?php
                                                while ($row = $categories->fetch_assoc()) {
                                                    echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>


                                    </div>

                                    <div class="col-md-8" id="content_edit">
                                        <h4>- Please select Category -</h4>
                                    </div>

                                </div>

                                <div class="form-group" id="adding1">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                <button class="btn btn-info" type="submit" name="add">Add</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<script src="<?php echo base_url(); ?>assets/custom/js/admin_add.js"></script>