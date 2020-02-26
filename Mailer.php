<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
date_default_timezone_set('Asia/Manila');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

/*$host="localhost"; // Host name
$username="root"; // MySQL username
$password="admin"; // MySQL password
$db_name="db"; // Database Name

// Connect to server and select database.
$con=mysqli_connect($host,$username,$password,$db_name) or die("cannot connect");

$client_query= "QUERY";

$data=mysqli_query($con,$client_query);

while ($row = mysqli_fetch_array($data)) {
    $day=$row['day'];
    $email = $row['email'];
    $name= $row['name'];
    $file_path=$row['file_path'];
*/

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {

        //Server settings
$mail->SMTPDebug = 1;                                 // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'email@email.com';                 // SMTP username
$mail->Password = 'EmailPassword';                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                                    // TCP port to connect to

//Recipients
$mail->setFrom('SenderEmail', 'SenderName');
$mail->addAddress('RecipientEmail');
$mail->addCC('CCEmail');

// Add a recipient
// Name is optional

// Optional name
//Attachments


$mail->addEmbeddedImage('C:\Users\User\Desktop\file.png','screenshot');
$mail->addAttachment('C:\Users\User\Desktop\file.xlsx');

//Content
$mail->isHTML(true);                                  // Set email format to HTML
//$mail->Subject = 'EOM(February) - ASM Report';
$mail->Subject = 'Email Subject';
//$mail->Subject = 'Daily - ASM Report - ';

$mail->Body    = "Hello,
<br>
<br>
Email Body
<br>
<br>
<img src=\"cid:screenshot\" alt=\"Screenshot\">
<br>
Regards,
<br>
Signature";
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
echo 'Message has been sent';
}catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
