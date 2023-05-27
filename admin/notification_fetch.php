<?php

//fetch.php
include('../includes/db.php');

$column = array("user_id", "transfer_acess_code", "activation_access_code", "security_acess_code", "wire_authorization_acess_code", "tax_clearance_acess_code");

$query = "SELECT * FROM notfications";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE user_id LIKE "%'.$_POST["search"]["value"].'%" 
 OR title LIKE "%'.$_POST["search"]["value"].'%" 
 OR mssg LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['user_id'];
 $sub_array[] = $row['title'];
 $sub_array[] = $row['mssg'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM notfications";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>