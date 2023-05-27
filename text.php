<?php
//echo $dateTime = date('y');
//echo $dateTime->modify('+5 minutes');
//echo $date = date("Y-m-d H:i:s + 16 minute");
$minute = 700000;
$newtimestamp = strtotime(''.date('Y-m-d H:i:s').' + '.$minute.' minute');
echo $main_date = date('Y-m-d H:i:s', $newtimestamp).'<br>';

// converts the date to string date
$main_date = strtotime($main_date);
echo $new_date = date('F jS, Y h:i:s A', $main_date);
echo $new_date = date('F jS, Y h:i:s A', strtotime($main_date));

?>