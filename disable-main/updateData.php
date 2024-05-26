<?php 

require('dbconnect.php');

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
if($result) {
    if($admin == 1)
    {
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
<<<<<<< HEAD
        // echo "window.location = 'index.php';";
        echo "location.href='homeuser_detail_1.php?admin_id='+ ".$id;
        echo "</script>";
    }else{

        echo "แก้ไขข้อมูลเรียบร้อย";
        /* The line `echo "<a href='index.php'>กลับหน้าแรก<a>";` is generating a hyperlink in the PHP
        code. When this line is executed, it will display a link with the text "กลับหน้าแรก" (which
        means "Go back to the home page" in Thai) that points to the `index.php` page. This allows
        users to easily navigate back to the home page by clicking on the link. */
        // echo "<a href='index.php'>กลับหน้าแรก<a>"
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        // echo "window.location = 'index.php';";
=======
        echo "location.href='homeuser_detail_1.php?admin_id='+ ".$id;
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
>>>>>>> f8e581d812fc5d8616bf81257f4439bb396a37e4
        echo "location.href='homeuser_detail_1.php?user_id='+ ".$id;
        echo "</script>";
    }
} else {
    echo mysqli_error($connect);
}

?>