<?php
include_once "../includes/db.php";

if (isset($_POST['id'])) { 
	$id = $_POST['id']; 
}
	$sqlQuery = "SELECT * FROM events WHERE id = $id";  
    $result = mysqli_query($connection, $sqlQuery); 

$paginationHtml = '';
while ($row = mysqli_fetch_assoc($result)) { 
	$paginationHtml.='<form id="event_Form"  enctype="multipart/form-data">
	<input hidden name="id" type="text" value="'.$row["id"].'">
	<div class="form-group">
		<label for="recipient-name" class="col-form-label">TITLE:</label>
		<input name="title" type="text" value="'.$row["title"].'" class="form-control" id="title">
	</div>
	<div class="form-group">
		<label for="recipient-name" class="col-form-label">DATE:</label>
		<input  type="text" value="'.$row["date"].'" name="date" class="form-control" id="date">
	</div>
	<div class="form-group">
		<label for="recipient-name" class="col-form-label">TIME:</label>
		<input  type="text" value="'.$row["time"].'" name="time" class="form-control" id="time">
	</div>
	<div class="form-group">
		<label for="recipient-name" class="col-form-label">LOCATION:</label>
		<input  type="text" value="'.$row["location"].'" name="location" class="form-control" id="location">
	</div>
	<div class="form-group">
		<label for="recipient-name" class="col-form-label">DESCRIPTION:</label>
		<input  type="text" value="'.$row["description"].'" name="description" class="form-control" id="description">
	</div>
	<div class="form-group">
		<div id="img1"><img width="100" height="50" src="../img/'.$row["img"].'" alt=""></td></div>
		<input accept="image/*" id="imgup" type="file" name="eimages">
	</div>
	<div hidden class="progress">
                        <div class="progress-bar"></div>
    </div>
	<div hidden class="status"></div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="add" value="UPDATE">
	</div>
</form>';
} 
$jsonData = array(
	"html"	=> $paginationHtml,	
);
echo json_encode($jsonData);
