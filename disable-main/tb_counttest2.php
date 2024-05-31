<?php
// เชื่อมต่อฐานข้อมูล
$con = mysqli_connect("localhost", "root", "", "database_disables");

// ตรวจสอบการเชื่อมต่อ
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query เพื่อดึงจำนวนสมาชิกแยกตามเพศ
$query1 = "SELECT age, count(*) AS count FROM tb_member GROUP BY age";
$result1 = $con->query($query1);

$query2 = "SELECT gender, count(*) AS count FROM tb_member GROUP BY gender";
$result2 = $con->query($query2);

$query3 = "SELECT detail_occ, count(*) AS count FROM tb_detail GROUP BY detail_occ";
$result3 = $con->query($query3);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <div class="container mx-auto overflow-x-auto p-6 bg-white rounded shadow-md">
      <h1 class="text-center text-2xl font-medium">ตารางสรุปผลผู้ใช้</h1>
          <hr class="my-4">
        <div class="flex flex-warp gap-1">
            <button class="p-4 rounded-lg text-gray-700 font-bold flex-grow w-80 hover:bg-gray-300 hover:bg-spacity-40" data-tab-target="#tab1">อายุ</button>
            <button class="p-4 rounded-lg text-gray-700 font-bold flex-grow w-80 hover:bg-gray-300 hover:bg-spacity-40" data-tab-target="#tab2">เพศ</button>
            <button class="p-4 rounded-lg text-gray-700 font-bold flex-grow w-80 hover:bg-gray-300 hover:bg-spacity-40" data-tab-target="#tab3">อาชีพ</button>
        </div>

        <div class="mt-4">
            <div class="tab-content text-gray-700 hidden" id="tab1">
              <table class="table-auto w-full border-collapse border border-gray-300" id="myTable">
                <thead>
                  <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-center">ประเภท</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">จำนวน</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row1 = $result1->fetch_assoc()) { ?>
                  <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">อายุ <?php echo $row1["age"]."ปี"; ?></td> 
                    <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row1["count"]; ?></td> 
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="tab-content text-gray-700 hidden" id="tab2">
            <table class="table-auto w-full border-collapse border border-gray-300" id="myTable">
              <thead>
                  <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-center">ประเภท</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">จำนวน</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row2 = $result2->fetch_assoc()) { ?>
                  <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">เพศ <?php echo $row2["gender"]; ?></td> 
                    <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row2["count"]; ?></td> 
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="tab-content text-gray-700 hidden" id="tab3">
              <table class="table-auto w-full border-collapse border border-gray-300" id="myTable">
                <thead>
                  <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-center">ประเภท</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">จำนวน</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row3 = $result3->fetch_assoc()) { ?>
                  <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">อาชีพ <?php echo $row3["detail_occ"]; ?></td> 
                    <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $row3["count"]; ?></td> 
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
        </div>

    </div>

    <script>

        const tabs = document.querySelectorAll('[data-tab-target]');
        const activeClass= 'bg-indigo-200';

        tabs[0].classList.add(activeClass);
        document.querySelector('#tab1').classList.remove('hidden');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const targetContent = document.querySelector(tab.dataset.tabTarget);
                // console.log(targetContent);

                document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));

                targetContent.classList.remove('hidden');

                document.querySelectorAll('.bg-indigo-200').forEach(activeTab => activeTab.classList.remove(activeClass));

                tab.classList.add(activeClass);
            })
        })

    </script>

        <?php
        
        // while ($row1 = mysqli_fetch_array($stmt)) {
        //     echo $row1["gender"] . " | ";
        // }
        
        // echo "<br>";
        
        // // Print out result
        // while ($row = mysqli_fetch_array($result)) {
        //     echo $row['gender'] . "--";
        // }
        
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