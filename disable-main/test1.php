<?php
// เชื่อมต่อฐานข้อมูล
$con = mysqli_connect("localhost", "root", "", "database_disables");

// ตรวจสอบการเชื่อมต่อ
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query เพื่อดึงจำนวนสมาชิกแยกตามเพศ
$query = "SELECT detail_occ, count(*) AS count FROM tb_detail GROUP BY detail_occ";
$result = $con->query($query);

if ($result) {
    // แสดงข้อมูลในรูปแบบตาราง
    echo "<table border='1'>";
    echo "<tr><th>ประเภท</th><th>จำนวน</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["detail_occ"] . "</td>";
        echo "<td>" . $row["count"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error: " . $con->error;
}

// ปิดการเชื่อมต่อ
// $con->close();
?>
