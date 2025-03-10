<?php

session_start();
if (!isset($_SESSION['user_login']) && !isset($_SESSION['admin_login'])) {
  header("Location: ../index.php");
  exit();
}

require('dbconnect.php');
$id = $_GET["user_id"];

$sql = "SELECT * FROM tb_member WHERE id = $id";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

if(isset($_GET['ida'])) {
    $ida = $_GET['ida'];
} else {
    $ida = $id;
}
if(isset($_GET['admin_id'])) {
    $admin_id = $_GET['admin_id'];
}
$sqlu = "SELECT * FROM tb_member WHERE id LIKE '%$ida%' ORDER BY id ASC";
$resultu = mysqli_query($connect, $sqlu);
$rowu = mysqli_fetch_array($resultu, MYSQLI_BOTH);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAclJREFUSEvFlutRxDAMhH2dQCVAJUAlQCVAJdAJdAL33Xg9iiPJTgYm/pN7RF7t6nkqB53TQbhlD/BVKeW2lMLzuzrO83MLiVlgQB5KKU/J5QJ/MQ6Fr4+AZwD7y+XAY6ZABgzoR5V0i4p6FwfuIvYRMKBfAzTFl3ejwzswX8U/AoYpCRQd4vhc/+Q5iv11f5EH/FoTaTZEM+q8Vebtzh4YlrAdHWIn+WZsVpL3wBFbDG0s+Y7c/HY/mYA4isOX0wOTUF6yKDup5Rsn/jjyfrZFUlWDV2Yt1hY4k6x3kMvlIKDKcIFFydlCZC+EDVJ7R4yQK2qNajaZ9JQWqiykzoCtMzjRl8eo/GTfytAyHtWjjD3gKDd69Q5j7ALP1CMMVs2gdrGse4k5IbokopV6pgNhI2McVUbP2ja8vkxGSWKbgDqcmsLIdqGUV5/ZVGoxOg+Gn8pYGT6qCttm3dUnGxKS2YKoRDK5h0OCGEYLgJoIZWdllfxROXrlFy57mff9wMBZ7zdl8kLiaEjYgv+L1cfdPrzp1HeaPcsed9gNxW3+oy1TRjhAgyCpomNHYz+tVjazwNYBPmsf01L/bwt9QnTfX1sZ70NxrH4Bd3txH4SHrqIAAAAASUVORK5CYII=">
    <title>แบบฟอร์มแก้ไขข้อมูลผู้ใช้งาน</title>
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

        <h2 class="text-center text-2xl font-bold">แบบฟอร์มแก้ไขข้อมูลผู้ใช้งาน</h2>
        <hr class="my-4">
        <form action="edit_member.php" method="POST">

            <input type="hidden" value="<?php echo $row["id"]; ?>" name="id"> <!-- hide id -->
            <input type="hidden" value="<?php echo $ida; ?>" name="ida">
            <input type="hidden" value="<?php echo $admin_id; ?>" name="admin_id">
            <div class="mb-4">
                <label for="firstname" class="block font-medium text-gray-700">ชื่อจริง</label>
                <input type="text" name="firstname" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["firstname"]; ?>">
            </div>
            <div class="mb-4">
                <label for="lastname" class="block font-medium text-gray-700">นามสกุล</label>
                <input type="text" name="lastname" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["lastname"]; ?>">
            </div>
            <div class="mb-4">
                <label for="age" class="block font-medium text-gray-700">อายุ</label>
                <input type="text" name="age" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["age"]; ?>">
            </div>
            <div class="mb-4">
                <label for="gender" class="block font-medium text-gray-700">เพศ</label>
                <div class="form-check form-check-inline mb-3">
                <?php
                $gender_arr = array("ชาย","หญิง","อื่นๆ");
                $gender_thai = "";
                foreach($gender_arr as $value)
                {
                    if($value == "ชาย")
                    {
                        $gender_thai = "ชาย";
                    }
                    else if($value == "หญิง")
                    {
                        $gender_thai = "หญิง";
                    }
                    else{
                        $gender_thai = "อื่นๆ";
                    }
                    if($value == $row["gender"])
                    {
                        echo "<input class='form-check-input mx-1' type='radio' name='gender' aria-describedby='gender' value='$value' checked >";
                        echo "<label for='gender' class='form-check-label'>$gender_thai</label>";
                    }
                    else{
                        echo "<input class='form-check-input mx-1' type='radio' name='gender' aria-describedby='gender' value='$value'>";
                        echo "<label for='gender' class='form-check-label'>$gender_thai</label>";
                    }
                }
                
                ?>
                </div>
            </div>

            <div class="mb-4">
                <label for="number" class="block font-medium text-gray-700">เบอร์โทรศัพท์</label>
                <input type="text" name="number" class="mt-1 p-2 bg-white text-1xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" value="<?php echo $row["number"]; ?>">
            </div>

            <div class="flex items-center space-x-2 mt-4">
                <input type="submit" value="บันทึกข้อมูล" class="bg-green-500 text-white rounded inline-block p-2">
                <input type="reset" value="ล้างข้อมูล" class="bg-red-500 text-white rounded inline-block p-2">
                <?php
                
                if ($rowu["urole"] == 'admin') {
                    // echo "admin";
                    echo '<a href="member_tb.php?admin_id=' .$ida. '" class="bg-blue-500 text-white rounded inline-block p-2">กลับหน้าแรก</a>';
                } else {
                    // echo "user";
                    echo '<a href="homeuser_member.php?user_id=' .$ida. '" class="bg-blue-500 text-white rounded inline-block p-2">กลับหน้าแรก</a>';
                }
                ?>
            </div>
        </form>
    </div>
</body>
</html>
