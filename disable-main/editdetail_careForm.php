<?php

require('dbconnect.php');

$id = $_GET["user_id"];

$sql = "SELECT * FROM tb_detail WHERE id = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);

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
        <h2 class="text-center text-2xl font-bold">แบบฟอร์มแก้ไขข้อมูลผู้ดูแล</h2>
        <hr class="my-4">
        <form action="update_detail.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="hidden" value="<?php echo $row["detail_id"]; ?>" name="detail_id"> <!-- hide id -->

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
 
            <div class="flex items-center space-x-2 mt-4">
                <input type="submit" value="บันทึกข้อมูล" class="bg-green-500 text-white rounded inline-block p-2">
                <input type="reset" value="ล้างข้อมูล" class="bg-red-500 text-white rounded inline-block p-2">
                
                <a href="homeuser_detail_2.php?user_id=<?php echo $id; ?>" class="bg-blue-500 text-white rounded inline-block p-2">กลับหน้าแรก</a>

            </div>
        </form>
    </div>
</body>
</html>