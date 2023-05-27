
<?php session_start();  ?>
<?php include "db.php";  ?>
<?php
include_once 'src/FixedBitNotation.php';
include_once 'src/GoogleAuthenticatorInterface.php';
include_once 'src/GoogleAuthenticator.php';
include_once 'src/GoogleQrUrl.php';

$g = new \Google\Authenticator\GoogleAuthenticator();
//$secret = 'XVQ2UIGO75XRUKJO';
//the "getUrl" method takes as a parameter: "username", "host" and the key "secret"
$link = $g->getURL($_SESSION['username'], 'GOLDENPROFIT.ORG', $_SESSION['google_auth_code']);
$result = array($_SESSION['google_auth_code'], $link);
echo json_encode($result);
//echo '<img src="'.$g->getURL('rafaelwendel', 'rafaelwendel.com', $secret).'" />';
$query = "UPDATE investors SET 2fa_switch = 1";
$username = $_SESSION['username'];
$query .= " WHERE username = '$username'";
$update_investor_table =  mysqli_query($connection, $query);

?>