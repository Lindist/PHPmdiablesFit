<?php
$con = mysqli_connect("localhost", "root", "", "database_disables");

// Query เพื่อดึงจำนวนสมาชิกแยกตามเพศ
$query = "SELECT gender, count(*) AS gender from tb_member GROUP BY gender";
$result = $con->query($query);

// Query เพื่อดึงข้อมูลทั้งหมดจากตาราง tb_member แยกตามเพศ
$stmt = $con->query("SELECT * FROM tb_member GROUP BY gender");
// while ($row1 = mysqli_fetch_array($stmt)) {
//     echo $row1["gender"] . " | ";
// }

// echo "<br>";

// Print out result
// while ($row = mysqli_fetch_array($result)) {
//     echo $row['gender'] . "--";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
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
</head>
<body>
<body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxs-layer icon"></i>
        <div class="logo_name">Admin</div>
        <i class="bx bx-menu checkbtn" id="btn"></i>
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
              <div class="name"><?php echo $row["urole"] ?></div>
              <div class="job"><?php echo "Name : ".$row["firstname"]." ".$row["lastname"] ?></div>
            </div>
          </div>
          <i class="bx bx-log-out" id="log_out" onclick="Logout();"></i>
        </li>
      </ul>
    </div>
    <section class="home-section p-3 bg-slate-200">
        <nav class="bg-blue-500 p-4">
            <div class="flex items-center justify-center">
                <div class="text-white text-2xl font-bold"></div>
                <ul class="">
                    <li><a href="#" class="text-white mx-10">Home</a></li>
                    <li><a href="#" class="text-white">Home</a></li>
                    <li><a href="#" class="text-white">Home</a></li>
                </ul>
            </div>
        </nav>
        <?php
        
        while ($row1 = mysqli_fetch_array($stmt)) {
            echo $row1["gender"] . " | ";
        }
        
        echo "<br>";
        
        // Print out result
        while ($row = mysqli_fetch_array($result)) {
            echo $row['gender'] . "--";
        }
        
        ?>
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
        closeBtn.classList.replace("bx-menu", "bx-x");//replacing the iocns class
        }else {
        closeBtn.classList.replace("bx-x","bx-menu");//replacing the iocns class
        }
        }
    </script>
</body>
</html>