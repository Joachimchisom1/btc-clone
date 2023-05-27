<?php

//action.php

include('../includes/db.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  //':date'  => $_POST['date'],
  ':transaction_id'   => $_POST['transaction_id'],
  ':amount'  => $_POST['amount'],
  ':wallet'  => $_POST['wallet'],
  ':detail'   => $_POST['detail'],
  ':username'  => $_POST['username'],
  ':post_balance'  => $_POST['post_balance'],
  ':type'   => $_POST['type'],
  ':id'  => $_POST['id'],
 );

 $query = "
 UPDATE transactions 
 SET transaction_id = :transaction_id,
 amount = :amount,
 wallet = :wallet
 detail = :detail,
 username = :username, 
 post_balance = :post_balance, 
 type = :type,
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM transactions
 WHERE id = '".$_POST['id']."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}
