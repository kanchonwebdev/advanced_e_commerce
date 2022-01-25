<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_query.php';

    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception; 
            

    $mn = new Main_query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];

        Functions::data_validation($email, 'email', 'email');

        if (Functions::$ok_alert == "not ok") {
            header("Location: forget.php");
        }else {
            $mn->recovery_mail($email);
        }

        if (Session::show_value("recovery_ok") == "ok") {
            require 'PHPMailer/Exception.php'; 
            require 'PHPMailer/PHPMailer.php'; 
            require 'PHPMailer/SMTP.php'; 
            
            $mail = new PHPMailer; 
            
            $mail->isSMTP();                      // Set mailer to use SMTP 
            $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
            $mail->SMTPAuth = true;               // Enable SMTP authentication 
            $mail->Username = 'kanchonkumar49@gmail.com';   // SMTP username 
            $mail->Password = '#205549Kanchon#';   // SMTP password 
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
            $mail->Port = 587;                    // TCP port to connect to 
            
            // Sender info 
            $mail->setFrom('kanchonkumar49@gmail.com', 'Sunglass Admin'); 
            
            // Add a recipient 
            $mail->addAddress($email);  
            
            // Set email format to HTML 
            $mail->isHTML(true); 
            
            // Mail subject 
            $mail->Subject = 'Recover Your Password'; 
            $rand_id = rand();
            // Mail body content 
            $bodyContent = '<h1>Password Recovery Mail</h1>'; 
            $bodyContent .= '<p>Your recovery password <h1>'.$rand_id.'</h1></p>'; 
            $mail->Body    = $bodyContent; 
            
            // Send email 
            if(!$mail->send()) {  
                Session::set_value("recovery_err", "Email doesn't sent");
            }else {
                Session::set_value("recovery_err", "Email sent check your mail box");
            }

            Session::set_value("u_name", $email);
            Session::set_value("rand_id", $rand_id);
            header("Location: recovery_password.php");
        }
    }
?>