<?php 

require('dbconnect.php');
$id = $_POST['id'];

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
// echo $sql;
if($result) {
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        echo "location.href='homeuser_member.php?user_id='+ ".$id;
        echo "</script>";
} else {
    echo mysqli_error($connect);
}

?>