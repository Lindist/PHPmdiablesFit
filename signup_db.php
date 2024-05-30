<?php 

    session_start();
    require_once 'connect.php';

    if (isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $number = $_POST['number'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = "user";

        $barnnumber = "0123654789";
        $checkbarn = 1;
        $iszero = 0;
        if($number[0] != '0')
        {
                $iszero = 1;
                
        }else{
        for ($i = 0; $i < strlen($number); $i++) {
            for ($j = 0; $j < strlen($barnnumber); $j++)
                if($number[$i] == $barnnumber[$j])
                {
                    $checkbarn++;
                }
        }
    }

        if (empty($firstname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: signupForm.php");
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: signupForm.php");
        } else if (empty($age)) {
            $_SESSION['error'] = 'กรุณากรอกอายุ';
            header("location: signupForm.php");
        } else if (empty($gender)) {
            $_SESSION['error'] = 'กรุณากรอกเพศ';
            header("location: signupForm.php");
        } 
        else if (empty($number)) {
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์';
            header("location: signupForm.php");
        }
        else if ($checkbarn < 10) {
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์ด้วยตัวเลข';
            header("location: signupForm.php");
        }
        else if ($iszero == 1) {
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์หน้าด้วยตัวเลข 0';
            header("location: signupForm.php");
        }
        else if (strlen($number) < 10 || strlen($number) > 10) {
            $_SESSION['error'] = 'รูปแบบเบอร์โทรศัพท์จะต้องมีความยาว 10 หลัก';
            header("location: signupForm.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: signupForm.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: signupForm.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: signupForm.php");
        } else if ($password != $c_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: signupForm.php");
        } else {
            try {

                $check_email = $conn->prepare("SELECT * FROM tb_member WHERE number = :number");
                $check_email->bindParam(":number", $number);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['number'] == $number) {
                    $_SESSION['warning'] = "มีเบอร์นี้อยู่ในระบบแล้ว <a href='signinForm.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: signupForm.php");
                } else {
                    if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO tb_member(firstname, lastname, age, gender,urole,number,password) 
                                            VALUES(:firstname, :lastname, :age,:gender, :urole,:number,:password)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":age", $age);
                    $stmt->bindParam(":gender", $gender);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->bindParam(":number", $number);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->execute();
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signinForm.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: signupForm.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: signupForm.php");
                }
            }
        }
             catch(PDOException $e) {//report error
                echo $e->getMessage();
            }
    }

}


?>