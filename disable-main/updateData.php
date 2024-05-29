<?php 

require('dbconnect.php');
session_start();
$detail_id = $_POST['detail_id'];
$id = $_POST['id'];
$admin = $_POST['admin_id'];
$detail_date = $_POST['detail_date'];
$detail_address = $_POST['detail_address'];
$detail_idp = $_POST['detail_idp'];
$detail_occ = $_POST['detail_occ'];
$detail_salary = $_POST['detail_salary'];
$detail_type = $_POST['detail_type'];
$detail_line = $_POST['detail_line'];
$detail_facebook = $_POST['detail_facebook'];

if(isset($_GET['ida'])) {
    $ida = $_GET['ida'];
} else {
    $ida = $id;
}

$sqlu = "SELECT * FROM tb_member WHERE id LIKE '%$ida%' ORDER BY id ASC";
$resultu = mysqli_query($connect, $sqlu);
$rowu = mysqli_fetch_array($resultu, MYSQLI_BOTH);

if (isset($_POST['detail_care'])) {
    $detail_care = "มี";
} else {
    $detail_care = "ไม่มี";
}

if ($detail_care == "ไม่มี") {
    $detail_care_name = "-";
    $detail_care_lastname = "-";    
    $detail_care_tel = "-";
} else {
    $detail_care_name = $_POST['detail_care_name'];
    $detail_care_lastname = $_POST['detail_care_lastname'];
    $detail_care_tel = $_POST['detail_care_tel'];
}

$sql = "UPDATE tb_detail SET
    id = '$id',
    detail_date = '$detail_date',
    detail_address = '$detail_address',
    detail_idp = '$detail_idp',
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
echo $rowu["urole"];
if($result) {
    if($rowu["urole"] == "admin")
    {
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        $_SESSION['refres_page5'] = 5;
        echo "location.href='tb_count.php?admin_id='+ ".$ida;
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        $_SESSION['refres_page6'] = 6;
        echo "location.href='tb_count.php?user_id='+ ".$ida;
        echo "</script>";
    }
} else {
    echo mysqli_error($connect);
}

?>