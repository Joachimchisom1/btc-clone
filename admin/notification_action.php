<?php

//action.php

include('../includes/db.php');

if ($_POST['action'] == 'edit') {
    $data = array(
        ':id'  => $_POST['id'],
        //':user_id'  => $_POST['user_id'],
        ':title'  => $_POST['title'],
        ':mssg'  => $_POST['mssg']
    );

    $query = "
 UPDATE notfications 
 SET title = :title, 
 mssg = :mssg
 WHERE id = :id
 ";
    $statement = $connect->prepare($query);
    $statement->execute($data);
    echo json_encode($_POST);
}

if ($_POST['action'] == 'delete') {
    $query = "
 DELETE FROM notfications 
 WHERE id = '" . $_POST["id"] . "'
 ";
    $statement = $connect->prepare($query);
    $statement->execute();
    echo json_encode($_POST);
}
