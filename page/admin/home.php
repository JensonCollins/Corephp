<?php

  $date = db_CURDATE();
         
  function payments($date){
          global $db;

              $payments_btc_sql = $db->query("SELECT SUM(amount) AS `payments_btc` FROM `transaction`  WHERE `date` LIKE '%$date%'"); 
              $payments_btc = $payments_btc_sql->fetch_assoc();

              return $payments_btc['payments_btc'] *1;

      }


       function reg_teday($date){

           global $db;
        
          $reg_teday =  $db->query("SELECT `user_id` FROM `members` WHERE `active`= 1 AND `dt` LIKE '%$date%'"); 
          return $reg_teday->num_rows; 


         }


         function reseller(){
          global $db;
          $reseller_res = $db->query("SELECT `user_id` FROM `members` WHERE `active`= 1 AND  `reseller` = 1 AND  `reseller_active` = 1"); 
          return $reseller_res->num_rows; 

         }

         function total_users(){
          global $db;
          $all_users = $db->query("SELECT `user_id` FROM `members` WHERE `active`= 1"); 
          return $all_users->num_rows; 

         }




function sales_accounts(){

      global $db;

         $item_sql = $db->query("SELECT SUM(price) AS `item_sum` FROM `accounts` WHERE `sold`= 1 AND `cashed_out` = 0"); 
         $item = $item_sql->fetch_assoc();
         $item_sum = $item['item_sum'];

   return ($item_sum);

}



         // gjen sa $ jan ber sipas dates
function item_amount_tools($date){
   global $db;

    $item_sql = $db->query("SELECT SUM(price) AS `item_sum` FROM `accounts` WHERE `sold`= 1 AND  `date_purchased` LIKE '%$date%'"); 
    $item = $item_sql->fetch_assoc();

    return $item['item_sum'] *1;
}



$pergindja = 0.50;
//Active Sales
$item_sales = sales_accounts() * $pergindja;

?>

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
                            <li><a href="#">Rules</a></li>                            
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
                                <strong class="card-title">Stats ~ <?php echo $date; ?> ~</strong>
                            </div>
                            <div class="card-body">



                            	<div class="content mt-3">

							            <div class="col-xl-3 col-lg-6">
							                <div class="card">
							                    <div class="card-body">
							                        <div class="stat-widget-one">
							                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
							                            <div class="stat-content dib">
							                                <div class="stat-text">Payments Today</div>
							                                <div class="stat-digit"><?php echo payments($date); ?> $</div>
							                            </div>
							                        </div>
							                    </div>
							                </div>
							            </div>


							            <div class="col-xl-3 col-lg-6">
							                <div class="card">
							                    <div class="card-body">
							                        <div class="stat-widget-one">
							                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
							                            <div class="stat-content dib">
							                                <div class="stat-text">Users Register Today</div>
							                                <div class="stat-digit"><?php echo reg_teday($date);?></div>
							                            </div>
							                        </div>
							                    </div>
							                </div>
							            </div>

							            <div class="col-xl-3 col-lg-6">
							                <div class="card">
							                    <div class="card-body">
							                        <div class="stat-widget-one">
							                            <div class="stat-icon dib"><i class="ti-user text-warning border-warning"></i></div>
							                            <div class="stat-content dib">
							                                <div class="stat-text">Users Total</div>
							                                <div class="stat-digit"><?php echo total_users();?></div>
							                            </div>
							                        </div>
							                    </div>
							                </div>
							            </div>

							              <div class="col-xl-3 col-lg-6">
							                <div class="card">
							                    <div class="card-body">
							                        <div class="stat-widget-one">
							                            <div class="stat-icon dib"><i class="ti-money text-warning border-warning"></i></div>
							                            <div class="stat-content dib">
							                                <div class="stat-text">Total Users Balance</div>
							                                <div class="stat-digit">
							                                	<?php 

									                                    $krediti = $db->query("SELECT SUM(`krediti`) FROM members WHERE `active`= 1"); 
									                                    $totla_kredit = $krediti->fetch_array();  

									                                    echo $totla_kredit[0];                                  

									                            ?>$
							                                </div>
							                            </div>
							                        </div>
							                    </div>
							                </div>
							            </div>
							     </div>  
                           </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->







