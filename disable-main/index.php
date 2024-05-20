<?php 

require('dbconnect.php');
if(isset($_GET['user_id']))
{
    $user_id = $_GET['user_id'];
}

$sql = "SELECT * FROM tb_detail ORDER BY detail_id ASC";
$result = mysqli_query($connect, $sql);

$count = mysqli_num_rows($result);
$order = 1;

?>

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

while($row2 = $all->fetch(PDO::FETCH_ASSOC))
{
     $data[] = $row2['id'];

}
// $arr=implode(",",$data);
$value = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="p-3 mb-2">
    <div class="container">
        <div align = "right">
            <a href="http://localhost:8080/PHPmdiablesFit/logout.php" target="_self" class="btn btn-danger">Logout</a>
        </div>
        <h1 class="text-center">Disable Table</h1>
        <hr>
        <div class="container mb-2">
            <form action="searchData.php" class="d-flex" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input class="form-control me-2" type="search" name="tname" placeholder="ป้อนชื่อทีม">
                <button class="btn btn-outline-info ml-1" type="send">Search</button>
            </form>
        </div>
        <?php if ($count>0) { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><center>detail_id</th>
                    <th><center>team_name</th>
                    <th><center>id</th>
                    <th><center>detail_date</th>
                    <th><center>detail_address</th>
                    <th><center>detail_idp</th>
                    <th><center>detail_tel</th>
                    <th><center>detail_occ</th>
                    <th><center>detail_salary</th>
                    <th><center>detail_type</th>
                    <th><center>แก้ไข</th>
                    <th><center>ลบ</th>
                    <th><center>ดูว่ามีผู้ดูแลมั้ย</center></th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) { ?>
                <tr>
                    <!-- <td><center><?php //echo $order++ ?></td> -->
                    <td><center><?php echo $row["detail_id"] ?></td>
                    <td><center><?php echo $row["team_name"] ?></td>
                    <td><center><?php echo $row["id"]?></td>
                    <td><center><?php echo $row["detail_date"] ?></td>
                    <td><center><?php echo $row["detail_address"] ?></td>
                    <td><center><?php echo $row["detail_idp"] ?></td>
                    <td><center><?php echo $row["detail_tel"] ?></td>
                    <td><center><?php echo $row["detail_occ"] ?></td>
                    <td><center><?php echo $row["detail_salary"] ?></td>
                    <td><center><?php echo $row["detail_type"] ?></td>
                    <td><center>
                        <a href="editForm.php?detail_id=<?php echo $row["detail_id"]; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td><center>
                        <a href="deleteQueryString.php?detail_id=<?php echo $row["detail_id"]; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php for($i=0;$i<count($data);$i++) { ?>
                        <?php if($data[$i] == $row["id"]) { ?>
                            <?php $value++; ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <div class="alert alert-danger" role="alert">
                <b><center>ไม่มีข้อมูล!!<center><b>
            </div>
        <?php } ?>  

        <?php if($value == 0) { ?>
            <a href="insertForm.php?user_id=<?php echo $user_id; ?>" class="btn btn-success">เพิ่มข้อมูล</a>
            <?php } else { $value = 0; } ?>
            
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>