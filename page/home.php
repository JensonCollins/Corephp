<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">

                <div class="card">
                    <div class="well alert-light" style="background-color: #ecf0f1;">
                        Hello <a class="label label-primary" href="profile">
                            <span style="    text-transform: capitalize;background: #2d3e50;  color: #fff;  padding-left: 5px;  padding-right: 5px;"><?php echo $user_name; ?></span>
                        </a><br>

                        If you have any <b>Question</b> ,<b>Problem</b>, <b>Suggestion</b> or <b>Request</b> Please feel
                        free to

                        <a class="label label-default" href="<?php echo base_url(); ?>tickets/new">
                            <span class="glyphicon glyphicon-pencil"></span>
                            <strong> Open a Ticket</strong>
                        </a>
                        <br>
                        if you want to report an order , just go to
                        <abbr>Purchased
                            <span class="fa fa-shopping-cart"></span>
                        </abbr>
                        then click on
                        <a class="label label-primary" style="background-color: #2c3e50; color: #fff">Report #ID</a>
                        button<br><br> Our Domains are <b>Vpox.ru</b> - Please Save them!

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="card-title mb-0"><i class="fa fa-info-circle"></i> News</h4>
                                <div class="small text-muted"></div>
                            </div>
                        </div>
                        <!--/.row-->
                        <div class="chart-wrapper mt-4">
                            <?php

                            $type = $db->query("SELECT * FROM `news` order by `date` ASC") or die($db->error);
                            while ($row = $type->fetch_assoc()) {

                                echo '<div class="detail-info">
                                           <strong class="text-muted">' . $row['date'] . '</strong>
                                           <p class="message">' . $row['content'] . '</p>
                                        </div>
                                        <hr>
                                   ';

                            }

                            ?>

                        </div>

                    </div>

                </div>
            </div>


            <div class="col-md-6">

                <!--<div class="card" style="margin-top: 0px;">
                <div class="card-body">

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages': ['corechart']});
                        google.charts.setOnLoadCallback(drawChart2);

                        function drawChart2() {
                            var data = google.visualization.arrayToDataTable([
                                ['Tools', 'Number'],
                                ['SMTP IP',  <?php /*echo unsold_tools('1'); */ ?>],
                                ['SMTP Domain',     <?php /*echo unsold_tools('2'); */ ?>],
                                ['Mailer',     <?php /*echo unsold_tools('3'); */ ?>]]);

                            var options = {
                                title: 'Available Tools',
                                titleTextStyle: {color: '#2D3E50'},
                                backgroundColor: 'transparent',

                                legend: 'right',
                                chartArea: {'width': '100px', 'height': '80%'},

                                pieSliceText: 'label',
                                pieHole: 0.4,
                                colors: ['#476481', '#3e5871', '#354b60']

                            };

                            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                            chart.draw(data, options);
                        }
                    </script>
                    <style type="text/css">
                        div.google-visualization-tooltip {
                            pointer-events: none
                        }

                        svg > g > g:last-child {
                            pointer-events: none
                        }
                    </style>

                    // <div id="chart_div" style="width: 450px; height: 200px;"></div>
                    <div id="donutchart" style="width: 300px; height: 160px;">

                    </div>

                </div>
            </div>-->

                <div class="card">
                    <div class="card-body">
                        <div class="well">
                            <h4><b>Our Support team is here !</b></h4>

                            <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>support">
                                <i class="fa  fa-pencil"></i>&nbsp; Open a Ticket
                            </a>
                            <br><br>

                            <h5><b>Available Payment Methods </b></h5><br>
                            <div class="row">
                                <div class="col-md-12 m-auto">
                                    <div class="m-auto">
                                        <a href="<?php echo base_url(); ?>balance">
                                            <img src="https://www.olux.io/files/img/pmlogo2.png" width="19%"
                                                 alt="PerfectMoney">
                                        </a>
                                        <a href="<?php echo base_url(); ?>balance">
                                            <img src="https://www.olux.io/files/img/btclogo.png" width="19%"
                                                 alt="Bitcoin">
                                        </a>
                                        <a href="<?php echo base_url(); ?>balance">
                                            <img src="https://www.olux.io/files/img/ethlogo.png" width="19%"
                                                 alt="Bitcoin">
                                        </a>
                                        <a href="<?php echo base_url(); ?>balance">
                                            <img src="https://www.olux.io/files/img/ltclogo2.png" width="19%"
                                                 alt="Bitcoin">
                                        </a>
                                        <a href="<?php echo base_url(); ?>balance">
                                            <img src="https://www.olux.io/files/img/bchlogo.png" width="19%"
                                                 alt="Bitcoin">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- .content -->