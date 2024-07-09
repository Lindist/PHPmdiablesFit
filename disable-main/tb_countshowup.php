<?php 
include 'tb_counttest1.php';
require('dbconnect.php');

if(isset($_GET['admin_id']))
{
    $ida = $_GET['admin_id'];
}

$sqlu = "SELECT * FROM tb_member WHERE id LIKE '%$ida%' ORDER BY id ASC";
$resultu = mysqli_query($connect, $sqlu);
$rowu = mysqli_fetch_array($resultu, MYSQLI_BOTH);

$count = count($agearr_value)+count($genderarr_value)+count($careerarr_value);
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
       /* .tabs{
          display: flex;
          flex-wrap: wrap;

        }

        .tabs__label{
          padding: 10px 16px;
          cursor: pointer;
        }

        .tabs__radio{
          display:none;
        }

        .tab__content1{
          order:1;
          width: 100%;
          border-bottom:3px solid #ddd;
          line-height:1.5;
          font-size: 0.9rem;
          display:none;
        }
        .tab__content2{
          order:1;
          width: 100%;
          border-bottom:3px solid #ddd;
          line-height:1.5;
          font-size: 0.9rem;
          display:none;
        }
        .tab__content3{
          order:1;
          width: 100%;
          border-bottom:3px solid #ddd;
          line-height:1.5;
          font-size: 0.9rem;
          display:none;
        }
        .tabs__radio:checked+.tabs__label{
          font-weight:bold;
          color:#009578;
          border-bottom:2px solid #009578;
        }

        .tabs__radio:checked+.tabs__label+.tab__content1{
          display:initial;
        }
        .tabs__radio:checked+.tabs__label+.tab__content2{
          display:initial;
        }
        .tabs__radio:checked+.tabs__label+.tab__content3{
          display:initial;
        } */
    </style>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
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
              <div class="name"><?php echo $rowu["urole"] ?></div>
              <div class="job"><?php echo "Name : ".$rowu["firstname"]." ".$rowu["lastname"] ?></div>
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
          <!-- <div class="tabs">
              <input type="radio" class="tabs__radio" name="tabs-example" id="tab1" checked>
              <label for="tab1" class="tabs__label">อายุ</label>
              <div class="tab__content1">
                1
              </div>
              <input type="radio" class="tabs__radio" name="tabs-example" id="tab2">
              <label for="tab2" class="tabs__label">เพศ</label>
              <div class="tab__content2">
                  2

              </div>
              <input type="radio" class="tabs__radio" name="tabs-example" id="tab3">
              <label for="tab3" class="tabs__label">อาชีพ</label>
              <div class="tab__content3">
                 3

              </div>
          </div> -->
          <div class="flex flex-warp gap-1">
            <button class="p-4 rounded-lg text-gray-700 font-bold flex-grow w-80 hover:bg-gray-300 hover:bg-spacity-40" data-tab-target="#tab1">อายุ</button>
            <button class="p-4 rounded-lg text-gray-700 font-bold flex-grow w-80 hover:bg-gray-300 hover:bg-spacity-40" data-tab-target="#tab2">เพศ</button>
            <button class="p-4 rounded-lg text-gray-700 font-bold flex-grow w-80 hover:bg-gray-300 hover:bg-spacity-40" data-tab-target="#tab3">อาชีพ</button>
          </div>
              <!-- <div class="mb-3">
                <form action="tb_countsearch.php" class="flex space-x-2" method="POST">
                  <input class="flex-grow p-2 border border-gray-300 rounded" type="search" name="search" placeholder="ป้อนประเภท">
                <input type="hidden" name="ida" value = "<?php //echo $ida; ?>">
                <button class="rounded p-2 bg-blue-500 text-white" type="submit">Search</button>
            </form>
        </div> -->
        <div class="mt-4" >
        <?php if ($count>0) { ?>
          <div class="tab-content text-gray-700 hidden" id="tab1">
        <table class="table-auto w-full border-collapse border border-gray-300"><!-- id="myTable" --> 
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-center">ประเภท</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">จำนวน</th>
                  </tr>
            </thead>
            <tbody>
                <?php for($row=0;$row < count($agearr_key);$row++) { ?>
                  <tr id="taba">
                      <td class="border border-gray-300 px-4 py-2 text-center" ><?php echo "อายุ ".$agearr_key[$row]." ปี"; ?></td>
                      <td class="border border-gray-300 px-4 py-2 text-center" ><?php echo $agearr_value[$row]; ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                </div>
                <div class="tab-content text-gray-700 hidden" id="tab2">
                <table class="table-auto w-full border-collapse border border-gray-300"><!-- id="myTable" --> 
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-center">ประเภท</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">จำนวน</th>
                  </tr>
            </thead>
            <tbody>
                <?php for($row=0;$row < count($genderarr_key);$row++) { ?>
                  <tr id="tabg">
                        <td class="border border-gray-300 px-4 py-2 text-center"><?php echo "เพศ ".$genderarr_key[$row]; ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $genderarr_value[$row]; ?></td>
                    </tr>
                <?php } ?>
                  </tbody>
                </table>
                </div>
                <div class="tab-content text-gray-700 hidden" id="tab3">
                <table class="table-auto w-full border-collapse border border-gray-300"><!-- id="myTable" --> 
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-center">ประเภท</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">จำนวน</th>
                  </tr>
            </thead>
            <tbody>
                <?php for($row=0;$row < count($careerarr_key);$row++) { ?>
                    <tr id="tabc">
                        <td class="border border-gray-300 px-4 py-2 text-center"><?php echo "อาชีพ ".$careerarr_key[$row]; ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $careerarr_value[$row]; ?></td>
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
        </div>

      
    </section>
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