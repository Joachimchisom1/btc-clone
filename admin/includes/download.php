<?php
include "../../includes/db.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stat = $connect->prepare("select * from proof WHERE id=?");
    $stat->bindparam(1, $id);
    $stat->execute();
    $data = $stat->fetch();
    $file = '../../img/' . $data['proof_img'];
   // echo $id;
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_end_clean();
        flush();
        readfile($file);
        exit;
    }
}
