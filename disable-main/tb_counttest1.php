<!-- <?php 

// require('dbconnect.php');
// $sql11 = "SELECT count(*) as total from tb_member";
// $result11=mysql_query($connect,$sql11);
// $data=mysql_fetch_assoc($result11);
// echo $data['total'];

?> -->
<?php
// เชื่อมต่อกับฐานข้อมูล
require('connect.php');

$sql11 = "SELECT COUNT(*) as total FROM tb_member";

// ดำเนินการคำสั่ง SQL
$result11 = $conn->query($sql11);

// ดึงข้อมูลเป็นแถว associative array
while($data = $result11->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    echo $data['total'];
}


// ปิดการเชื่อมต่อ
// $connect->close();
?>
