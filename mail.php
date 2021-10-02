<?php
$to_email = "shakilmh626@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From:shakilmh627@gmail.com";
$mailto = mail($to_email, $subject, $body, $headers);
$hi = ini_set("include_path", "C:\xampp\sendmail\sendmail.exe");

if($hi){
    echo "Email successfully sent to $to_email...";

}else{
    echo "Email sending failed...";
}


?>