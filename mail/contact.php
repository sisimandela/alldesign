<?php
// Check for empty fields
if(isset($_POST['submit'])) {
    $name = strip_tags(htmlspecialchars($_POST['name']));
    $mobile = strip_tags(htmlspecialchars($_POST['mobile']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
    $msg = "";
    $class = "alert alert";

    if(empty($name)) {
        $msg = "<b>Your name is required</b>";
        echo "<div class='$class-danger'>$msg</div>";
    }
    if(empty($mobile)) {
        $msg = "<b>Your mobile is required</b>";
        echo "<div class='$class-danger'>$msg</div>";
    }
    else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        $msg = "<b>Email is invalid</b>";
        echo "<div class='$class-danger'>$msg</div>";
    }
    else if (empty($message)) {
        $msg = "<b>Please provide your message</b>";
        echo "<div class='$class-danger'>$msg</div>";
    }
   
// Create the email and send the message
$to = ''; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@Dezinora\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);

$msg = "<b  data-dismiss='alert' aria-hidden='true'>Your message has been sent, Thank You    <button class='close'>&times;</button> </b>";
echo "<div class='$class-success' >$msg</div>";
?>
<script>
                //clear all fields
          $('#form').trigger("reset");
            </script> 
            <?php  
return true; 

}
?>