<?php session_start()  ?>
<?php 

$_SESSION['key'] = null;
//session_destroy();

header("Location: ../index.php");
?>