<?php
include 'header.php';

?>

    <main>
        <h2>
            Have any questions or comments!? Contact us here! <br> We will try to get back to you as soon as we can!
        </h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form">
        
    <p> 
        <label for ="name">Enter Your Name</label>
        <input type="text" name ="name" id="name" required/><br>
    </p>
    <p> 
        <label for ="email">Enter your email so we can get back to you</label>
        <input type="text" name ="email" id="email" required/><br>
    </p>
     <p>
         <label for="message">Message</label>
         <textarea name="message" id="message" rows="4" cols="70" required></textarea>
     </p>
    <p>
           <input type="submit" name="submit" value="Contact Us!"/> 
    </p>
    
</form>

</main>



<?php
if(filter_has_var(INPUT_POST,'submit')){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
require '../PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'YOUR EMAIL';
$mail->Password = 'PASSWORD';
$mail->setFrom('YOUR EMAIL');
$mail->addAddress('YOUR EMAIL');
$mail->Subject = 'Message from Website!';
$mail->Body = 'From: '.$name.'     Email Address: '.$email.'       Message: '.$message;
//send the message, check for errors
if (!$mail->send()) {
    echo "<p>ERROR: ". $mail->ErrorInfo.'</p>';
} else {
    echo '<h3 style="text-align: center;"> Your Message Was Sent!</h3>';
}

}
?>

<?php include 'footer.php'; ?>
