<?php 
include_once "../includes/db.php";
include_once "includes/function.php";
$upload = 'err'; 
 
//publications update fuction----------------------------------------
if(isset($_FILES['images'])){ 
    $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    // File upload configuration 
    $targetDir = "../img/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
    $fileName = basename($_FILES['images']['name']); 
    $targetFilePath = $targetDir.$fileName; 
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        if(move_uploaded_file($_FILES['images']['tmp_name'], $targetFilePath)){ 
            $upload = 'ok'; 
        } 
    }
    if (empty($_FILES['images']['name'])) {
        $query = "SELECT * FROM publications WHERE id = $id";
        $select_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_image)) {
            $fileName = $row['img'];
        }
        $upload = 'ok'; 
    }
    $query = "UPDATE publications SET ";
    $query .= "title = '{$title}', ";
    $query .= "description = '{$description}', ";
    $query .= "img = '{$fileName}' ";
    $query .= "WHERE id = {$id} ";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);
} 
//publications update fuction ends----------------------------------------


///publication inser fuction-------------------------------------------------
if(isset($_FILES['images1'])){ 
    // File upload configuration 
    $targetDir = "../img/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
    $fileName = basename($_FILES['images1']['name']); 
    $targetFilePath = $targetDir.$fileName; 
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        
        if(move_uploaded_file($_FILES['images1']['tmp_name'], $targetFilePath)){ 
            $upload = 'ok'; 
        } 
    }
   $description2 = $_POST['description2'];
   $title2 = $_POST['title2'];
    $query = "INSERT INTO publications (title,description,img) ";
    $query .="VALUES('{$title2}','{$description2}','{$fileName}') ";
 $insert_pub = mysqli_query($connection, $query);
    ConfirmQuery($insert_pub);
} 
///publication inser fuction end-------------------------------------------------




////evnt tbale update fuction-------------------------------------------
if(isset($_FILES['eimages'])){ 
    
    $id = $_POST['id'];
    // File upload configuration 
    $targetDir = "../img/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
    $fileName = basename($_FILES['eimages']['name']); 
    $targetFilePath = $targetDir.$fileName; 
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        if(move_uploaded_file($_FILES['eimages']['tmp_name'], $targetFilePath)){ 
            $upload = 'ok'; 
        } 
    }
    $event_title = $_POST['title'];
    $event_date = $_POST['date'];
    $event_time = $_POST['time'];
    $event_location = $_POST['location'];
    $event_description = $_POST['description'];
    if (empty($_FILES['eimages']['name'])) {
        $query = "SELECT * FROM events WHERE id = $id";
        $select_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_image)) {
            $fileName = $row['img'];
        }
        $upload = 'ok'; 
    }
    $query = "UPDATE events SET ";
    $query .= "title = '{$event_title}', ";
    $query .= "date = '{$event_date}', ";
    $query .= "time = '{$event_time}', ";
    $query .= "location = '{$event_location}', ";
    $query .= "description = '{$event_description}', ";
    $query .= "img = '{$fileName}' ";
    $query .= "WHERE id = {$id} ";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);
} 
///evnt tbale update fuction ends------------------------------------------



///event insert fuction-------------------------------------------------
if(isset($_FILES['ievtimages'])){ 
    // File upload configuration 
    $targetDir = "../img/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
    $fileName = basename($_FILES['ievtimages']['name']); 
    $targetFilePath = $targetDir.$fileName; 
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        
        if(move_uploaded_file($_FILES['ievtimages']['tmp_name'], $targetFilePath)){ 
            $upload = 'ok'; 
        } 
    }
    $ievent_title = $_POST['ievent_title'];
    $ievent_date = $_POST['ievent_date'];
    $ievent_time = $_POST['ievent_time'];
    $ievent_location = $_POST['ievent_location'];
    $ievent_description = $_POST['ievent_description'];
    $query = "INSERT INTO events (title,date,time,location,description,img) ";
    $query .="VALUES('{$ievent_title}','{$ievent_date}','{$ievent_time}','{$ievent_location}','{$ievent_description}','{$fileName}') ";
 $insert_pub = mysqli_query($connection, $query);
    ConfirmQuery($insert_pub);
} 
///evnt insert fuction end-------------------------------------------------



