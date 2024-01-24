<?php


//connecting to PHPMailer function
include '../partials/_mailconnect.php';

try{
    $password= "jobspark".rand(10,10000);
    //set the user Mail Address
    $mail->addAddress($email);

    // Set the email subject and content
    $subject = "Jobspark password Recovered!";
    $content = "We have recovered your password to login !<br>";
    $content .= "<b>New Password:</b> {$password}<br><br>";
    $content .= "<b>You can change your password in setting !</b><br>";
    $content .= "Visit site! <br>www.jobspark.com";

    //setting Subject and Body
    $mail->Subject = $subject;
    $mail->Body = $content;

    // Send the email
    $mail->send();

    $_SESSION["password_recovered"] = 'Your account password is recoverd sucessfully. Please check your mail address';

}
catch(Exception $ex){
    // Handle any errors or exceptions, log them, etc.
    echo "Error sending email: " . $mail->ErrorInfo;
    exit();
}



?>