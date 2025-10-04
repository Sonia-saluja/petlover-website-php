<?php
 if (isset($_POST["send-mail"])) {
    $to = "soniasaluja50@gmail.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: webmaster@example.com" . "\r\n" .
    "CC: somebodyelse@example.com";
    
    $mailSent=  mail($to,$subject,$txt,$headers);
    // $to = "soniasaluja50@gmail.com";
    // $subject = "Test Email";
    // $message = "This is a test email.";
    // $headers = "From: sender@example.com\r\n"; // Provide a custom "From" header
    // $headers .= "Reply-To: sender@example.com\r\n";
    // $headers .= "CC: cc@example.com\r\n"; // Optional - Add CC recipients
    // $headers .= "BCC: bcc@example.com\r\n"; // Optional - Add BCC recipients
    
    // // Send email
    // $mailSent = mail($to, $subject, $message, $headers);
    
    if ($mailSent) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
  
    
    // $to = "soniasaluja50@gmail.com";
    // $subject = "subject";
    // $message = "This is a test email.";
    // $headers = "email\r\n";
    // $headers .= "CC: cc@example.com\r\n"; // Optional - Add CC recipients
    // $headers .= "BCC: bcc@example.com\r\n"; // Optional - Add BCC recipients
    
    // // Send email
    // $mailSent = mail($to, $subject, $message, $headers);
    
    // if ($mailSent) {
    //     echo "Email sent successfully.";
    // } else {
    //     echo "Email sending failed.";
    // }
} else {    
    echo "N0, mail is not set";
}  
   



?>