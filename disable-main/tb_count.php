<?php
require('connect.php');
$mysql = $conn->query("SELECT * FROM tb_member");
$mysql2 = $conn->query("SELECT * FROM tb_detail");
$mysql3 = $conn->query("SELECT * FROM tb_count");
$mysql->execute();
$mysql2->execute();
$mysql3->execute();

$cage = array();
$cgender = array();
$cocc = array();
$tbc = array();
$keys = array();

while($row = $mysql->fetch(PDO::FETCH_ASSOC)){
    $cage[] = $row['age'];
    $cgender[] = $row['gender'];
}
while($row = $mysql2->fetch(PDO::FETCH_ASSOC)){
    $cocc[] = $row['detail_occ'];
}
while($row = $mysql3->fetch(PDO::FETCH_ASSOC))
{
    $tbc[] = $row['member_type'];
    $keys[] = $row['id'];
}

$count1 = array_count_values($cage);
$count2 = array_count_values($cgender);
$count3 = array_count_values($cocc);

$key1 = array_keys($count1);
$key2 = array_keys($count2);
$key3 = array_keys($count3);

// $result = array_diff($key1, $tbc);

if(!empty($tbc))
{
    for($i = 0;$i < count($tbc);$i++)
    {
        $mysql3 = $conn->prepare("DELETE FROM tb_count WHERE id = '$keys[$i]'");
        $mysql3->execute();
    }
}
foreach($count1 as $key => $v)
{
    $mysql3 = $conn->prepare("INSERT INTO tb_count(member_type,Count) VALUES('อายุ : $key','$v')");
    $mysql3->execute();
} 

foreach($count2 as $key => $v)
{
    $mysql3 = $conn->prepare("INSERT INTO tb_count(member_type,Count) VALUES('เพศ : $key','$v')");
    $mysql3->execute();
} 

foreach($count3 as $key => $v)
{
    $mysql3 = $conn->prepare("INSERT INTO tb_count(member_type,Count) VALUES('อาชีพ : $key','$v')");
    $mysql3->execute();
} 



?>