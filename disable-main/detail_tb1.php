<?php

session_start();
if (!isset($_SESSION['admin_login'])) {
  header("Location: ../index.php");
  exit();
}

require('dbconnect.php');
$sql = "SELECT * FROM tb_detail ORDER BY detail_id ASC";
$result = mysqli_query($connect, $sql);

$count = mysqli_num_rows($result);
$order = 1;
$btn = 0;
$btn2 = 0;

require('connect.php');
if (isset($_GET['admin_id'])) {
  $ida = $_GET['admin_id'];
} else {
}


$sqlu = "SELECT * FROM tb_member WHERE id LIKE '%$ida%' ORDER BY id ASC";
$resultu = mysqli_query($connect, $sqlu);
$rowu = mysqli_fetch_array($resultu, MYSQLI_BOTH);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="x-icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAclJREFUSEvFlutRxDAMhH2dQCVAJUAlQCVAJdAJdAL33Xg9iiPJTgYm/pN7RF7t6nkqB53TQbhlD/BVKeW2lMLzuzrO83MLiVlgQB5KKU/J5QJ/MQ6Fr4+AZwD7y+XAY6ZABgzoR5V0i4p6FwfuIvYRMKBfAzTFl3ejwzswX8U/AoYpCRQd4vhc/+Q5iv11f5EH/FoTaTZEM+q8Vebtzh4YlrAdHWIn+WZsVpL3wBFbDG0s+Y7c/HY/mYA4isOX0wOTUF6yKDup5Rsn/jjyfrZFUlWDV2Yt1hY4k6x3kMvlIKDKcIFFydlCZC+EDVJ7R4yQK2qNajaZ9JQWqiykzoCtMzjRl8eo/GTfytAyHtWjjD3gKDd69Q5j7ALP1CMMVs2gdrGse4k5IbokopV6pgNhI2McVUbP2ja8vkxGSWKbgDqcmsLIdqGUV5/ZVGoxOg+Gn8pYGT6qCttm3dUnGxKS2YKoRDK5h0OCGEYLgJoIZWdllfxROXrlFy57mff9wMBZ7zdl8kLiaEjYgv+L1cfdPrzp1HeaPcsed9gNxW3+oy1TRjhAgyCpomNHYz+tVjazwNYBPmsf01L/bwt9QnTfX1sZ70NxrH4Bd3txH4SHrqIAAAAASUVORK5CYII=">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="style.css">
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
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
    let table = new DataTable('#myTable', {
      responsive: true
    });
  </script>
</head>

