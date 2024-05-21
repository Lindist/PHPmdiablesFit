<?php

require('dbconnect.php');
// $detail_id = $_GET["detail_id"];
$user_id = $_GET["user_id"];

if(isset($_GET['admin']))
{
    $admin = $_GET['admin'];
}else
{
    $admin = 0;
}

$sql = "SELECT * FROM tb_detail WHERE id = $user_id";
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
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
        }
    </style>
</head>
<body class="p-3 mb-2 bg-gray-100">
    <div class="container mx-auto overflow-x-auto p-6 bg-white rounded shadow-md">
        <!-- <div align = "right">
            <a href="http://localhost:8080/PHPmdiablesFit/logout.php" target="_self" class="bg-red-500 text-white rounded inline-block p-2">Logout</a>
        </div> -->
        <h2 class="text-center text-2xl font-bold">แบบฟอร์มแก้ไขข้อมูล Detail</h2>
        <hr class="my-4">
        <form action="updateData.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="admin_id" value="<?php echo $admin; ?>">

        <input type="hidden" value="<?php echo $row["detail_id"]; ?>" name="detail_id"> <!-- hide id -->

        <!-- <div class="mb-4">
                <label for="id" class="block font-medium text-gray-700">id</label>
                <select name="id" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1">
                    <option value="<?php //echo $row["id"]; ?>"><?php //echo $row["id"]; ?></option>
                    <?php
                       // for($i = 0; $i < $count; $i++) {
                            //$rowm = mysqli_fetch_array($result_member, MYSQLI_BOTH);
                            //echo "<option value=".$rowm["id"].">$rowm[0]</option>";
                        //}
                    ?>
                </select>
            </div> -->
            <div class="mb-4">
                <label for="detail_date" class="block font-medium text-gray-700">ว/ด/ป เกิด</label>
                <input type="date" name="detail_date" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_date"]; ?>">
            </div>
            <div class="mb-4">
                <label for="detail_address" class="block font-medium text-gray-700">ที่อยู่</label>
                <input type="text" name="detail_address" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_address"]; ?>">
            </div>
            <div class="mb-4">
                <label for="detail_idp" class="block font-medium text-gray-700">บปชช</label>
                <input type="text" name="detail_idp" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_idp"]; ?>">
            </div>
            <div class="mb-4">
                <label for="detail_tel" class="block font-medium text-gray-700">เบอร์โทร</label>
                <input type="text" name="detail_tel" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_tel"]; ?>">
            </div>
            <div class="mb-4">
                <label for="detail_occ" class="block font-medium text-gray-700">อาชีพ</label>
                <input type="text" name="detail_occ" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_occ"]; ?>">
            </div>
            <div class="mb-4">
                <label for="detail_salary" class="block font-medium text-gray-700">รายได้</label>
                <input type="text" name="detail_salary" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_salary"]; ?>">
            </div>
            <div class="mb-4">
                <label for="detail_type" class="block font-medium text-gray-700">ประเภทความพิการ</label>
                <input type="text" name="detail_type" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_type"]; ?>">
            </div>

            <style>
                .answer {
                    display: none;
                }
                .question:has(input[type="checkbox"][value="1"]:checked) ~ .answer {
                    display: block;
                }
            </style>

            <div class="question mb-3 flex items-center">
                <label for="detail_care" class="font-medium text-gray-700 mr-2">Do you have a coupon?</label>
                <?php
                if ($row['detail_care'] == "Yes") {
                    echo '<input class="form-checkbox h-6 w-6" type="checkbox" name="detail_care" value="1" checked>';
                } else {
                    echo '<input class="form-checkbox h-6 w-6" type="checkbox" name="detail_care" value="1">';
                }
                ?>
            </div>

            <div class="answer mb-4">
                <label for="detail_care_name" class="block font-medium text-gray-700">ชื่อผู้ดูแล</label>
                <input type="text" name="detail_care_name" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_care_name"]; ?>">
            </div>

            <div class="answer mb-4">
                <label for="detail_care_lastname" class="block font-medium text-gray-700">นามสกุลผู้ดูแล</label>
                <input type="text" name="detail_care_lastname" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_care_lastname"]; ?>">
            </div>

            <div class="answer mb-4">
                <label for="detail_care_tel" class="block font-medium text-gray-700">เบอร์โทรผู้ดูแล</label>
                <input type="text" name="detail_care_tel" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_care_tel"]; ?>">
            </div>

            <div class="answer mb-4">
                <label for="detail_line" class="block font-medium text-gray-700">ไลน์ผู้ดูแล</label>
                <input type="text" name="detail_line" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_line"]; ?>">
            </div>

            <div class="answer mb-4">
                <label for="detail_facebook" class="block font-medium text-gray-700">เฟซบุ๊คผู้ดูแล</label>
                <input type="text" name="detail_facebook" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["detail_facebook"]; ?>">
            </div>

            <div class="flex items-center space-x-2 mt-4">
                <input type="submit" value="บันทึกข้อมูล" class="bg-green-500 text-white rounded inline-block p-2">
                <input type="reset" value="ล้างข้อมูล" class="bg-red-500 text-white rounded inline-block p-2">
                <a href="homeuser_detail.php?user_id=<?php echo $user_id ?>" class="bg-blue-500 text-white rounded inline-block p-2">กลับหน้าแรก</a>
            </div>
        </form>
    </div>
</body>
</html>