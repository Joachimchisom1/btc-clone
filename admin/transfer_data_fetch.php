<?php

//fetch.php
include('../includes/db.php');

$column = array("id", "date", "transaction_id", "amount", "wallet", "detail", "username", "post_balance", "type");

$query = "SELECT * FROM transactions ";

if (isset($_POST["search"]["value"])) {
    $query .= '
 WHERE date LIKE "%' . $_POST["search"]["value"] . '%" 
 OR transaction_id LIKE "%' . $_POST["search"]["value"] . '%" 
 OR amount LIKE "%' . $_POST["search"]["value"] . '%" 
 OR wallet LIKE "%' . $_POST["search"]["value"] . '%" 
 OR detail LIKE "%' . $_POST["search"]["value"] . '%" 
 OR username LIKE "%' . $_POST["search"]["value"] . '%" 
 OR post_balance LIKE "%' . $_POST["search"]["value"] . '%" 
 OR type LIKE "%' . $_POST["search"]["value"] . '%"
 ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id DESC ';
}
$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row['id'];
    $sub_array[] = $row['date'];
    $sub_array[] = $row['transaction_id'];
    $sub_array[] = $row['amount'];
    $sub_array[] = $row['wallet'];
    $sub_array[] = $row['detail'];
    $sub_array[] = $row['username'];
    $sub_array[] = $row['post_balance'];
    $sub_array[] = $row['type'];
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM transactions";
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
