<?php 

    session_start();
    require_once 'connect.php';

    if (isset($_POST['signin'])) {
        $number = $_POST['number'];
        $password = $_POST['password'];

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

        if (empty($number)) {
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์';
            header("location: signinForm.php");
        }
        else if ($checkbarn < 10) {
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์ด้วยตัวเลข';
            header("location: signinForm.php");
        }
        else if ($iszero == 1) {
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์หน้าด้วยตัวเลข 0';
            header("location: signinForm.php");
        } 
        else if (strlen($number) < 10 || strlen($number) > 10) {
            $_SESSION['error'] = 'รูปแบบเบอร์โทรศัพท์จะต้องมีความยาว 10 หลัก';
            header("location: signinForm.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: signinForm.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: signinForm.php");
        } else {
            try {

                $check_data = $conn->prepare("SELECT * FROM tb_member WHERE number = :number");
                $check_data->bindParam(":number", $number);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {
                    if ($number == $row['number']) {
                        if (password_verify($password, $row['password'])) {
                            if ($row['urole'] == 'admin') {
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: admin.php");
                            } else {
                                $_SESSION['user_login'] = $row['id'];
                                header("location: user.php");
                            }
                        } else {
                            $_SESSION['error'] = 'รหัสผ่านผิด';
                            header("location: signinForm.php");
                        }
                    }else {
                        $_SESSION['error'] = 'เบอร์โทรศัพท์ผิด';
                        header("location: signinForm.php");
                    }
                }
                else {
                   $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                   header("location: signinForm.php");
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    


?>