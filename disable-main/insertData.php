<?php 
session_start();
require('dbconnect.php');

$id = $_POST['user_id'];
$admin = $_POST['admin_id'];
$detail_date = $_POST['detail_date'];
$detail_address = $_POST['detail_address'];
$detail_idp = $_POST['detail_idp'];
$detail_occ = $_POST['detail_occ'];
$detail_salary = $_POST['detail_salary'];
$detail_type = $_POST['detail_type'];
$detail_line = $_POST['detail_line'];
$detail_facebook = $_POST['detail_facebook'];

if (isset($_POST['detail_care'])) {
    $detail_care = "มี";
} else {
    $detail_care = "ไม่มี";
}

if ($detail_care == "ไม่มี") {
    $detail_care_name = "-";
    $detail_care_lastname = "-";    
    $detail_care_tell = "-";
} else {
    $detail_care_name = $_POST['detail_care_name'];
    $detail_care_lastname = $_POST['detail_care_lastname'];
    $detail_care_tel = $_POST['detail_care_tel'];
}


$sql = "INSERT INTO tb_detail (id, detail_date, detail_address, detail_idp, detail_occ, detail_salary, detail_type, detail_care, detail_care_name, detail_care_lastname, detail_care_tel, detail_line, detail_facebook) VALUES
    ('$id', '$detail_date', '$detail_address', '$detail_idp', '$detail_occ', '$detail_salary', '$detail_type', '$detail_care', '$detail_care_name', '$detail_care_lastname', '$detail_care_tel', '$detail_line', '$detail_facebook')";
$result = mysqli_query($connect, $sql);

if($result) {
    if($admin == 1)
    {
        echo "<script>";
        echo "alert('เพิ่มข้อมูลเสร็จสิ้น!');";
        $_SESSION['refres_page7'] = 7;
        echo "location.href='tb_count.php?user_id='+ ".$id;
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert('เพิ่มข้อมูลเสร็จสิ้น!');";
        $_SESSION['refres_page8'] = 8;
        echo "location.href='tb_count.php?user_id='+ ".$id;
        echo "</script>";
    }
} else {
    echo mysqli_error($connect);
}

?>