<?php 
session_start();
require('dbconnect.php');
if(isset($_GET['user_id']))
{
    $user_id = $_GET['user_id'];
}

$id = $user_id;

$sql = "SELECT * FROM tb_member WHERE id LIKE '%$id%' ORDER BY id ASC";
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
    <link rel="shortcut icon" type="x-icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAclJREFUSEvFlutRxDAMhH2dQCVAJUAlQCVAJdAJdAL33Xg9iiPJTgYm/pN7RF7t6nkqB53TQbhlD/BVKeW2lMLzuzrO83MLiVlgQB5KKU/J5QJ/MQ6Fr4+AZwD7y+XAY6ZABgzoR5V0i4p6FwfuIvYRMKBfAzTFl3ejwzswX8U/AoYpCRQd4vhc/+Q5iv11f5EH/FoTaTZEM+q8Vebtzh4YlrAdHWIn+WZsVpL3wBFbDG0s+Y7c/HY/mYA4isOX0wOTUF6yKDup5Rsn/jjyfrZFUlWDV2Yt1hY4k6x3kMvlIKDKcIFFydlCZC+EDVJ7R4yQK2qNajaZ9JQWqiykzoCtMzjRl8eo/GTfytAyHtWjjD3gKDd69Q5j7ALP1CMMVs2gdrGse4k5IbokopV6pgNhI2McVUbP2ja8vkxGSWKbgDqcmsLIdqGUV5/ZVGoxOg+Gn8pYGT6qCttm3dUnGxKS2YKoRDK5h0OCGEYLgJoIZWdllfxROXrlFy57mff9wMBZ7zdl8kLiaEjYgv+L1cfdPrzp1HeaPcsed9gNxW3+oy1TRjhAgyCpomNHYz+tVjazwNYBPmsf01L/bwt9QnTfX1sZ70NxrH4Bd3txH4SHrqIAAAAASUVORK5CYII=">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disable</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-3 mb-2">
    <div class="container">
        <!-- <div align = "right">
            <a href="http://localhost:8080/PHPmdiablesFit/logout.php" target="_self" class="btn btn-danger">Logout</a>
        </div> -->
        <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxs-layer icon"></i>
        <div class="logo_name">User</div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <ul class="nav-list">
        <li>
          <a href="homeuser.php?user_id=<?php echo $user_id; ?>">
            <i class="bx bx-user"></i>
            <span class="links_name">User</span>
          </a>
          <span class="tooltip">User</span>
        </li>
        <li>
          <a href="index.php?user_id=<?php echo $user_id; ?>">
          <i class='bx bx-table'></i>
            <span class="links_name">main</span>
          </a>
          <span class="tooltip">main</span>
        </li>
        <!-- <li>
          <a href="insertForm.php?user_id=<?php //echo $user_id; ?>">
          <i class='bx bx-table'></i>
            <span class="links_name">insertForm</span>
          </a>
          <span class="tooltip">insertForm</span>
        </li>
        <li>
          <a href="editForm.php?user_id=<?php //echo $user_id; ?>">
          <i class='bx bx-table'></i>
            <span class="links_name">editForm</span>
          </a>
          <span class="tooltip">editForm</span>
        </li> -->
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="links_name">Setting</span>
          </a>
          <span class="tooltip">Setting</span>
        </li>
        <li class="profile">
          <div class="profile-details">
            <img src="https://i.pinimg.com/564x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg" alt="profileImg" />
            <div class="name_job">
              <div class="name">user</div>
              <div class="job">userinterface</div>
            </div>
          </div>
          <i class="bx bx-log-out" id="log_out" onclick="Logout();"></i>
        </li>
      </ul>
    </div>
    <section class="home-section">
        <div class = "container mx-auto overflow-x-auto p-6 bg-white rounded shadow-md">
        <h1 class="text-center text-2xl font-bold">User</h1>
        <h1 class="text-center">Disable Table</h1>
        <hr>
        <div class="container mb-2">
            <!-- <form action="searchData.php" class="d-flex" method="POST">
                <input type="hidden" name="user_id" value="<?php //echo $user_id; ?>">
                <input class="form-control me-2" type="search" name="tname" placeholder="ป้อนชื่อทีม">
                <button class="btn btn-outline-info ml-1" type="send">Search</button>
            </form> -->
        </div>
        <?php if ($count>0) { ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><center>detail_id</th>
                    <!-- <th><center>team_name</th> -->
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
                    <!-- <th><center>ดูว่ามีผู้ดูแลมั้ย</center></th> -->
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) { ?>
                <tr>
                    <!-- <td><center><?php //echo $order++ ?></td> -->
                    <td><center><?php echo $row["detail_id"] ?></td>
                    <!-- <td><center><?php echo $row["team_name"] ?></td> -->
                    <td><center><?php echo $row["id"]?></td>
                    <td><center><?php echo $row["detail_date"] ?></td>
                    <td><center><?php echo $row["detail_address"] ?></td>
                    <td><center><?php echo $row["detail_idp"] ?></td>
                    <td><center><?php echo $row["detail_tel"] ?></td>
                    <td><center><?php echo $row["detail_occ"] ?></td>
                    <td><center><?php echo $row["detail_salary"] ?></td>
                    <td><center><?php echo $row["detail_type"] ?></td>
                    <td><center>
                        <a href="editForm.php?detail_id=<?php echo $row["detail_id"]; ?>&user_id=<?php echo $user_id; ?>&admin=0" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td><center>
                        <a href="deleteQueryString.php?detail_id=<?php echo $row["detail_id"]; ?>&user_id=<?php echo $user_id; ?>&admin=0" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')"><i class="fa-solid fa-trash"></i></a>
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
        </div>
        </section>
        <script src="logout.js"></script>
        <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");
        // let log_out = document.querySelector("#log_out");

        closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();//calling the function(optional)
        });

        searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
        if(sidebar.classList.contains("open")){
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
        }else {
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
        }
        }
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>