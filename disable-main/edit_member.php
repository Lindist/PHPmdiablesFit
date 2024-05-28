<?php 
require('dbconnect.php');
$id = $_POST['id'];

if(isset($_POST['ida'])) {
    $ida = $_POST['ida'];
} else {
    $ida = $id;
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
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        $_SESSION['refres_page2'] = 2;
        echo "location.href='tb_count.php?admin_id='+ ".$ida;
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        $_SESSION['refres_page3'] = 3;
        echo "location.href='tb_count.php?user_id='+ ".$ida;
        echo "</script>";
    }
} else {
    echo mysqli_error($connect);
}

?>