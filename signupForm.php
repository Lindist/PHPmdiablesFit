<?php
session_start();
require_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAclJREFUSEvFlutRxDAMhH2dQCVAJUAlQCVAJdAJdAL33Xg9iiPJTgYm/pN7RF7t6nkqB53TQbhlD/BVKeW2lMLzuzrO83MLiVlgQB5KKU/J5QJ/MQ6Fr4+AZwD7y+XAY6ZABgzoR5V0i4p6FwfuIvYRMKBfAzTFl3ejwzswX8U/AoYpCRQd4vhc/+Q5iv11f5EH/FoTaTZEM+q8Vebtzh4YlrAdHWIn+WZsVpL3wBFbDG0s+Y7c/HY/mYA4isOX0wOTUF6yKDup5Rsn/jjyfrZFUlWDV2Yt1hY4k6x3kMvlIKDKcIFFydlCZC+EDVJ7R4yQK2qNajaZ9JQWqiykzoCtMzjRl8eo/GTfytAyHtWjjD3gKDd69Q5j7ALP1CMMVs2gdrGse4k5IbokopV6pgNhI2McVUbP2ja8vkxGSWKbgDqcmsLIdqGUV5/ZVGoxOg+Gn8pYGT6qCttm3dUnGxKS2YKoRDK5h0OCGEYLgJoIZWdllfxROXrlFy57mff9wMBZ7zdl8kLiaEjYgv+L1cfdPrzp1HeaPcsed9gNxW3+oy1TRjhAgyCpomNHYz+tVjazwNYBPmsf01L/bwt9QnTfX1sZ70NxrH4Bd3txH4SHrqIAAAAASUVORK5CYII=">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิกผู้ใช้</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #007bb8;
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px #999;
        }

        .button:hover {
            background-color: #0095b6
        }

        .button:active {
            background-color: #002fa7;
            box-shadow: 0 3px #666;
            transform: translateY(4px);
        }

        .back {
            display: inline-block;
            border-radius: 4px;
            border: none;
            background: transparent;
            color: #FFFFFF;
            text-align: center;
            transition: all 0.5s;
            cursor: pointer;
        }

        .back span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .back span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .back:hover span {
            padding-right: 15px;
        }

        .back:hover span:after {
            opacity: 1;
            right: 0;
        }

        .mx {
            margin-left: 20%;
            margin-right: 20%;
        }

        @media only screen and (max-width: 600px) {
            .mx {
                margin-left: 5%;
                margin-right: 5%;
            }
        }
    </style>
</head>

<body class="">
    <div id="inout">
        <a href="signinForm.php" class="btn btn-outline-primary">เข้าสู่ระบบ</a>
        <a href="signupForm.php" class="btn btn-primary">สมัครสมาชิก</a>
        <div class="btn btn-dark">
            <a href="index.html" class="back"><span>กลับ</span></a>
        </div>
    </div>
    <script type="text/javascript">
        let x = document.getElementById("inout");
        x.style.textAlign = "right";
        x.style.marginTop = "2%";
        x.style.marginRight = "2%";
    </script>
    <div class="mx">
        <div class="">
            <h3 class="mt-4">สมัครสมาชิก</h3>
            <hr>
            <form action="signup_db.php" method="post">
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['warning'])) { ?>
                    <div class="alert alert-warning" role="alert">
                        <?php
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                        ?>
                    </div>
                <?php } ?>

                <div class="mb-3">
                    <label for="firstname" class="form-label">ชื่อจริง</label>
                    <input type="text" placeholder="ชื่อจริง" class="form-control" name="firstname" aria-describedby="firstname">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">นามสกุล</label>
                    <input type="text" class="form-control" name="lastname" aria-describedby="lastname" placeholder="นามสกุล">
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">อายุ</label>
                    <input type="text" placeholder="อายุ" class="form-control" name="age" aria-describedby="age">
                </div>
                <div>
                    <label for="gender" class="form-label">เพศ</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="radio" name="gender" aria-describedby="gender" value="ชาย">
                    <label for="gender" class="form-check-label">ชาย</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="radio" name="gender" aria-describedby="gender" value="หญิง">
                    <label for="gender" class="form-check-label">หญิง</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="radio" name="gender" aria-describedby="gender" value="อื่นๆ">
                    <label for="gender" class="form-check-label">อื่นๆ</label>
                </div>
                <div>
                    <label for="email" class="form-label">เบอร์โทรศัพท์</label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">+66(ไทย)</span>
                    <input type="text" placeholder="เบอร์โทรศัพท์" class="form-control" name="number" aria-describedby="number">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" placeholder="รหัสผ่าน" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label for="confirm password" class="form-label">ยืนยัน รหัสผ่าน</label>
                    <input type="password" placeholder="ยืนยัน รหัสผ่าน" class="form-control" name="c_password">
                </div>
                <button type="submit" name="signup" class="button">Sign Up</button>
            </form>
            <hr>
            <p>เป็นสมาชิกแล้วใช่ไหม คลิ๊กที่นี่เพื่อ <a href="signinForm.php">เข้าสู่ระบบ</a></p>
        </div>
    </div>
</body>

</html>