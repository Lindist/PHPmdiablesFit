<?php 

session_start();
if (!isset($_SESSION['user_login']) && !isset($_SESSION['admin_login'])) {
  header("Location: ../index.php");
  exit();
}

require('dbconnect.php');

$id = $_POST['id'];
$detail_care_name = $_POST['detail_care_name'];
$detail_care_lastname = $_POST['detail_care_lastname'];
$detail_care_tel = $_POST['detail_care_tel'];

if(isset($_POST['ida'])) {
    $ida = $_POST['ida'];
} else {
    $ida = $id;
}



$sql = "UPDATE tb_detail SET
    detail_care_name = '$detail_care_name',
    detail_care_lastname = '$detail_care_lastname',
    detail_care_tel = '$detail_care_tel'
    WHERE id = '$id'";

$result = mysqli_query($connect, $sql);

if($result) {
    echo "<script>";
    // echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
    echo "location.href='homeuser_detail_2.php?user_id='+ ".$id;
    echo "</script>";
} else {
    echo mysqli_error($connect);
}

?>