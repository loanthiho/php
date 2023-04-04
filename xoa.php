<?php
include 'ketnoi.php';
$id=$_GET['id'];
$sql="DELETE FROM sinhvien WHERE id= '$id' ";
$ketqua=mysqli_query($conn, $sql);
?>
