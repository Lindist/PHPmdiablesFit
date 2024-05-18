<?php
require_once 'connect.php';
$all = $conn->query("SELECT * FROM tb_member");

$all->execute();
$data = array();

while($row = $all->fetch(PDO::FETCH_ASSOC))
{
    // echo "<input type='hidden'  name='Id' value= '$row[id]' id='Id'>";
    // echo "<script src='arr.js'></script>";
     $data[] = $row['id'];

}
$arr=implode(",",$data);
// echo $arr;
// $stmt = $conn->prepare("INSERT INTO tb_member(allid) VALUES('$arr')");
// $stmt->execute();
?>