////gallery update fuction-------------------------------------------
if(isset($_FILES['gimages'])){ 
    
    $id = $_POST['id'];
    // File upload configuration 
    $targetDir = "../img/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
    $fileName = basename($_FILES['gimages']['name']); 
    $targetFilePath = $targetDir.$fileName; 
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        if(move_uploaded_file($_FILES['gimages']['tmp_name'], $targetFilePath)){ 
            $upload = 'ok'; 
        } 
    }
    $caption1 = $_POST['caption'];
    if (empty($_FILES['gimages']['name'])) {
        $query = "SELECT * FROM gallery WHERE id = $id";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $fileName = $row['img'];
        }
        $upload = 'ok'; 
    }
    $query = "UPDATE gallery SET ";
    $query .= "img = '{$fileName}', ";
    $query .= "caption = '{$caption1}' ";
    $query .= "WHERE id = {$id} ";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);
} 
///gallery update fuction ends------------------------------------------



///gallery insert fuction-------------------------------------------------
if(isset($_FILES['addgalleryimages'])){ 
    // File upload configuration 
    $targetDir = "../img/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
    $fileName = basename($_FILES['addgalleryimages']['name']); 
    $targetFilePath = $targetDir.$fileName; 
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        
        if(move_uploaded_file($_FILES['addgalleryimages']['tmp_name'], $targetFilePath)){ 
            $upload = 'ok'; 
        } 
    }
    $icaption = $_POST['icaption'];
    $query = "INSERT INTO gallery (img,caption) ";
    $query .="VALUES('{$fileName}','{$icaption}') ";
 $insert_pub = mysqli_query($connection, $query);
    ConfirmQuery($insert_pub);
} 
///gallery insert fuction end-------------------------------------------------


////Team tbale update fuction-------------------------------------------
if(isset($_FILES['uimg'])){ 
    
    $id = $_POST['id'];
    // File upload configuration 
    $targetDir = "../img/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
    $fileName = basename($_FILES['uimg']['name']); 
    $targetFilePath = $targetDir.$fileName; 
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        if(move_uploaded_file($_FILES['uimg']['tmp_name'], $targetFilePath)){ 
            $upload = 'ok'; 
        } 
    }
    if (empty($_FILES['uimg']['name'])) {
        $query = "SELECT * FROM investors WHERE id = $id";
        $select_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_image)) {
            $fileName = $row['img'];
        }
        $upload = 'ok'; 
    }
    $fullname = $_POST['fullname'];
    $date = date('F jS, Y h:i:s A', strtotime($_POST['date']));
    $country = $_POST['country'];
    $deposit_w = $_POST['deposit_w'];
    $interest_w = $_POST['interest_w'];
    $total_invest = $_POST['total_invest'];
    $total_deposit = $_POST['total_deposit'];
    $total_w = $_POST['total_w'];
    $referral_e = $_POST['referral_e'];
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    //$address = $_POST['address'];
    //$ucurrency = mysqli_real_escape_string($connection, $_POST['ucurrency']);
    $auth_switch = $_POST['2fa_switch'];
    $kyc_typ = $_POST['kyc_typ'];
    $kyc_status = $_POST['kyc_status'];
    $w_code = $_POST['w_code'];
    $address_type = mysqli_real_escape_string($connection, $_POST['address_type']);
    $wallet_address = mysqli_real_escape_string($connection, $_POST['wallet_address']);
    //$ugender = mysqli_real_escape_string($connection, $_POST['ugender']);
    if ($_POST['deposit_w'] == "") {
        $deposit_w = 0;
    }
    if ($_POST['interest_w'] == "") {
        $interest_w = 0;
    }
    if ($_POST['total_invest'] == "") {
        $total_invest = 0;
    }
    if ($_POST['total_deposit'] == "") {
        $total_deposit = 0;
    }
    if ($_POST['total_w'] == "") {
        $total_w = 0;
    }
    if ($_POST['referral_e'] == "") {
        $referral_e = 0;
    } 

    $query = "UPDATE investors SET ";
    $query .= "fullname = '{$fullname}', ";
    $query .= "date = '{$date}', ";
    $query .= "country = '{$country}', ";
    $query .= "deposit_w = '{$deposit_w}', ";
    $query .= "interest_w = '{$interest_w}', ";
    $query .= "total_invest = '{$total_invest}', ";
    $query .= "total_deposit = '{$total_deposit}', ";
    $query .= "total_w = '{$total_w}', ";
    $query .= "referral_e = '{$referral_e}', ";
    $query .= "username = '{$username}', ";
    $query .= "password = '{$password}', ";
    $query .= "email = '{$email}', ";
    $query .= "img = '{$fileName}', ";
    $query .= "address = '{$address}', ";
    $query .= "2fa_switch = '{$auth_switch}', ";
    $query .= "kyc_typ = '{$kyc_typ}', ";
    $query .= "kyc_status = '{$kyc_status}', ";
    $query .= "w_code = '{$w_code}', ";
    $query .= "address_type = '{$address_type}', ";
    $query .= "wallet_address = '{$wallet_address}' ";
    $query .= "WHERE id = {$id} ";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);

    // $query = "UPDATE transactions SET ";
    // $query .= "account_currency = '{$ucurrency}', ";
    // $query .= "userid = '{$uuser_id}' ";
    // $query .= "WHERE usermainid  = {$id} ";
    // $update = mysqli_query($connection, $query);
    // ConfirmQuery($update);
} 
///team tbale update fuction ends------------------------------------------

