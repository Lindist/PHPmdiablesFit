<?php
require('connect.php');
session_start();
if (!isset($_SESSION['user_login']) && !isset($_SESSION['admin_login'])) {
  header("Location: ../index.html");
  exit();
}
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

// $key1 = array_keys($count1);
// $key2 = array_keys($count2);
// $key3 = array_keys($count3);
// print_r($count1 );

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
for($c=0; $c < count($cage);$c++)
{
    // echo $key." ".$v."<br>";
    if($cage[$c] > 0 && $cage[$c] <= 12)
    {
        $agesh[] = 'อายุ : 1-12 ปี';
    }
    else if($cage[$c] > 12 && $cage[$c] <= 18)
    {
        $agesh[] = 'อายุ : 13-18 ปี';   
    }
    else if($cage[$c] > 18 && $cage[$c] <= 25)
    {
        $agesh[] = 'อายุ : 19-25 ปี';
    }
    else if($cage[$c] > 25 && $cage[$c] <= 35)
    {
        $agesh[] = 'อายุ : 26-35 ปี';
    }
    else if($cage[$c] > 35 && $cage[$c] <= 45)
    {
        $agesh[] = 'อายุ : 36-45 ปี';
    }
    else if($cage[$c] > 45 && $cage[$c] <= 55)
    {
        $agesh[] = 'อายุ : 46-55 ปี';
    }
    else if($cage[$c] > 55 && $cage[$c] <= 65)
    {
        $agesh[] = 'อายุ : 56-65 ปี';
    }
    else if($cage[$c] > 65 && $cage[$c] <= 75)
    {
        $agesh[] = 'อายุ : 66-75 ปี';
    }
    else if($cage[$c] > 75 && $cage[$c] <= 85)
    {
        $agesh[] = 'อายุ : 76-85 ปี';
    }
    else if($cage[$c] > 85 && $cage[$c] <= 95)
    {
        $agesh[] = 'อายุ : 86-95 ปี';
    }else{
        $agesh[] = 'อายุ : 96 ปีขึ้นไป';
    }
    
    $id++;
    // echo "<br>";
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