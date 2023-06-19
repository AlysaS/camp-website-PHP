<?php

include 'header.php';
//get information that user entered into form
    $fname= $_POST['fname'];
    $lname = $_POST['lname'];
    $grade = $_POST['grade'];
    $bunk = $_POST['bunk'];
    $urgent = $_POST['urgent'];
    $message = $_POST['message'];

 //validate that user did not just enter spaces- there must be real words in the form   
if((substr_count($fname, ' ') === strlen($fname)) || (substr_count($lname, ' ') === strlen($lname)) || (substr_count($message, ' ') === strlen($message))){
    header ('Location: Form.php?error=emptyInput');
  exit();
    
}  else{
   
    sendToDatabase($fname,$lname,$grade,$bunk,$urgent,$message);
  
 
    displayData($fname,$lname,$grade,$bunk,$urgent,$message);
    

}

  function sendToDatabase($fname,$lname,$grade,$bunk,$urgent,$message){
   //connect to database
    $conn = @mysqli_connect("localhost","root","","camp_summer")
            OR die("An error occured. Please let us know so we can fix it. Thank you!");
   $sql = "INSERT INTO contact_camper (firstName,lastName,grade,bunk,urgent,message) VALUES (?,?,?,?,?,?);";
   $stmt = mysqli_stmt_init($conn);      

    mysqli_stmt_prepare($stmt, $sql);
    //bind users information to the statement 
    mysqli_stmt_bind_param($stmt, "ssssss", $fname,$lname,$grade,$bunk,$urgent,$message);
    //send info to database
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    mysqli_close($conn);
    }
    
    
 function displayData($fname,$lname,$grade,$bunk,$urgent,$message){
    echo '<main>';
    echo "<h2>Your message is on its way!</h2>";
    echo "<p>Campers name: ".$fname." ".$lname."</p>";
    echo "<p>Grade: ".$grade."</p>";
    echo "<p>Bunk: ".$bunk."</p>";
    echo "<p>Urgent? (y/n): ".$urgent."</p>";
    echo "<p>Message: ".$message."</p></main>";
 
    }
 
 include 'footer.php';
 
 ?>