<?php
include_once "../includes/db.php";

if (isset($_POST['id'])) { 
	$id = $_POST['id']; 
}
	$sqlQuery = "SELECT * FROM investors WHERE id = $id";  
    $result = mysqli_query($connection, $sqlQuery); 

$paginationHtml = '';
while ($row = mysqli_fetch_assoc($result)) { 
	$paginationHtml.='<form id="team_Form" enctype="multipart/form-data">
	<input hidden name="id" type="text" value="'.$row["id"].'">
	<div class="form-group">
		<label for="fullname" class="col-form-label">ACCOUNT NAME:</label>
		<input value="'.$row["fullname"].'" name="fullname" type="text" class="form-control" id="fullname">
	</div>
	<div class="form-group">
		<label for="date" class="col-form-label">REG DATE:</label>
		<input value="'. date('Y-m-d', strtotime($row["date"])). '" name="date" type="date" class="form-control" id="date">
	</div>
	<div class="form-group">
		<label for="deposit_w" class="col-form-label">Active Total Balance:</label>
		<input value="'.$row["deposit_w"].'" name="deposit_w" type="text" class="form-control" id="deposit_w">
	</div>
	<div class="form-group">
		<label for="interest_w" class="col-form-label">Available Withdrawal:</label>
		<small>Do not add comma. e.g (For $10,000.00 enter as 10000)</small>
		<input value="'.$row["interest_w"].'" name="interest_w" type="number" class="form-control" id="interest_w">
	</div>
	<div class="form-group">
		<label for="total_invest" class="col-form-label">user TOTAL INVEST:</label>
		<input value="'.$row["total_invest"]. '" name="total_invest" type="text" class="form-control" id="total_invest">
	</div>
	<div class="form-group">
		<label for="total_deposit" class="col-form-label">User Total Deposit:</label>
		<input value="'.$row["total_deposit"]. '" name="total_deposit" type="text" class="form-control" id="email">
	</div>
	<div class="form-group">
		<label for="total_w" class="col-form-label">User Total Withdraw:</label>
		<input value="'.$row["total_w"]. '" type="total_w" name="total_w" class="form-control" id="total_w">
	</div>
	<div class="form-group">
		<label for="referral_e" class="col-form-label">User Referral Earnings:</label>
		<input value="'.$row["referral_e"]. '" name="referral_e" type="text" class="form-control" id="referral_e">
	</div>
	<div class="form-group">
		<label for="username" class="col-form-label">USENAME:</label>
		<input value="'.$row["username"]. '" name="username" type="text" class="form-control" id="username">
	</div>
	<div class="form-group">
		<label for="password" class="col-form-label">PASSWORD:</label>
		<input value="'.$row["password"]. '" name="password" type="text" class="form-control" id="password">
	</div>
	<div class="form-group">
		<label for="email" class="col-form-label">EMAIL:</label>
		<input value="'.$row["email"]. '" name="email" type="text" class="form-control" id="email">
	</div>
	<div class="form-group">
		<label for="address" class="col-form-label">ADDRESS:</label>
		<textarea id="address" placeholder="Enter Home Address"  name="address" class="form-control" id="address">' . $row["address"] . '</textarea>
	</div>
	<div class="form-group">
		<label for="country" class="col-form-label">COUUNTRY:</label>
		<input value="' . $row["country"] . '" name="country" type="text" class="form-control" id="country">
	</div>
	<div class="form-group">
		<label for="country" class="col-form-label">WITHDRAWAL CODE:</label>
		<small>leave empty if you dont want user to see withdraw code</small>
		<input value="' . $row["w_code"] . '" name="w_code" type="text" class="form-control" id="w_code">
	</div>
	<div class="form-group">
		<label for="phone" class="col-form-label">PHONE:</label>
		<input value="' . $row["phone"] . '" name="phone" type="text" class="form-control" id="phone">
	</div>
	<div class="form-group">
		<label for="wallet_address" class="col-form-label">COIN WITHDRAWAL ADDRESS:</label>
		<input value="' . $row["wallet_address"] . '" name="wallet_address" type="text" class="form-control" id="phone">
	</div>
	<div class="form-group">
		<label for="address_type" class="col-form-label">COIN WITHDRAWAL ADDRESS TYPE:</label>
		<select name="address_type">'; 
		if ($row["address_type"] == "BTC") { $paginationHtml.='<option selected value="BTC">BTC</option>'; }
		else{$paginationHtml.='<option value="BTC">BTC</option>';}
		if ($row["address_type"] == "USDT") { $paginationHtml.='<option selected value="USDT">USDT</option>'; }
		else{$paginationHtml.='<option value="USDT">USDT</option>';}
		if ($row["address_type"] == "LTC") { $paginationHtml.='<option selected value="LTC">LTC</option>'; }
		else{$paginationHtml.='<option value="LTC">LTC</option>';}
		if ($row["address_type"] == "ETH") { $paginationHtml.='<option selected value="ETH">ETH</option>'; }
		else{$paginationHtml.='<option value="ETH">ETH</option>';}
		$paginationHtml.='
		</select>
	</div>
	<div class="form-group">
		<label for="2fa_switch" class="col-form-label">2FA AUTH SWITCH:</label>
		<select name="2fa_switch">'; 
		if ($row["2fa_switch"] == "1") { $paginationHtml.='<option selected value="1">ON</option>'; }
		else{$paginationHtml.='<option value="1">ON</option>';}
		if ($row["2fa_switch"] == "0") { $paginationHtml.='<option selected value="0">OFF</option>'; }
		else{$paginationHtml.='<option value="0">OFF</option>';}
		$paginationHtml.='
		</select>
	</div>
	<div class="form-group">
		<label for="kyc_typ" class="col-form-label">KYC TYPE:</label>
		<select name="kyc_typ">'; 
		if ($row["kyc_typ"] == "National ID") { $paginationHtml.= '<option selected value="National ID">National ID</option>'; }
		else{$paginationHtml.= '<option value="National ID">National ID</option>';}
		if ($row["kyc_typ"] == "Driver License") { $paginationHtml.= '<option selected value="Driver License">Driver License</option>'; }
		else{$paginationHtml.='<option value="Driver License">Driver License</option>';}
		if ($row["kyc_typ"] == "Voter`s Card") { $paginationHtml.='<option selected value="Voter`s Card">Voter`s Card</option>'; }
		else{$paginationHtml.='<option value="Voter`s Card">Voter`s Card</option>';}
		if ($row["kyc_typ"] == "IBTCertificate") { $paginationHtml.= '<option selected value="IBTCertificate">IBTCertificate</option>'; }
		else{$paginationHtml.='<option value="IBTCertificate">IBTCertificate</option>';}
		 $paginationHtml.= '
		</select>
	</div>
	<div class="form-group">
		<label for="kyc_status" class="col-form-label">KYC STATUS:</label>
		<select name="kyc_status">';
		if ($row["kyc_status"] == "Confirmed") { $paginationHtml.= '<option selected value="Confirmed">Confirmed</option>'; }
		else{$paginationHtml.= '<option value="Confirmed">Confirmed</option>';}
		if ($row["kyc_status"] != "Confirmed") { $paginationHtml.= '<option selected value="notConfirmed">notConfirmed</option>'; }
		else{$paginationHtml.= '<option value="notConfirmed">notConfirmed</option>';}
		$paginationHtml.='
		</select>
	</div>
	<div class="form-group">
	<label for="img" class="col-form-label">Customer Passport:</label>
	<div id="img1"><img width="100" height="50" src="../img/'.$row["img"].'" alt=""></td></div>
		<input accept="image/*" id="img" type="file" name="uimg">
	</div>
	<!-- Progress bar -->
	<div hidden id="team_prog1" class="progress">
		<div class="progress-bar"></div>
	</div>
	<div hidden class="status"></div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="submit" value="UPDATE">
	</div>
</form>';
} 
$jsonData = array(
	"html"	=> $paginationHtml,	
);
echo json_encode($jsonData);