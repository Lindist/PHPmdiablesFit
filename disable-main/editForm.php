<?php

require('dbconnect.php');
$detail_id = $_GET["detail_id"];
$user_id = $_GET["user_id"];

if(isset($_GET['admin']))
{
    $admin = $_GET['admin'];
}else
{
    $admin = 0;
}

$sql = "SELECT * FROM tb_detail WHERE detail_id = $detail_id";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

?>
<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
$conn = new PDO("mysql:host=$servername;dbname=database_disables", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
$all = $conn->query("SELECT * FROM tb_member");

$all->execute();
$data = array();

while($row1 = $all->fetch(PDO::FETCH_ASSOC))
{
    $data[] = $row1['id'];
}
$value=0;

require('dbconnect.php');
$all1 = "SELECT * FROM tb_detail";
$result1 = mysqli_query($connect, $all1);
$data1 = array();

while($row2 = mysqli_fetch_assoc($result1))
{
     $data1[] = $row2['id'];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAclJREFUSEvFlutRxDAMhH2dQCVAJUAlQCVAJdAJdAL33Xg9iiPJTgYm/pN7RF7t6nkqB53TQbhlD/BVKeW2lMLzuzrO83MLiVlgQB5KKU/J5QJ/MQ6Fr4+AZwD7y+XAY6ZABgzoR5V0i4p6FwfuIvYRMKBfAzTFl3ejwzswX8U/AoYpCRQd4vhc/+Q5iv11f5EH/FoTaTZEM+q8Vebtzh4YlrAdHWIn+WZsVpL3wBFbDG0s+Y7c/HY/mYA4isOX0wOTUF6yKDup5Rsn/jjyfrZFUlWDV2Yt1hY4k6x3kMvlIKDKcIFFydlCZC+EDVJ7R4yQK2qNajaZ9JQWqiykzoCtMzjRl8eo/GTfytAyHtWjjD3gKDd69Q5j7ALP1CMMVs2gdrGse4k5IbokopV6pgNhI2McVUbP2ja8vkxGSWKbgDqcmsLIdqGUV5/ZVGoxOg+Gn8pYGT6qCttm3dUnGxKS2YKoRDK5h0OCGEYLgJoIZWdllfxROXrlFy57mff9wMBZ7zdl8kLiaEjYgv+L1cfdPrzp1HeaPcsed9gNxW3+oy1TRjhAgyCpomNHYz+tVjazwNYBPmsf01L/bwt9QnTfX1sZ70NxrH4Bd3txH4SHrqIAAAAASUVORK5CYII=">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูล</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
        }
    </style>
</head>
<body class="p-3 mb-2 bg-dark text-white">
    <div class="container my-3">
        <div align = "right">
            <a href="http://localhost:8080/PHPmdiablesFit/logout.php" target="_self" class="btn btn-danger">Logout</a>

        </div>
        <h2 class="text-center">แบบฟอร์มแก้ไขข้อมูล</h2>
        <hr>
        <form action="updateData.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="admin_id" value="<?php echo $admin; ?>">

        <input type="hidden" value="<?php echo $row["detail_id"]; ?>" name="detail_id"> <!-- hide id -->

            <div class="form-group">
                <label for="team_name">ชื่อทีม</label>
                <input type="text" name="team_name" class="form-control" value="<?php echo $row["team_name"]; ?>">
            </div>
            
            <div class="form-group">
                <label for="detail_date">ว/ด/ป เกิด</label>
                <input type="date" name="detail_date" class="form-control" value="<?php echo $row["detail_date"]; ?>">
            </div>
            <div class="form-group">
                <label for="detail_address">ที่อยู่</label>
                <input type="text" name="detail_address" class="form-control" value="<?php echo $row["detail_address"]; ?>">
            </div>
            <div class="form-group">
                <label for="detail_idp">บปชช</label>
                <input type="text" name="detail_idp" class="form-control" value="<?php echo $row["detail_idp"]; ?>">
            </div>
            <div class="form-group">
                <label for="detail_tel">เบอร์โทร</label>
                <input type="text" name="detail_tel" class="form-control" value="<?php echo $row["detail_tel"]; ?>">
            </div>
            <div class="form-group">
                <label for="detail_occ">อาชีพ</label>
                <input type="text" name="detail_occ" class="form-control" value="<?php echo $row["detail_occ"]; ?>">
            </div>
            <div class="form-group">
                <label for="detail_salary">รายได้</label>
                <input type="text" name="detail_salary" class="form-control" value="<?php echo $row["detail_salary"]; ?>">
            </div>
            <div class="form-group">
                <label for="detail_type">ประเภทความพิการ</label>
                <input type="text" name="detail_type" class="form-control" value="<?php echo $row["detail_type"]; ?>">
            </div>
            <style>
            .answer{
                    display:none;
                    }
                    .question:has(input[type="checkbox"][value="1"]:checked) ~ .answer {
                    display:block
                    }
            .coupon_question{
                padding: 10px;
                margin-top: 5px;
            }
            </style>

            <div class="question my-1">
                <label for="detail_care" class="fs-5">คุณมีผู้แลรึเปล่า?</label>
                <?php
                if ($row['detail_care'] == "ใช่") {
                    echo '<input class="coupon_question form-check-input scale-1 mx-1" type="checkbox" name="detail_care" value="1" checked>';
                } else {
                    echo '<input class="coupon_question form-check-input scale-1 mx-1" type="checkbox" name="detail_care" value="1">';
                }
                ?>
            </div>

            <div class="answer">
                <label for="detail_care_name">ชื่อผู้ดูแล</label>
                <input type="text" name="detail_care_name" class="form-control" value="<?php echo $row["detail_care_name"]; ?>">
            </div>

            <div class="answer">
                <label for="detail_care_lastname">นามสกุลผู้ดูแล</label>
                <input type="text" name="detail_care_lastname" class="form-control" value="<?php echo $row["detail_care_lastname"]; ?>">
            </div>

            <div class="answer">
                <label for="detail_care_tel">เบอร์โทรผู้ดูแล</label>
                <input type="text" name="detail_care_tel" class="form-control" value="<?php echo $row["detail_care_tel"]; ?>">
            </div>

            <div class="answer">
                <label for="detail_line">ไลน์ผู้ดูแล:</label>
                <input type="text" name="detail_line" class="form-control" value="<?php echo $row["detail_line"]; ?>">
            </div>

            <div class="answer">
                <label for="detail_facebook">เฟซบุ๊คผู้ดูแล</label>
                <input type="text" name="detail_facebook" class="form-control" value="<?php echo $row["detail_facebook"]; ?>">
            </div>
            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger ml-2">
            <a href="index.php?user_id= <?php echo $user_id ?>" class="btn btn-primary ml-2">กลับหน้าแรก</a>
        </form>
    </div>
</body>
</html>