<?php

require('dbconnect.php');

$sql = "SELECT * FROM tb_member ORDER BY id ASC";
$result = mysqli_query($connect, $sql);

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=database_disables", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        let table = new DataTable('#myTable', {
            responsive: true
        });
    </script>
  </head>
  <body>
    <table class="display" id="myTable">
    <thead>
        <tr class="">
            <th class="">ไอดี</th>
            <th class="">ชื่อจริง</th>
            <th class="">นามสกุล</th>
            <th class="">อายุ</th>
            <th class="">เพศ</th>
            <th class="">เบอร์โทรศัพท์</th>
        </tr>
    </thead>
    <tbody>
<?php
    // $stmt = $conn->query("SELECT * FROM tb_member");
    // $stmt->execute();

    // $users = $stmt->fetchAll();
    // foreach ($users as $user) {
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
?>
        <tr>
            <!-- <td class=""><?php echo $user["id"]?></td>
            <td><?php echo $user["firstname"] ?></td>
            <td><?php echo $user["lastname"] ?></td>
            <td><?php echo $user["age"] ?></td>
            <td><?php echo $user["gender"] ?></td>
            <td><?php echo $user["number"] ?></td> -->
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["firstname"] ?></td>
            <td><?php echo $row["lastname"] ?></td>
            <td><?php echo $row["age"] ?></td>
            <td><?php echo $row["gender"] ?></td>
            <td><?php echo $row["number"] ?></td>
        </tr>
<?php
    }
?>
    </tbody>
    </table>
  </body>
</html>