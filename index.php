<?php

session_start();
if (isset($_SESSION['user_login'])) {
    header("Location: disable-main/homeuser_member.php?user_id=" . $_SESSION["user_login"]);
    exit();
} else if (isset($_SESSION['admin_login'])) {
    header("Location: disable-main/homeadmin.php?admin_id=" . $_SESSION["admin_login"]);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="shortcut icon" type="x-icon" href="css/disabled_PNG28.png"> -->
    <link rel="shortcut icon" type="x-icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAclJREFUSEvFlutRxDAMhH2dQCVAJUAlQCVAJdAJdAL33Xg9iiPJTgYm/pN7RF7t6nkqB53TQbhlD/BVKeW2lMLzuzrO83MLiVlgQB5KKU/J5QJ/MQ6Fr4+AZwD7y+XAY6ZABgzoR5V0i4p6FwfuIvYRMKBfAzTFl3ejwzswX8U/AoYpCRQd4vhc/+Q5iv11f5EH/FoTaTZEM+q8Vebtzh4YlrAdHWIn+WZsVpL3wBFbDG0s+Y7c/HY/mYA4isOX0wOTUF6yKDup5Rsn/jjyfrZFUlWDV2Yt1hY4k6x3kMvlIKDKcIFFydlCZC+EDVJ7R4yQK2qNajaZ9JQWqiykzoCtMzjRl8eo/GTfytAyHtWjjD3gKDd69Q5j7ALP1CMMVs2gdrGse4k5IbokopV6pgNhI2McVUbP2ja8vkxGSWKbgDqcmsLIdqGUV5/ZVGoxOg+Gn8pYGT6qCttm3dUnGxKS2YKoRDK5h0OCGEYLgJoIZWdllfxROXrlFy57mff9wMBZ7zdl8kLiaEjYgv+L1cfdPrzp1HeaPcsed9gNxW3+oy1TRjhAgyCpomNHYz+tVjazwNYBPmsf01L/bwt9QnTfX1sZ70NxrH4Bd3txH4SHrqIAAAAASUVORK5CYII=">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBdisables</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <section class="nav">
            <div class="logo">
                <h1>ระบบเก็บฐานข้อมูลคนพิการ</h1>
            </div>
            <ul>
                <li class="login"><a href="signinForm.php">เข้าสู่ระบบ</a></li>
                <li class="logup"><a href="signupForm.php">สมัครสมาชิก</a></li>
            </ul>
        </section>
    </header>
    <div class="banner">
        <div class="header-info">
            <div class="info">
                <h2>การแถลงผลการสำรวจความพิการ พ.ศ. 2565</h2>
                <p>ผลการสำรวจความพิการ พ.ศ. 2565 ชี้ผู้พิการเข้าถึงสวัสดิการค่ารักษาพยาบาลหลักของรัฐ การส่งเสริมป้องกันโรคอย่างทั่วถึง แต่ยังน่าเป็นกังวลด้านการศึกษา การทำงาน การเข้าถึงอุปกรณ์เครื่องช่วยคนพิการ และยังคงมีความต้องการสวัสดิการอื่น ๆ ของรัฐที่จำเป็น เพื่อเพิ่มคุณภาพชีวิตของผู้พิการ สามารถอ่านเพิ่มเติมได้และติดต่อได้ที่ปุ่มด้านล่าง</p>
                <div>
                    <button type="button" onclick="window.open('https:/www.facebook.com/groups/3712188182360112')">อ่านเพิ่มเติม...</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="contract">
            <div class="conleft">
                <p>จัดทำโดยแผนกเทคนิคคอมพิวเตอร์</p>
                <p> <img src="https://image.makewebeasy.net/makeweb/m_1920x0/BnYGKP9Kn/DefaultData/Layer_84.png?v=202012190947" alt=""> วิทยาลัยเทคนิคแพร่ ตั้งอยู่ที่ 5 ถนนเมืองหิต ตำบลในเวียง อำเภอเมืองแพร่ จังหวัดแพร่
                    รหัสไปรษณีย์ 5400 </p>
            </div>
            <div class="concenter">
                <p>
                    <img src="https://image.makewebeasy.net/makeweb/m_1920x0/BnYGKP9Kn/DefaultData/icon_call.png?v=202012190947" alt=""> 054 511 142
                </p>
                <p> <img src="https://image.makewebeasy.net/makeweb/m_1920x0/BnYGKP9Kn/DefaultData/icon_call.png?v=202012190947" alt=""> 054 522 119 (งานทะเบียน)</p>
                <p> <img src="https://image.makewebeasy.net/makeweb/m_1920x0/BnYGKP9Kn/DefaultData/icon_fax.png?v=202012190947" alt="">054 511 811</p>
                <p> <img src="https://image.makewebeasy.net/makeweb/m_1920x0/BnYGKP9Kn/DefaultData/Layer_88.png?v=202012190947" alt="">Techphrae@hotmail.com </p>
            </div>
            <div class="conright">
                <p>
                    รับข่าวสารจากเรา
                </p>
                <p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAANRJREFUSEvtVsENwjAQszdhFLoJm0AngU3oJnSTQ0YhJCEqpaRqJHLvxD5bdzoTGxU34kV9xGa2L+TGSHJMsd4Um9kBwBHArhQxgJ7kJcTLEVshwhBGirtQeUTs7L26Hz2A4ccm5NrZYYjY400RRw+XNJAIacQvE6esaVbPcaANV9tjPydtncJhmLM+6Ztv1knX5LaE5NMfktFByt1jnTGFgZI1kOyyQcDZ8ow7SiAlS7ddpQYeN9krNrOTizwlCVMsRSDxVEC8pswcdn25em0H/k/xHeJOsx9WzVFkAAAAAElFTkSuQmCC" />ctn phrae</p>
                <p><img src="https://image.makewebeasy.net/makeweb/m_1920x0/BnYGKP9Kn/DefaultData/icon_fb.png?v=202012190947" alt="">pr.technicphrae หรือ ctn phrae</p>
                <p><img src="https://image.makewebeasy.net/makeweb/m_1920x0/BnYGKP9Kn/DefaultData/icon_line.png?v=202012190947" alt="">@5PTC</p>
            </div>
        </div>
        <p class="copy">&copy;2024</p>
    </footer>
</body>

</html>