<body class="">
  <div class="sidebar">
    <div class="logo-details">
      <i class="bx bxs-layer icon"></i>
      <div class="logo_name">Admin</div>
      <i class="bx bx-menu  checkbtn" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="homeadmin.php?admin_id=<?php echo $ida; ?>">
          <i class="bx bx-user"></i>
          <span class="links_name">Admin</span>
        </a>
        <span class="tooltip">Admin</span>
      </li>
      <li>
        <a href="member_tb.php?admin_id=<?php echo $ida; ?>">
          <i class='bx bx-table'></i>
          <span class="links_name">ตารางผู้ใช้</span>
        </a>
        <span class="tooltip">ตารางผู้ใช้</span>
      </li>
      <li>
        <a href="detail_tb1.php?admin_id=<?php echo $ida; ?>">
          <i class='bx bx-table'></i>
          <span class="links_name">ตารางผู้พิการ</span>
        </a>
        <span class="tooltip">ตารางผู้พิการ</span>
      </li>
      <li>
        <a href="detail_tb2.php?admin_id=<?php echo $ida; ?>">
          <i class='bx bx-table'></i>
          <span class="links_name">ตารางผู้ดูแล</span>
        </a>
        <span class="tooltip">ตารางผู้ดูแล</span>
      </li>
      <li>
        <a href="tb_countshowup.php?admin_id=<?php echo $ida; ?>">
          <i class="bx bx-table"></i>
          <span class="links_name">ตารางจำนวนข้อมูล</span>
        </a>
        <span class="tooltip">ตารางจำนวนข้อมูล</span>
      </li>
      <li class="profile">
        <div class="profile-details">
          <!-- <img src="https://i.pinimg.com/564x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg" alt="profileImg" /> -->
          <div class="name_job">
            <div class="name"><?php echo $rowu["urole"] ?></div>
            <div class="job"><?php echo "Name : " . $rowu["firstname"] . " " . $rowu["lastname"] ?></div>
          </div>
        </div>
        <i class="bx bx-log-out" id="log_out" onclick="Logout();"></i>
      </li>
    </ul>
  </div>
  <section class="home-section p-3 bg-slate-200">
    <div class="container mx-auto overflow-x-auto p-6 bg-white rounded shadow-md">
      <h1 class="text-center text-2xl font-medium">ตารางผู้พิการ</h1>
      <hr class="my-4">
      <!-- <div class="mb-3">
            <form action="searchData.php" class="flex space-x-2" method="POST">
                <input class="flex-grow p-2 border border-gray-300 rounded" type="search" name="tname" placeholder="ป้อนชื่อทีม">
                <button class="rounded p-2 bg-blue-500 text-white" type="submit">Search</button>
            </form>
        </div> -->
      <?php if ($count > 0) { ?>
        <div class="overflow-x-auto">
          <table class="table-auto w-full border-collapse border border-gray-300" id="myTable">
            <thead>
              <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2 text-center">detail_id</th>
                <th class="border border-gray-300 px-4 py-2 text-center">id</th>
                <th class="border border-gray-300 px-4 py-2 text-center">ว/ด/ป เกิด</th>
                <th class="border border-gray-300 px-4 py-2 text-center">ที่อยู่</th>
                <th class="border border-gray-300 px-4 py-2 text-center">รหัสบัตรประชาชน</th>
                <th class="border border-gray-300 px-4 py-2 text-center">อาชีพ</th>
                <th class="border border-gray-300 px-4 py-2 text-center">รายได้ ต่อเดือน</th>
                <th class="border border-gray-300 px-4 py-2 text-center">ประเภทความพิการ</th>
                <th class="border border-gray-300 px-4 py-2 text-center">ไลน์</th>
                <th class="border border-gray-300 px-4 py-2 text-center">เฟซบุ๊ค</th>
                <th class="border border-gray-300 px-4 py-2 text-center">แก้ไข</th>
                <th class="border border-gray-300 px-4 py-2 text-center">ลบ</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) { ?>
                <tr>
                  <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["detail_id"] ?></td>
                  <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["id"] ?></td>
                  <td class="border border-gray-300 px-4 py-2 text-center"><?php $detailDate = new DateTime($row['detail_date']); echo $detailDate->format('d/m/Y'); ?></td>
                  <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["detail_address"] ?></td>
                  <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["detail_idp"] ?></td>
                  <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["detail_occ"] ?></td>
                  <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["detail_salary"] ?></td>
                  <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["detail_type"] ?></td>
                  <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["detail_line"] ?></td>
                  <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["detail_facebook"] ?></td>
                  <td class="border border-gray-300 px-4 py-2 text-center">
                    <a href="editForm.php?detail_id=<?php echo $row["detail_id"]; ?>&user_id=<?php echo $row["id"]; ?>&ida=<?php echo $ida; ?>" class="bg-blue-500 text-white rounded px-2 py-1"><i class="fa-solid fa-pen-to-square"></i></a>
                  </td>
                  <td class="border border-gray-300 px-4 py-2 text-center">
                    <a href="deleteQueryString.php?detail_id=<?php echo $row["detail_id"]; ?>&user_id=<?php echo $row["id"]; ?>&admin=1" class="bg-red-500 text-white rounded px-2 py-1" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')"><i class="fa-solid fa-trash"></i></a>
                  </td>
                  <?php if (isset($ida) && $row["id"] == $ida) { ?>
                    <!-- <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="editForm.php?detail_id=<?php echo $row["detail_id"]; ?>&user_id=<?php echo $row["id"]; ?>&admin_id=<?php echo $ida; ?>" class="bg-blue-500 text-white rounded px-2 py-1"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="deleteQueryString.php?detail_id=<?php echo $row["detail_id"]; ?>&user_id=<?php echo $row["id"]; ?>&admin=1" class="bg-red-500 text-white rounded px-2 py-1" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')"><i class="fa-solid fa-trash"></i></a>
                    </td> -->
                    <?php $btn = 0; ?>
                  <?php } else { ?>
                    <?php $btn = 1; ?>
                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      <?php } else { ?>
        <div class="text-center p-3 mt-4 bg-red-100 text-red-500 border border-red-300 rounded">
          <b>ไม่มีข้อมูล!!</b>
          <?php $btn2 = 1; ?>
        </div>
      <?php } ?>
      <?php if ($btn == 1 || $btn2 == 1) { ?>
        <a href="insertForm.php?user_id=<?php echo $ida; ?>&ida=<?php echo $ida; ?>" class="bg-green-500 text-white rounded inline-block mt-4 p-2 mr-1">เพิ่มข้อมูล</a>
        <?php $btn2 = 0; ?>
      <?php } ?>
    </div>
  </section>
  <script src="logout.js"></script>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
      menuBtnChange(); //calling the function(optional)
    });

    // searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    // sidebar.classList.toggle("open");
    // menuBtnChange(); //calling the function(optional)
    // });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
      if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-x"); //replacing the iocns class
      } else {
        closeBtn.classList.replace("bx-x", "bx-menu"); //replacing the iocns class
      }
    }
  </script>

</body>

</html>