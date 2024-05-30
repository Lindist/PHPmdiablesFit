<?php
// เชื่อมต่อกับฐานข้อมูล
require('connect.php');

$genders = $conn->query("SELECT gender, COUNT(*) as gender FROM tb_member GROUP BY gender");
$ages = $conn->query("SELECT age, COUNT(*) as age FROM tb_member GROUP BY age");
$career = $conn->query("SELECT detail_occ, COUNT(*) as career FROM tb_detail GROUP BY detail_occ");

$stmt = $conn->query("SELECT * FROM tb_member GROUP BY gender");
$stmt1 = $conn->query("SELECT * FROM tb_member GROUP BY age");
$stmt2 = $conn->query("SELECT * FROM tb_detail GROUP BY detail_occ");
// ดึงข้อมูลเป็นแถว associative array

while($data = $stmt1->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    echo $data['age']." | ";
}

echo "<br>";

while($data = $ages->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    echo $data['age']."---";
}
echo "<br>";

while($data = $stmt->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    echo $data['gender']." | ";
}

echo "<br>";

while($data = $genders->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    echo $data['gender']."---";
}
echo "<br>";
while($data = $stmt2->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    echo $data['detail_occ']." | ";
}

echo "<br>";

while($data = $career->fetch(PDO::FETCH_ASSOC))
{
    // แสดงจำนวน
    echo $data['career']."---";
}

?>
