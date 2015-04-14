// <?php
// //add the recipient's address here
// $myemail = 'https://mailto:dvorkin212@gmail.com';
 
// //grab named inputs from html then post to #thanks
// if (isset($_POST['name'])) {
// $name = strip_tags($_POST['name']);
// $email = strip_tags($_POST['email']);
// $message = strip_tags($_POST['message']);
// echo "<span class=\"alert alert-success\" >Your message has been received. Thanks! Here is what you submitted:</span><br><br>";
// echo "<stong>Name:</strong> ".$name."<br>";   
// echo "<stong>Email:</strong> ".$email."<br>"; 
// echo "<stong>Message:</strong> ".$message."<br>";
 
// //generate email and send!
// $to = $myemail;
// $email_subject = "Contact form submission: $name";
// $email_body = "You have received a new message. ".
// " Here are the details:\n Name: $name \n ".
// "Email: $email\n Message \n $message";
// $headers = "From: $myemail\n";
// $headers .= "Reply-To: $email";
// mail($to,$email_subject,$email_body,$headers);
// }
// ?>

<?php
    if ($_POST["submit"]) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $human = intval($_POST['human']);
        $from = 'Demo Contact Form'; 
        $to = 'dvorkin212@gmail.com'; 
        $subject = 'Message from Contact Demo ';
        
        $body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
        //Check if simple anti-bot test is correct
        if ($human !== 5) {
            $errHuman = 'Your anti-spam is incorrect';
        }
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    }
}
    }
?>