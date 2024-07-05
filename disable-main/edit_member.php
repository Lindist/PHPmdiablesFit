<?php 

session_start();
if (!isset($_SESSION['user_login']) && !isset($_SESSION['admin_login'])) {
  header("Location: ../index.html");
  exit();
}

require('dbconnect.php');
$id = $_POST['id'];

if(isset($_POST['ida'])) {
    $ida = $_POST['ida'];
} else {
    $ida = $id;
}
if(isset($_POST['admin_id'])){
    $admin_id = $_POST['admin_id'];
}
$sqlu = "SELECT * FROM tb_member WHERE id LIKE '%$ida%' ORDER BY id ASC";
$resultu = mysqli_query($connect, $sqlu);
$rowu = mysqli_fetch_array($resultu, MYSQLI_BOTH);

session_start();
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$number = $_POST['number'];

$sql = "UPDATE tb_member SET
    firstname = '$firstname',
    lastname = '$lastname',
    age = '$age',
    gender = '$gender',
    number = '$number'
    WHERE id = '$id'";

$result = mysqli_query($connect, $sql);

if($result) {
    if ($rowu["urole"] == 'admin') {
        if($admin_id == 1)
        {
            echo "<script>";
            echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
            echo "location.href='member_tb.php?admin_id='+ ".$ida;
        // echo "<script src='backpages.js'></script>";
            echo "</script>";
        }
        else{
            echo "<script>";
            echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
            echo "location.href='homeadmin.php?admin_id='+ ".$ida;
        // echo "<script src='backpages.js'></script>";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        echo "location.href='homeuser_member.php?user_id='+ ".$ida;
        echo "</script>";
    }
} else {
    echo mysqli_error($connect);
}

?>