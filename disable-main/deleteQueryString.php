<?php 

require('dbconnect.php');

$detail_id = $_GET['detail_id'];
$id=$_GET['user_id'];
if(isset($_GET['admin']))
{
    $admin = $_GET['admin'];
}else
{
    $admin = 0;
}

$sql = "DELETE FROM tb_detail WHERE detail_id = $detail_id";

$result = mysqli_query($connect, $sql);

if($result) {
    if($admin == 1)
    {
        echo "<script>";
        echo "alert('ลบข้อมูลเสร็จสิ้น!');";
        // echo "window.location = 'index.php';";
        $_SESSION['refresh_count'] = 3;
        echo "location.href='home.php?admin_id='+ ".$id;
        echo "</script>";
    }else{

        echo "ลบข้อมูลเรียบร้อย";
        echo "<a href='index.php'>กลับหน้าแรก<a>";
        echo "<script>";
        echo "alert('ลบข้อมูลเสร็จสิ้น!');";
        $_SESSION['refresh_count'] = 3;
        echo "location.href='index.php?user_id='+ ".$id;
        echo "</script>";
    }
} else {
    echo mysqli_error($connect);
}

?>