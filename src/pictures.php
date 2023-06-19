<?php
include 'header.php';

$conn = mysqli_connect("localhost","root","","camp_summer");



$query= "SELECT * FROM pictures;";
$result = mysqli_query($conn, $query); 
$post = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);      



//diplay the pictures from each week!!
$weekNum = '';
  for($i =1; $i<=3 ; $i++){

         switch ($i){
             case 1: 
                 $weekNum = 'week_one';
                 break;
             case 2:
                 $weekNum = 'week_two';
                 break;
             case 3:
                 $weekNum = 'week_three';
                 break;
         }
         
//print the pictures from each week   
    echo "<h1 style:'text-align:center;' id='$weekNum' >Week $i: </h1>";
    
    foreach($post as $pic){
        if($pic['week']=== $weekNum){
    echo '<td>' .
      '<img src = "data:image/png;base64,' . base64_encode($pic['blobimage']) . '" width = "350px" height = "220px"/>'
      . '</td>';
        }
        
      }
      
     }
      
include 'footer.php';

?>