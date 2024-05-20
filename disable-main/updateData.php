<?php 

require('dbconnect.php');

$detail_id = $_POST['detail_id'];
$team_name = $_POST['team_name']; 
$id = $_POST['id'];
$admin = $_POST['admin_id'];
// $detail_date = date('detail_date', strtotime($_POST['detail_date']));
$detail_date = $_POST['detail_date'];
$detail_address = $_POST['detail_address'];
$detail_idp = $_POST['detail_idp'];
$detail_tel = $_POST['detail_tel'];
$detail_occ = $_POST['detail_occ'];
$detail_salary = $_POST['detail_salary'];
$detail_type = $_POST['detail_type'];

if (isset($_POST['detail_care'])) {
    $detail_care = "ใช่";
} else {
    $detail_care = "ไม่ใช่";
}

if ($detail_care == "ไม่ใช่") {
    $detail_care_name = "";
    $detail_care_lastname = "";    
    $detail_care_tell = "";
    $detail_line = "";
    $detail_facebook = "";
} else {
    $detail_care_name = $_POST['detail_care_name'];
    $detail_care_lastname = $_POST['detail_care_lastname'];
    $detail_care_tel = $_POST['detail_care_tel'];
    $detail_line = $_POST['detail_line'];
    $detail_facebook = $_POST['detail_facebook'];
}

$sql = "UPDATE tb_detail SET
    team_name = '$team_name',
    id = '$id',
    detail_date = '$detail_date',
    detail_address = '$detail_address',
    detail_idp = '$detail_idp',
    detail_tel = '$detail_tel',
    detail_occ = '$detail_occ',
    detail_salary = '$detail_salary',
    detail_type = '$detail_type',
    detail_care = '$detail_care',
    detail_care_name = '$detail_care_name',
    detail_care_lastname = '$detail_care_lastname',
    detail_care_tel = '$detail_care_tel',
    detail_line = '$detail_line',
    detail_facebook = '$detail_facebook'
    WHERE detail_id = '$detail_id'";

$result = mysqli_query($connect, $sql);
// echo $sql;
if($result) {
    if($admin == 1)
    {
        echo "แก้ไขข้อมูลเรียบร้อย";
        echo "<a href='index.php'>กลับหน้าแรก<a>";
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        // echo "window.location = 'index.php';";
        echo "location.href='home.php?admin_id='+ ".$id;
        echo "</script>";
    }else{

        echo "แก้ไขข้อมูลเรียบร้อย";
        echo "<a href='index.php'>กลับหน้าแรก<a>";
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        // echo "window.location = 'index.php';";
        echo "location.href='index.php?user_id='+ ".$id;
        echo "</script>";
    }
} else {
    echo mysqli_error($connect);
}

?>