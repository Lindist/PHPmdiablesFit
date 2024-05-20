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

.button:hover {background-color: #0095b6}

.button:active {
  background-color: #002fa7;
  box-shadow: 0 3px #666;
  transform: translateY(4px);
}
</style>
</head>
<body class="container">
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
    <div class="margin">
    <div class="container">
        <h3 class="mt-4">สมัครสมาชิก</h3>
        <hr>
        <form action="signup_db.php" method="post">
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
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?> 

            <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" placeholder="firstname" class="form-control" name="firstname" aria-describedby="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text"  class="form-control" name="lastname" aria-describedby="lastname" placeholder="lastname">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" placeholder="age" class="form-control" name="age" aria-describedby="age">
            </div>
            <div>
                <label for="gender" class="form-label">Gender</label>
            </div>
            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="radio"  name="gender" aria-describedby="gender" value="ชาย">
                <label for="gender" class="form-check-label">ชาย</label>
            </div>
            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="radio"  name="gender" aria-describedby="gender" value="หญิง">
                <label for="gender" class="form-check-label">หญิง</label>
            </div>
            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="radio"  name="gender" aria-describedby="gender" value="อื่นๆ">
                <label for="gender" class="form-check-label">อื่นๆ</label>
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="email" placeholder="email" class="form-control" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" placeholder="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="confirm password" class="form-label">Confirm Password</label>
                <input type="password" placeholder="confirm password" class="form-control" name="c_password">
            </div>
            <button type="submit" name="signup" class="button">Sign Up</button>
        </form>
        <hr>
        <p>เป็นสมาชิกแล้วใช่ไหม คลิ๊กที่นี่เพื่อ <a href="signinForm.php">เข้าสู่ระบบ</a></p>
    </div>
    </div>
    <script src="margin.js" ></script>
</body>
</html>