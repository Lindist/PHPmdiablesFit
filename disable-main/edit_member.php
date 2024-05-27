<?php 

require('dbconnect.php');
$id = $_POST['id'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$number = $_POST['number'];

$sqlu = "SELECT * FROM tb_member WHERE id LIKE '%$id%' ORDER BY id ASC";
$resultu = mysqli_query($connect, $sqlu);
$rowu = mysqli_fetch_array($resultu, MYSQLI_BOTH);

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
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        echo "location.href='homeadmin.php?admin_id='+ ".$id;
        echo "</script>";
    }
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        echo "location.href='homeuser_member.php?user_id='+ ".$id;
        echo "</script>";
} else {
    echo mysqli_error($connect);
}

?>