<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
$conn = new PDO("mysql:host=$servername;dbname=database_disables", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "Connected successfully";
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
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
$value=0;

require('dbconnect.php');
$all1 = "SELECT * FROM tb_detail";
$result = mysqli_query($connect, $all1);
$data1 = array();

while($row = mysqli_fetch_assoc($result))
{
    // echo "<input type='hidden'  name='Id' value= '$row[id]' id='Id'>";
    // echo "<script src='arr.js'></script>";
     $data1[] = $row['id'];

}
$arr1=implode(",",$data1);

<<<<<<< HEAD
$id = $_GET['user_id'];
if(isset($_GET['admin']))
{
    $admin = $_GET['admin'];
}
=======
// $id = $_GET['user_id'];
>>>>>>> 98cb16c43b8101f787a706c912333f97453ff513

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
        }
    </style>
</head>
<body class="p-3 mb-2">
    <div class="container my-3">
        <div align = "right">
            <a href="http://localhost:8080/PHPmdiablesFit/logout.php" target="_self" class="btn btn-danger">Logout</a>

        </div>
        <h2 class="text-center">แบบฟอร์มเพิ่มข้อมูล</h2>
        <hr>
        <form action="insertData.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <input type="hidden" name="admin_id" value="<?php echo $admin; ?>">
            <div class="form-group">
                <label for="team_name">ชื่อทีม</label>
                <input type="text" name="team_name" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="detail_date">ว/ด/ป เกิด</label>
                <input type="date" name="detail_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="detail_address">ที่อยู่</label>
                <input type="text" name="detail_address" class="form-control">
            </div>
            <div class="form-group">
                <label for="detail_idp">บปชช</label>
                <input type="text" name="detail_idp" class="form-control">
            </div>
            <div class="form-group">
                <label for="detail_tel">เบอร์โทร</label>
                <input type="text" name="detail_tel" class="form-control">
            </div>
            <div class="form-group">
                <label for="detail_occ">อาชีพ</label>
                <input type="text" name="detail_occ" class="form-control">
            </div>
            <div class="form-group">
                <label for="detail_salary">รายได้</label>
                <input type="text" name="detail_salary" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="detail_type">ประเภทความพิการ</label>
                <input type="text" name="detail_type" class="form-control">
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
                <input class="coupon_question form-check-input scale-1 mx-1" type="checkbox" name="detail_care" value="1" checked>
            </div>

            <div class="answer">
                <label for="detail_care_name">ชื่อผู้ดูแล</label>
                <input type="text" name="detail_care_name" class="form-control">
            </div>

            <div class="answer">
                <label for="detail_care_lastname">นามสกุลผู้ดูแล</label>
                <input type="text" name="detail_care_lastname" class="form-control">
            </div>

            <div class="answer">
                <label for="detail_care_tel">เบอร์โทรผู้ดูแล</label>
                <input type="text" name="detail_care_tel" class="form-control">
            </div>

            <div class="answer">
                <label for="detail_line">ไลน์ผู้ดูแล:</label>
                <input type="text" name="detail_line" class="form-control">
            </div>

            <div class="answer">
                <label for="detail_facebook">เฟซบุ๊คผู้ดูแล</label>
                <input type="text" name="detail_facebook" class="form-control">
            </div>

            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger ml-2">
            <a href="index.php?user_id= <?php echo $id ?>" class="btn btn-primary ml-2">กลับหน้าแรก</a>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>