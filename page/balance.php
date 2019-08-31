<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header ">
                    <h3 class="card-title">
                        Add Funds
                    </h3>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <?php if (empty($_POST)) { ?>

                                    <div class="row gutter">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="panel no-border">
                                                <div class="panel-body milky-white-bg center-text">
                                                    <center>
                                                        <h3>Bitcoin</h3> <br>
                                                        <img src="<?php echo base_url(); ?>assets/img/btc.png"
                                                             width="150px">
                                                        <hr>
                                                        <h3>$5.00 / minimum</h3><br></center>
                                                    <form method="POST" action="btc">
                                                        <input type="hidden" name="btc">
                                                        <div class="row">
                                                            <div class="col-lg-8">
                                                                <input type="number" name="amount" class="form-control" min="5">
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <button type="submit" class="btn btn-warning">PAY
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="panel no-border">
                                                <div class="panel-body milky-white-bg center-text">
                                                    <center>
                                                        <h3>PerfectMoney</h3>  <br>
                                                        <img src="<?php echo base_url(); ?>assets/img/pm.png"
                                                             width="150px">
                                                        <hr>
                                                        <h3>$5.00 / minimum</h3> <br>
                                                    </center>
                                                    <form method="POST" action="pm">
                                                        <input type="hidden" name="pm">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <input type="number" class="form-control" name="amount"
                                                                       min="5">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button type="submit" class="btn btn-danger">PAY
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                                        </div>
                                    </div>

                                    <?php

                                } else {
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>