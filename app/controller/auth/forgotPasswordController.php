<?php


require_once 'config/db.php';
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class forgotPasswordController {
    public function forgotPassword() {

        if(isset($_POST['submit'])){
            $DB = new DB;
            $email = $_POST['Email'];

            $sql = "SELECT * FROM user_basic WHERE email = '$email'";
            $result = $DB->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if($row){
                $code = $this->generateVerificationCode();
                $this->sendEmail($email, $code);
                $sql = "UPDATE user_basic SET password = '$code' WHERE email = '$email'";
                $DB->query($sql);
                header('Location: forgetPasswordResult');
            } else {
                require_once 'resources/view/forgotPassword.html';
                echo "<script>document.getElementById('passwordResult').innerHTML = 'Email không tồn tại !';</script>";
            }
        }
        require_once 'resources/view/forgotPassword.html';
    }


    public function generateVerificationCode() {
        // random number 100000 to 999999
        return rand(100000, 999999); 
    }

    public function sendEmail($email, $code) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = FALSE;                             //SMTP::DEBUG_SERVER Enable verbose debug output
            $mail->isSMTP();                                      //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                 //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                             //Enable SMTP authentication
            $mail->Username   = 'trinhnhatanh47@gmail.com';       //SMTP username
            $mail->Password   = 'oyexhvzesxplwejo';               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      //Enable implicit TLS encryption
            $mail->Port       = 465;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($email, 'Project A');
            $mail->addAddress($email, 'User');     //Add a recipient
            $mail->addAddress($email);             //Name is optional

            
            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Forgot Password';
            $mail->Body = 'Mật khẩu mới của bạn là: ' . $code; 

            //send mail
            $mail->send();
        } catch (Exception $e) {
            require_once 'resources/view/forgotPassword.html';
            echo "<script>document.getElementById('passwordResult').innerHTML = 'Mời Bạn Nhập Lại Email.';</script>";
        }
    }
}