<?php
$con = mysqli_connect("localhost", "root", "", "database_disables");

// Query เพื่อดึงจำนวนสมาชิกแยกตามเพศ
$query = "SELECT gender, count(*) AS gender from tb_member GROUP BY gender";
$result = $con->query($query);

// Query เพื่อดึงข้อมูลทั้งหมดจากตาราง tb_member แยกตามเพศ
$stmt = $con->query("SELECT * FROM tb_member GROUP BY gender");
while ($row1 = mysqli_fetch_array($stmt)) {
    // echo $row1["gender"] . " | ";
}

// echo "<br>";

// Print out result
while ($row = mysqli_fetch_array($result)) {
    // echo $row['gender'] . "--";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
        }
    </style>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>