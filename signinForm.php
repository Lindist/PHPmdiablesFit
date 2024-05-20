<?php
session_start();
require_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบเข้าฐานข้อมูลผู้พิการ</title>
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

.button:hover {background-color: #0095b6}

.button:active {
  background-color: #002fa7;
  box-shadow: 0 3px #666;
  transform: translateY(4px);
}
</style>
</head>
<body class="">
    <div id = "inout">
            <a href="signinForm.php" class="btn btn-outline-primary">Login</a>
            <a href="signupForm.php" class="btn btn-primary">Signup</a>
        </div>
        <script type="text/javascript">
            let x = document.getElementById("inout");
            x.style.textAlign="right";
            x.style.marginTop="2%";
            x.style.marginRight="2%";
        </script>
    <div class = "margin">
    <div class="container">

        <h3 class="mt-4">เข้าสู่ระบบ</h3>
        <h6>กรุณากรอกอีเมล และ รหัสผ่าน</h6>
        <hr>
        <form action="signin_db.php" method="post">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" placeholder="email" class="form-control" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" placeholder="password" class="form-control" name="password">
            </div>
            <button type="submit" name="signin" class = "button">Sign In</button>
        </form>
        <hr>
        <p>ยังไม่เป็นสมาชิกใช่ไหม คลิ๊กที่นี่เพื่อ <a href="signupForm.php">สมัครสมาชิก</a></p>
    </div>
    </div>
    <script src="margin.js" ></script>
    <!-- <div id="Id"></div>
    <script src="arr.js"></script> -->
</body>
</html>