<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<style>
  body {
    font-family: sans-serif;
    text-align: center;
  }

  button {
    background-color: cadetblue;
    color: whitesmoke;
    border: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
    font-size: 18px;
    font-weight: 500;
    border-radius: 7px;
    padding: 15px 35px;
    cursor: pointer;
    white-space: nowrap;
    margin: 10px;
  }

  img {
    width: 200px;
  }

  input[type="text"] {
    padding: 12px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
  }

  h1 {
    border-bottom: solid 2px grey;
  }

  #success {
    background: green;
  }

  #error {
    background: red;
  }

  #warning {
    background: coral;
  }

  #info {
    background: cornflowerblue;
  }

  #question {
    background: grey;
  }
</style>
<button style="display:none" id="success">Success</button>



<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Start session
// session_start();

// Check for reCAPTCHA response
// if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
//   $secretKey = "6LfvuIArAAAAALvE_bp7fd5FgG_tlmMc1fjCNjsW";
//   $ip = $_SERVER['REMOTE_ADDR'];
//   $response = $_POST['g-recaptcha-response'];
//   $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$ip";
//   $fire = file_get_contents($url);
//   $data = json_decode($fire);
//   if ($data->success == true) {
    // Initialize PHPMailer
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->Host = "mail.dietwithright.com";
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->Username = 'info@dietwithright.com';
    $mail->Password = '+UD+WTg,5Y7x'; 
    $mail->setFrom('info@dietwithright.com', 'Diet With Right');

    // Add recipients
    // $mail->addBCC('sanjaresolutions@gmail.com', 'sanjaresolutions');
    // $mail->addBCC('mirzafaizan1931@gmail.com', 'Faizan Mirza');

    $mail->addBCC(' dietwithright25@gmail.com', 'Diet With Right');
    $mail->addAddress('info@dietwithright.com', 'Diet With Right');
    // $mail->addAddress(' supritdagade77@gmail.com', 'suprit');
    // $mail->Subject = 'Contact form submitted data.';

    // Gather form data

    $_SESSION["redirection"] = "done";
    $name = ($_POST['name'] != '') ? $_POST['name'] : '';
    $email = ($_POST['email'] != '') ? $_POST['email'] : '';
    $phone = ($_POST['phone'] != '') ? $_POST['phone'] : '';
    $message = $_POST['message'] ?? '';
    $subject = $_POST['subject'] ?? 'No Subject';

    $mail->Subject = "Contact form submission: " . $subject;

    // Prepare email content
    $html = "  
        <table style='width: 100%;border: 2px solid black;border-collapse: collapse;'>
        <tr style='width: 100%;border: 2px solid black;'>";
    if (!empty($name)) {
      $html .= "     <th style='width: 20%;border: 2px solid black;'>Enter your Name</th>";
    }
    if (!empty($email)) {
      $html .= "      <th style='width: 20%;border: 2px solid black;'>Enter your Email</th>";
    }
    if (!empty($phone)) {
      $html .= "      <th style='width: 20%;border: 2px solid black;'>Enter your Mobile Number</th>";
    }
    if (!empty($message)) {
      $html .= "      <th style='width: 20%;border: 2px solid black;'>Enter your Message</th>";
    }
    $html .= "    
        </tr>
        <tr style='width: 100%;border: 2px solid black;'>";
    if (!empty($name)) {
      $html .= "     <th style='width: 20%;border: 2px solid black;'>" . $name . "</th>";
    }
    if (!empty($email)) {
      $html .= "     <th style='width: 20%;border: 2px solid black;'>" . $email . "</th>";
    }
    if (!empty($phone)) {
      $html .= "     <th style='width: 20%;border: 2px solid black;'>" . $phone . "</th>";
    }
    if (!empty($message)) {
      $html .= "     <th style='width: 20%;border: 2px solid black;'>" . $message . "</th>";
    }
    $html .= "         </tr>
                </table>";


    // Prepare email message
    $mail->msgHTML($html);
    $mail->AltBody = 'This is a plain-text message body';

    if (!$mail->send()) {
        echo "
            <script type=\"text/javascript\">
                swal(
                    'Error',
                    'Your email could not be sent. Please try again later.',
                    'error'
                );
            </script>
        ";
    } else {
        echo "
            <script type=\"text/javascript\">
                swal(
                    'Success',
                    'Your email has been sent successfully!',
                    'success'
                );
            </script>
        ";
    }
?>


<script>
  $('body').click(function () {
    // window.location = "https://  .com/demo";
    window.location = "https://dietwithright.com";
  });
</script>