<?php 

require('dbconnect.php');
$id = $_POST['id'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];

$sql = "UPDATE tb_member SET
    firstname = '$firstname',
    lastname = '$lastname',
    age = '$age',
    gender = '$gender',
    email = '$email'
    WHERE id = '$id'";

$result = mysqli_query($connect, $sql);
// echo $sql;
if($result) {

        // echo "แก้ไขข้อมูลเรียบร้อย";
        /* The line `echo "<a href='index.php'>กลับหน้าแรก<a>";` is generating a hyperlink in the PHP
        code. When this line is executed, it will display a link with the text "กลับหน้าแรก" (which
        means "Go back to the home page" in Thai) that points to the `index.php` page. This allows
        users to easily navigate back to the home page by clicking on the link. */
        // echo "<a href='index.php'>กลับหน้าแรก<a>"
        echo "<script>";
        echo "alert('อัปเดตข้อมูลเสร็จสิ้น!');";
        // echo "window.location = 'index.php';";
        echo "location.href='homeuser_member.php?user_id='+ ".$id;
        echo "</script>";
} else {
    echo mysqli_error($connect);
}

?>