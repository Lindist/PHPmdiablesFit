<?php

require('dbconnect.php');

$id = $_GET['id'];

$sql = "DELETE FROM tb_member WHERE id = $id";

$result = mysqli_query($connect, $sql);

if($result) {
    echo "<script>";
    echo "alert('ลบข้อมูลเสร็จสิ้น!');";
    echo "window.location = 'member_tb.php';";
    echo "</script>";
} else {
    echo mysqli_error($connect);
}

?>