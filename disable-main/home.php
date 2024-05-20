<?php 
$admin_id = $_GET['admin_id'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
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
          <a href="home.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Admin</span>
          </a>
          <span class="tooltip">Admin</span>
        </li>
        <li>
          <a href="member_tb.php">
          <i class='bx bx-table'></i>
            <span class="links_name">Member Table</span>
          </a>
          <span class="tooltip">Member Table</span>
        </li>
        <li>
          <a href="detail_tb1.php">
          <i class='bx bx-table'></i>
            <span class="links_name">Detail Table_1</span>
          </a>
          <span class="tooltip">Detail Table_1</span>
        </li>
        <li>
          <a href="detail_tb2.php">
          <i class='bx bx-table'></i>
            <span class="links_name">Detail Table_2</span>
          </a>
          <span class="tooltip">Detail Table_2</span>
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
    <section class="home-section">
        <h1 class="text-center text-2xl font-bold">Admin</h1>
    </section>

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

        function Logout()
        {
            window.location = 'http://localhost:8080/PHPmdiablesFit/logout.php';
        }
    </script>

  </body>
</html>