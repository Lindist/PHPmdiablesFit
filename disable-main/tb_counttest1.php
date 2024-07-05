<?php
session_start();
if (!isset($_SESSION['user_login']) && !isset($_SESSION['admin_login'])) {
  header("Location: ../index.html");
  exit();
}
// เชื่อมต่อกับฐานข้อมูล
require('connect.php');

$genders = $conn->query("SELECT gender, COUNT(*) as gender FROM tb_member GROUP BY gender");
$ages = $conn->query("SELECT age, COUNT(*) as age FROM tb_member GROUP BY age");
$career = $conn->query("SELECT detail_occ, COUNT(*) as career FROM tb_detail GROUP BY detail_occ");

$stmt = $conn->query("SELECT * FROM tb_member GROUP BY gender");
$stmt1 = $conn->query("SELECT * FROM tb_member GROUP BY age");
$stmt2 = $conn->query("SELECT * FROM tb_detail GROUP BY detail_occ");
// ดึงข้อมูลเป็นแถว associative array
$agearr_key = array();
$agearr_value = array();

$genderarr_key = array();
$genderarr_value = array();

$careerarr_key = array();
$careerarr_value = array();
while($data = $stmt1->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    $agearr_key[] = $data['age'];
}


while($data = $ages->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    $agearr_value[] = $data['age'];
}

while($data = $stmt->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    $genderarr_key[] = $data['gender'];
}


while($data = $genders->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    $genderarr_value[] = $data['gender'];
}

while($data = $stmt2->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    $careerarr_key[] = $data['detail_occ'];
}



while($data = $career->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    $careerarr_value[] = $data['career'];
}

// print_r($agearr_key);
// echo "<br>";
// print_r($agearr_value);
// echo "<br>";
// print_r($genderarr_key);
// echo "<br>";
// print_r($genderarr_value);
// echo "<br>";
// print_r($careerarr_key);
// echo "<br>";
// print_r($careerarr_value);
// echo "<br>";
?>
