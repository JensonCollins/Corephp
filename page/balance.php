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
                            <li><a href="#">Add Funds</a></li>                            
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
                                <strong class="card-title">Add Funds</strong>
                            </div>
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
								                          <img src="<?php echo base_url();?>assets/images/btc.png" width="150px">
								                        <hr>
								                      <h3>$5.00 / minimum</h3><br>    </center>	                    
								                       <form method="POST" action="btc">
								                            <input type="number" name="amount" style="width: 70%;float: left;    padding: 5px;" min="5"> 
								                            <input type="hidden"  name="btc">      
								                        <button type="submite" class="btn btn-warning" style="width: 30%;float: left;">PAY</button>
								                     </form>
								                     </div>
								                  </div>
								               </div>

								   
								               
								                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								                  <div class="panel no-border">
								                     <div class="panel-body milky-white-bg center-text">
								                        
								                    <center>
								                          <h3>PerfectMoney</h3>  <br>
								                       		<img src="<?php echo base_url();?>assets/images/pm.png" width="150px">
								                        <hr>								                        
								                        <h3>$5.00 / minimum</h3> <br>
								                    </center>	


								                        <form method="POST" action="pm" >
								                        <input type="number" name="amount" style="width: 70%;float: left;    padding: 5px;" min="5"> 
								                        <input  type="hidden" name="pm">                        
								                        <button type="submite" class="btn btn-danger" style="width: 30%;float: left;">PAY</button>
								                     </form>
								                     </div>
								                  </div>
								               </div>
								             
								               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								                 
								               </div>
								            </div>

                                <?php

                                    }else{ }

                                ?>
                           </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
