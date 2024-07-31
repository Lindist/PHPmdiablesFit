<?php

require('dbconnect.php');
session_start();
$id = $_GET['id'];
$ida = $_GET['ida'];

$sql = "DELETE FROM tb_member WHERE id = $id";

$result = mysqli_query($connect, $sql);

if($result) {
    echo "<script>";
    // echo "alert('ลบข้อมูลเสร็จสิ้น!');";
    echo "location.href='member_tb.php?admin_id='+ ".$ida;
    echo "</script>";
} else {
    echo mysqli_error($connect);
}

?>