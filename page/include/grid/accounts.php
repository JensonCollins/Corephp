<?php

// storing  request (ie, get/post) global array to a variable
$requestData = $_REQUEST;

// echo "string"; $requestData;
// Type	Country	Information	Reseller	Price	Buy

$columns = array(

	// datatable column index  => database column name	
	0 => 'type',
	1 => 'filter_var',
	2 => 'filter_seller'
);

// /////////ADDED by Sumon511
$requestData['order'][0]['column'] = (int)$requestData['order'][0]['column'];

if ($requestData['order'][0]['column'] < 0 || $requestData['order'][0]['column'] > 6) {
	die("Invalid order");
}

if ($requestData['order'][0]['dir'] != "asc") {
	$requestData['order'][0]['dir'] = "desc";
}

$requestData['start'] = (int)$requestData['start'];
$requestData['length'] = (int)$requestData['length'];
// ////////FINISH Sumon511

// getting total number records without any search
$sql_count = "SELECT item_id, type, country, info, user_name, price , date_added FROM `accounts`  WHERE `sold` = '0' AND `category` = '1' ";
$query_count = $db->query($sql_count) or die($db->error);
$totalData = $query_count->num_rows; //$res->num_rows
$totalFiltered = $totalData;

// //////////////////////////////////////////////////////////////////////////////

$sql = "SELECT item_id, type, country, info, user_name, price , date_added FROM `accounts`  WHERE `sold` = '0' AND `category` = '1' ";



// getting records as per search parameters
if (!empty($requestData['columns'][0]['search']['value'])) { //name
	$sql.= " AND type LIKE '" . clear($requestData['columns'][0]['search']['value']) . "%' ";
} // search type



// getting records as per search parameters
if (!empty($requestData['columns'][2]['search']['value'])) { //Seller id
    $user_name =  code('decrypt', clear($requestData['columns'][2]['search']['value']));
	$sql.= " AND `user_name` = '" .$user_name. "' ";
} // search id




$value_filter = clear($requestData['columns'][1]['search']['value']);

if ($value_filter == 1) {
	//Newst
	$order_by = '`date_added` DESC';

}elseif ($value_filter == 2) {
	//LOW PRICE
	$order_by = '`price` ASC';
}else{
	$order_by = 'RAND()';		
}





// Change  numer of resultats wher filter use

$query = $db->query($sql) or die($db->error);
$totalFiltered = $query->num_rows;

// adding length

$sql.= "  ORDER BY ".$order_by."  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";

// //////////////////////////////////////////////////////////////////////////////
//SELECT item_id, type, country, info, seller_id, price , date_added FROM `accounts` INNER JOIN `subscribe` ON `accounts`.`seller_id` = `subscribe`.user_id WHERE `subscribe`.`subscribe_end` >= CURDATE() AND `accounts`.`sold` = '0' AND `accounts`.`category` = '1' ORDER BY RAND() LIMIT 0 ,25

$query = $db->query($sql) or die($db->error);
$data = array();

while ($row = $query->fetch_assoc()) { // preparing an array
	$nestedData = array();

	// Type	Country	Information	  Reseller	Price	Buy	
		$nestedData[] = clear($row["type"]);		
		$nestedData[] = flag($row["country"]);
		$nestedData[] = clear($row["info"]);
		$nestedData[] = '<strong><a> <i class="ti-user"></i> ' . ($row["user_name"]) . '</a></strong>';	
		$nestedData[] = '<strong>' . ($row["price"]) . '';	
		$nestedData[] = '<center><button onclick="buy(\'' . ($row['item_id']) . '\',\'tools\')" class="btn btn-success btn-xs hide' .clear(($row['item_id'])) . '">Buy</button></center>';
		$data[] = $nestedData;	
}

$json_data = array(
	"draw" => intval(clear($requestData['draw'])) , // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
	"recordsTotal" => intval(clear($totalData)) , // total number of records
	"recordsFiltered" => intval(clear($totalFiltered)) , // total number of records after searching, if there is no searching then totalFiltered = totalData
	"data" => $data

	// total data array

);
echo json_encode($json_data); // send data as json format

?>