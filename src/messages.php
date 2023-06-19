<?php

include 'header.php';

$conn = @mysqli_connect("localhost","root","","camp_summer")
            OR die("We could not get the information for you right now. Please let us know and we will try to solve the problem.");
    
    $sql= "SELECT * FROM contact_camper ORDER BY urgent DESC;";
    $data = @mysqli_query($conn, $sql);
    
    //if could connect and get data, create table and diplay the data
    if($data){
        echo '<main><table> <tr>'
                   . '<th>First Name</th>'
                   . '<th>Last Name</th>'
                   . '<th>Grade</th>'
                   . '<th>Bunk</th>'
                   . '<th>Urgent</th>'
                   . '<th>Message</th>'
                   . '</tr>';
        
        //now loop through all data and put it into table
        while($row = mysqli_fetch_array($data)){
           echo '<tr><td>'.$row['firstName'].'</td> <td>'.$row['lastName'].'</td> <td>'
                   .$row['grade'].'</td> <td>'.$row['bunk'].'</td><td>'.$row['urgent'].'</td> <td>'.$row['message'].'</td></tr>';
        }
        echo '</table></main>';
    }else{
        echo "We could not get the information for you. Please let us know and we will try to solve the problem.</main>" ;
    }
    
    //close connection
    mysqli_close($conn);
    
    include 'footer.php';
    
    ?>