<?php 

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
  <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxs-layer icon"></i>
        <div class="logo_name">User</div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <ul class="nav-list">
        <li>
          <a href="homeuser_member.php?user_id=<?php echo $user_id; ?>">
            <i class="bx bx-user"></i>
            <span class="links_name">User</span>
          </a>
          <span class="tooltip">User</span>
        </li>
        <li>
          <a href="homeuser_detail.php?user_id=<?php echo $user_id; ?>">
          <i class='bx bx-table'></i>
            <span class="links_name">Detail</span>
          </a>
          <span class="tooltip">Detail</span>
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
              <div class="name">user</div>
              <div class="job">userinterface</div>
            </div>
          </div>
          <i class="bx bx-log-out" id="log_out" onclick="Logout();"></i>
        </li>
      </ul>
    </div>
    <section class="home-section p-3 bg-slate-200">
        <div class="container mx-auto overflow-x-auto p-6 bg-white rounded-3xl shadow-md text-center items-center">
            
            <h1 class="text-center text-4xl font-bold my-14">ข้อมูลส่วนตัว</h1>
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