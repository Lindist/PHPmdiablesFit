<?php 

require('dbconnect.php');



$team_name = $_POST['team_name'];
$id = $_POST['user_id'];
$admin = $_POST['admin_id'];
$detail_date = $_POST['detail_date'];
$detail_address = $_POST['detail_address'];
$detail_idp = $_POST['detail_idp'];
$detail_tel = $_POST['detail_tel'];
$detail_occ = $_POST['detail_occ'];
$detail_salary = $_POST['detail_salary'];
$detail_type = $_POST['detail_type'];

// $sql = "INSERT INTO tb_detail (team_name, id, detail_date, detail_address, detail_idp, detail_tel, detail_occ, detail_salary, detail_type, detail_care, detail_care_name, detail_care_lastname, detail_care_tel, detail_line, detail_facebook)
// VALUES ('$team_name', '$id', '$detail_date', '$detail_address', '$detail_idp', '$detail_tel', '$detail_occ', '$detail_salary', '$detail_type', '', '', '', '', '', '');"
if (isset($_POST['detail_care'])) {
    $detail_care = "ใช่";
} else {
    $detail_care = "ไม่ใช่";
}

if ($detail_care == "No") {
    $detail_care == "ไม่ใช่";
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


$sql = "INSERT INTO tb_detail (team_name, id, detail_date, detail_address, detail_idp, detail_tel, detail_occ, detail_salary, detail_type, detail_care, detail_care_name, detail_care_lastname, detail_care_tel, detail_line, detail_facebook) VALUES
    ('$team_name', '$id', '$detail_date', '$detail_address', '$detail_idp', '$detail_tel', '$detail_occ', '$detail_salary', '$detail_type', '$detail_care', '$detail_care_name', '$detail_care_lastname', '$detail_care_tel', '$detail_line', '$detail_facebook')";
$result = mysqli_query($connect, $sql);




if($result) {
    if($admin == 1)
    {
        echo "<script>";
        echo "alert('ลบข้อมูลเสร็จสิ้น!');";
        // echo "window.location = 'index.php';";
        echo "location.href='home.php?admin_id='+ ".$id;
        echo "</script>";
    }else{

        echo "ลบข้อมูลเรียบร้อย";
        echo "<a href='index.php'>กลับหน้าแรก<a>";
        echo "<script>";
        echo "alert('ลบข้อมูลเสร็จสิ้น!');";
        // echo "window.location = 'index.php';";
        echo "location.href='index.php?user_id='+ ".$id;
        echo "</script>";
    }
} else {
    echo mysqli_error($connect);
}

?>