///Team insert fuction-------------------------------------------------
if(isset($_FILES['img'])){ 
    // File upload configuration 
    $targetDir = "../img/"; 
    $user_id = $_POST['user_id'];
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
    $fileName = basename($_FILES['img']['name']); 
    //cheack if user exists-----
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE userid = '$user_id'");
    $count = mysqli_num_rows($result);
    if (empty($fileName) || $fileName == "" || $fileName == null) {
        $upload = 'UPLOAD ERROR Please chose a Photo';}
    elseif ($count != 0) {
        $upload = 'USER ALREADY EXIST';
    } else {
    $targetFilePath = $targetDir.$fileName; 
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        
        if(move_uploaded_file($_FILES['img']['tmp_name'], $targetFilePath)){ 
            $upload = 'ok'; 
        } 
    }
    $account_status = $_POST['account_status'];
    $account_name = $_POST['account_name'];
    $account_number = $_POST['account_number'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $fax = $_POST['fax'];
    $address = $_POST['address'];
    $address = mysqli_real_escape_string($connection, $address);
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $account_type = $_POST['account_type'];
    $currency = $_POST['currency'];
    $transfer_code_switch = $_POST['transfer_code_switch'];
    $gender = $_POST['gender'];
    $initial_deposit = $_POST['initial_deposit'];
    $query = "INSERT INTO investors (status, accholder_name, userid, password, email,
     phone, fax, address, city, state, country, acctype, currency, imglink, accnum, 
     enable_disable_transfer_code,
      gender, account_balance) ";
    $query .="VALUES('{$account_status}','{$account_name}','{$user_id}','{$password}',
    '{$email}','{$phone}','{$fax}','{$address}','{$city}','{$state}',
    '{$country}','{$account_type}','{$currency}','{$fileName}','{$account_number}',
    '{$transfer_code_switch}','{$gender}',
    '{$initial_deposit}') ";
 $insert_pub = mysqli_query($connection, $query);
    ConfirmQuery($insert_pub);
} }
///Team insert fuction end-------------------------------------------------



echo $upload; 
?>