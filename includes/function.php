<?php
function ConfirmQuery($result)
{
    global $connection;
    if(!$result){
        die('query failed ' . mysqli_error($connection));
    }
}
?>