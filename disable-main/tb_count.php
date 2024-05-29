<?php
require('connect.php');
session_start();
if(isset($_GET['admin_id']))
{
    $id1 = $_GET['admin_id'];
}
else if(isset($_GET['user_id']))
{
    $id1 = $_GET['user_id'];
}

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
$agesh = array();
$gendersh = array();

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


$id = 1;
$change = 0;
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
    if($key > 0 && $key <= 12)
    {
        array_splice($agesh,$change,0,'อายุ : 1-12 ปี');
    }
    else if($key > 12 && $key <= 18)
    {
        array_splice($agesh,$change,0,'อายุ : 13-18 ปี');     
    }
    else if($key > 18 && $key <= 25)
    {
        array_splice($agesh,$change,0,'อายุ : 19-25 ปี');
    }
    else if($key > 25 && $key <= 35)
    {
        array_splice($agesh,$change,0,'อายุ : 26-35 ปี');
    }
    else if($key > 35 && $key <= 45)
    {
        array_splice($agesh,$change,0,'อายุ : 36-45 ปี');
    }
    else if($key > 45 && $key <= 55)
    {
        array_splice($agesh,$change,0,'อายุ : 46-55 ปี');
    }
    else if($key > 55 && $key <= 65)
    {
        array_splice($agesh,$change,0,'อายุ : 56-65 ปี');
    }
    else if($key > 65 && $key <= 75)
    {
        array_splice($agesh,$change,0,'อายุ : 66-75 ปี');
    }
    else if($key > 75 && $key <= 85)
    {
        array_splice($agesh,$change,0,'อายุ : 76-85 ปี');
    }
    else if($key > 85 && $key <= 95)
    {
        array_splice($agesh,$change,0,'อายุ : 86-95 ปี');
    }else{
        array_splice($agesh,$change,0,'อายุ : 96 ปีขึ้นไป');
    }
    
    $id++;
} 
$countage = array_count_values($agesh);
ksort($countage);
$agein_key = array_keys($countage);
$agein_value = array_values($countage);

for($i=0;$i<count($agein_key);$i++)
{
    $i1 = $i+1;
    $mysql3 = $conn->prepare("INSERT INTO tb_count(id,member_type,Count) VALUES('$i1','$agein_key[$i]','$agein_value[$i]')");
    $mysql3->execute();
}

foreach($count2 as $key => $v)
{
    if($key == "ชาย")
    {
        $gendersh["ชาย"] = $v;
    }
    else if($key == "หญิง")
    {
        $gendersh["หญิง"] = $v;
    }
    else{
        $gendersh["อื่นๆ"] = $v;
    }
    
} 
$male = $gendersh["ชาย"];
$female = $gendersh["หญิง"];
$other = $gendersh["อื่นๆ"];
$mysql3 = $conn->prepare("INSERT INTO tb_count(id,member_type,Count) VALUES('$id','เพศ : ชาย','$male')");
$mysql3->execute();
$id++;
$mysql3 = $conn->prepare("INSERT INTO tb_count(id,member_type,Count) VALUES('$id','เพศ : หญิง','$female')");
$mysql3->execute();
$id++;
$mysql3 = $conn->prepare("INSERT INTO tb_count(id,member_type,Count) VALUES('$id','เพศ : อื่นๆ','$other')");
$mysql3->execute();
$id++;

foreach($count3 as $key => $v)
{
    $mysql3 = $conn->prepare("INSERT INTO tb_count(id,member_type,Count) VALUES('$id','อาชีพ : $key','$v')");
    $mysql3->execute();
    $id++;
} 

if(isset($_SESSION['refres_page1'])){
    unset($_SESSION['refres_page1']);
    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signinForm.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
    header("location: ../signupForm.php");
}
else if(isset($_SESSION['refres_page2']))
{
    unset($_SESSION['refres_page2']);
    echo "<script>";
    echo "location.href='homeadmin.php?admin_id='+ ".$id1;
    // echo "<script src='backpages.js'></script>";
    echo "</script>";
}
else if(isset($_SESSION['refres_page3']))
{
    unset($_SESSION['refres_page3']);
    echo "<script>";
    echo "location.href='homeuser_member.php?user_id='+ ".$id1;
    echo "</script>";
}
else if(isset($_SESSION['refres_page4']))
{
    unset($_SESSION['refres_page4']);
    echo "<script>";
    echo "location.href='detail_tb1.php?admin_id='+ ".$id1;
    echo "</script>";
}
else if(isset($_SESSION['refres_page5']))
{
    unset($_SESSION['refres_page5']);
    echo "<script>";
    echo "location.href='detail_tb1.php?admin_id='+ ".$id1;
    echo "</script>";
}
else if(isset($_SESSION['refres_page6']))
{
    unset($_SESSION['refres_page6']);
    echo "<script>";
    echo "location.href='homeuser_detail_1.php?user_id='+ ".$id1;
    echo "</script>";
}
else if(isset($_SESSION['refres_page7']))
{
    unset($_SESSION['refres_page7']);
    echo "<script>";
    echo "location.href='detail_tb1.php?admin_id='+ ".$id1;
    echo "</script>";
}
else if(isset($_SESSION['refres_page8']))
{
    unset($_SESSION['refres_page8']);
    echo "<script>";
    echo "location.href='homeuser_detail_1.php?user_id='+ ".$id1;
    echo "</script>";
}

?>