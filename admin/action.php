<?php

//action.php

include('../includes/db.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':user_id'  => $_POST['user_id'],
  ':transfer_acess_code'  => $_POST['transfer_acess_code'],
  ':activation_access_code'  => $_POST['activation_access_code'],
  ':security_acess_code'  => $_POST['security_acess_code'],
  ':wire_authorization_acess_code'   => $_POST['wire_authorization_acess_code'],
  ':tax_clearance_acess_code'    => $_POST['tax_clearance_acess_code']
 );

 $query = "
 UPDATE transfer_acess_code_table 
 SET transfer_acess_code = :transfer_acess_code, 
 activation_access_code = :activation_access_code,
 security_acess_code = :security_acess_code,
 wire_authorization_acess_code = :wire_authorization_acess_code,
 tax_clearance_acess_code = :tax_clearance_acess_code
 WHERE user_id = :user_id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM transfer_acess_code_table 
 WHERE user_id = '".$_POST["user_id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}
