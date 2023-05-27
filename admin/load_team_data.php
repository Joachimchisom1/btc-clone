<?php
include_once "../includes/db.php";
$perPage = 4;
$page = 0;
if (isset($_POST['page'])) {
	$page  = $_POST['page'];
} else {
	$page = 1;
};

$startFrom = ($page - 1) * $perPage;
if (isset($_POST['search'])) {
	$search  = $_POST['search'];
	if (empty($search) || $search == "" || $search == null) {
		$sqlQuery = "SELECT * FROM investors ORDER BY id ASC LIMIT $startFrom, $perPage";
		$result = mysqli_query($connection, $sqlQuery);
	} else {
		$sqlQuery = "SELECT * FROM investors WHERE id LIKE '%$search%' 
	OR fullname LIKE '%$search%' OR date LIKE '%$search%' 
	OR last_seen LIKE '%$search%' OR deposit_w LIKE '%$search%'
	OR interest_w LIKE '%$search%' OR total_invest LIKE '%$search%' 
	OR total_deposit LIKE '%$search%' OR total_w LIKE '%$search%' 
	OR username LIKE '%$search%' OR email LIKE '%$search%' 
	OR address LIKE '%$search%' OR country LIKE '%$search%'
	OR phone LIKE '%$search%' OR kyc_status LIKE '%$search%'
    OR 	kyc_typ LIKE '%$search%'
	ORDER BY id ASC LIMIT $startFrom, $perPage";
		$result  = mysqli_query($connection, $sqlQuery);
	}
} else {
	$sqlQuery = "SELECT * FROM investors ORDER BY id ASC LIMIT $startFrom, $perPage";
	$result = mysqli_query($connection, $sqlQuery);
}

$return_arr = array();

// $query = "SELECT * FROM users ORDER BY id";

// $result = mysqli_query($con,$query);

while ($row = mysqli_fetch_array($result)) {
	$id = $row['id'];
	$fullname = $row['fullname'];
	$date = $row['date'];
	$last_seen = $row['last_seen'];
	$last_seen_anouncement = $row['last_seen_anouncement'];
	$deposit_w = $row['deposit_w'];
	$interest_w = $row['interest_w'];
	$total_invest = $row['total_invest'];
	$total_deposit = $row['total_deposit'];
	$total_w = $row['total_w'];
	$referral_e = $row['referral_e'];
	$username = $row['username'];
	$password = $row['password'];
	$email = $row['email'];
	$address = $row['address'];
	$country = $row['country'];
	$img = $row['img'];
	$referrel_url = $row['referrel_url'];
	$referred_by = $row['referred_by'];
	$phone = $row['phone'];
	$w_code = $row['w_code'];
	$address_type = $row['address_type'];
	$wallet_address = $row['wallet_address'];
	$auth_switch = $row['2fa_switch'];
	$kyc_file = $row['kyc_file'];
	$kyc_typ = $row['kyc_typ'];
	$kyc_status = $row['kyc_status'];
	$return_arr[] = array(
		"id" => $id,
		"fullname" => $fullname,
		"date" => $date,
		"last_seen" => $last_seen,
		"last_seen_anouncement" => $last_seen_anouncement,
		"deposit_w" => $deposit_w,
		"interest_w" => $interest_w,
		"total_invest" => $total_invest,
		"total_deposit" => $total_deposit,
		"total_w" => $total_w,
		"referral_e" => $referral_e,
		"username" => $username,
		"password" => $password,
		"email" => $email,
		"address" => $address,
		"country" => $country,
		"img" => $img,
		"referrel_url" => $referrel_url,
		"referred_by" => $referred_by,
		"phone" => $phone,
		"w_code" => $w_code,
		"address_type" => $address_type,
		"wallet_address" => $wallet_address,
		"auth_switch" => $auth_switch,
		"kyc_file" => $kyc_file,
		"kyc_typ" => $kyc_typ,
		"kyc_status" => $kyc_status,
		// "referrel_url" => $referrel_url,
		// "referred_by" => $referred_by
	);
}

// Encoding array in JSON format
echo json_encode($return_arr);