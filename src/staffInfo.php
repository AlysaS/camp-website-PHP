
<?php include 'header.php' ?>
<?php
session_start();
if (isset($_SESSION['LoggedIn'])){
    if ($_SESSION['LoggedIn']== true){
      
        //welcome user 
        echo '<main><h2>Hello '.$_COOKIE['username'].'</h2>';
        echo '<p>Here is some information about our staff members: </p>';
    
        //call function to display table of the staffs information
        displayStaffInfo();
    }else{
       header ("Location : Login.php");

    } 
}else{
       header ('Location: Login.php'); 
       exit();
    }
   


function displayStaffInfo(){
    //connect to database
    $conn = @mysqli_connect("localhost","root","","camp_summer")
            OR die("We could not get the information for you right now. Please let us know and we will try to solve the problem.");
    
    $sql= "SELECT * FROM staff_info ORDER BY lastName;";
    $data = @mysqli_query($conn, $sql);
    
    //if could connect and get data, create table and diplay the data
    if($data){
        echo '<table> <tr>'
                   . '<th>Last Name</th>'
                   . '<th>First Name</th>'
                   . '<th>Job in Camp</th>'
                   . '<th>Camp Email</th>   </tr>';
        
        //now loop through all data and put it into table
        while($row = mysqli_fetch_array($data)){
           echo '<tr><td>'.$row['lastName'].'</td> <td>'.$row['firstName'].'</td> <td>'
                   .$row['job'].'</td> <td>'.$row['camp_email'].'</td> </tr>';
        }
        echo '</table></main>';
    }else{
        echo "We could not get the information for you. Please let us know and we will try to solve the problem.</main>" ;
    }
    
    //close connection
    mysqli_close($conn);
}
?>

<?php include 'footer.php' ?>


