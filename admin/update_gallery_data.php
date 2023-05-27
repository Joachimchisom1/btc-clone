<?php
include_once "../includes/db.php";

if (isset($_POST['id'])) { 
	$id = $_POST['id']; 
}
	$sqlQuery = "SELECT * FROM gallery WHERE id = $id";  
    $result = mysqli_query($connection, $sqlQuery); 

$paginationHtml = '';
while ($row = mysqli_fetch_assoc($result)) { 
	$paginationHtml.='<form id="gallery_Form"  enctype="multipart/form-data">
	<input hidden name="id" type="text" value="'.$row["id"].'">
	<div class="form-group">
		<label for="recipient-name" class="col-form-label">Caption:</label>
		<input name="caption" type="text" value="'.$row["caption"].'" class="form-control" id="title">
	</div>
	<div class="form-group">
		<div id="img1"><img width="100" height="50" src="../img/'.$row["img"].'" alt=""></td></div>
		<input accept="image/*" id="imgup" type="file" name="gimages">
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
