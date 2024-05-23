<?php 
require('dbconnect.php');

if(isset($_GET['admin_id']))
{
    $ida = $_GET['admin_id'];
}

$id = $ida;

$sql = "SELECT * FROM tb_member WHERE id LIKE '%$id%' ORDER BY id ASC";
$result = mysqli_query($connect, $sql);

$count = mysqli_num_rows($result);
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
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxs-layer icon"></i>
        <div class="logo_name">Admin</div>
        <i class="bx bx-menu" id="btn"></i>
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
              <div class="name">Admin_1</div>
              <div class="job">Web designer</div>
            </div>
          </div>
          <i class="bx bx-log-out" id="log_out" onclick="Logout();"></i>
        </li>
      </ul>
    </div>
    <section class="home-section p-3 bg-slate-200">
        <div class="container mx-auto overflow-x-auto p-6 bg-white rounded-3xl shadow-md text-center items-center mt-6">
            
            <h1 class="text-center text-3xl font-medium my-14">ข้อมูลผู้ใช้</h1>
            <?php if ($count>0) { ?>
            <div class="text-center mt-10 mb-10">
                <div class="inline-block text-2xl text-left leading-10">
                <?php $row = mysqli_fetch_array($result, MYSQLI_BOTH); ?>
                <p class="">ชื่อจริง : <?php echo $row["firstname"] ?></p>
                <p class="">นามสกุล : <?php echo $row["lastname"] ?></p>
                <p class="">อายุ : <?php echo $row["age"] ?></p>
                <p class="">เพศ : <?php echo $row["gender"] ?></p>
                <p class="">สถานะผู้ใช้งาน : <?php echo $row["urole"] ?></p>
                <p class="">เบอร์โทรศัพท์ : <?php echo $row["number"] ?></p>
                </div>
            </div>
            <a href="edit_memberform.php?user_id=<?php echo $user_id; ?>" class="text-xl bg-yellow-400 text-black rounded inline-block mt-18 mb-24 px-8 py-2">แก้ไขข้อมูล</a>
            <?php ?>
            <?php } else { ?>
                <div class="text-center p-3 mt-10 bg-red-100 text-red-500 border border-red-300 rounded">
                    <b class="text-2xl">ไม่มีข้อมูล!!</b>
                </div>
                <a href="#" class="text-xl bg-green-500 text-white rounded inline-block mt-10 mb-6 px-8 py-2">เพิ่มข้อมูล</a>
            <?php } ?>

        </div>
    </section>

    <script src = "logout.js">
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
</html>