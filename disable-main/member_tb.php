<?php 

require('dbconnect.php');

$sql = "SELECT * FROM tb_member ORDER BY id ASC";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
  </head>
  <body class="p-3 mb-2 bg-slate-200">
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
    <div class="container mx-auto overflow-x-auto p-6 bg-white rounded shadow-md">
        <h1 class="text-center text-2xl font-bold">Member Table</h1>
        <hr class="my-4">
        <div class="mb-3">
            <form action="searchmember.php" class="flex space-x-2" method="POST">
                <input class="flex-grow p-2 border border-gray-300 rounded" type="search" name="firstname" placeholder="ป้อนชื่อทีม">
                <button class="rounded p-2 bg-blue-500 text-white" type="submit">Search</button>
            </form>
        </div>
        <?php if ($count>0) { ?>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-center">id</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">firstname</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">lastname</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">age</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">gender</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">แก้ไข</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">ลบ</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) { ?>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["id"]?></td>
                    <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["firstname"] ?></td>
                    <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["lastname"] ?></td>
                    <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["age"] ?></td>
                    <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row["gender"] ?></td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="editForm.php?id=<?php echo $row["id"] ?>" class="bg-blue-500 text-white rounded px-2 py-1"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="deletemember.php?id=<?php echo $row["id"] ?>" class="bg-red-500 text-white rounded px-2 py-1" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <div class="text-center p-3 mt-4 bg-red-100 text-red-500 border border-red-300 rounded">
                <b>ไม่มีข้อมูล!!</b>
            </div>
        <?php } ?>
        <a href="insert_memberform.php" class="bg-green-500 text-white rounded inline-block mt-4 p-2 mr-1">เพิ่มข้อมูล</a>
    </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();//calling the function(optional)
        });

        // searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
        // sidebar.classList.toggle("open");
        // menuBtnChange(); //calling the function(optional)
        // });

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