<?php include "header.php"; ?>
    
    
 <?php
//connect to database
                $conn = mysqli_connect("localhost","root","","camp_summer");
    ?>



<main>
    <h2>Have a message for your child?<br>
        Fill out the form below, and we will try to get the message to your camper as soon as possible!! </h2> 
        <form action="FormData.php" method="POST" id="contactForm">
            
            <!--ask parent info about camper- name, age, bunk -->
            <div>
                <p>
                <label for='fname'> Enter your child's first name</label>
                <input type="text" name="fname" id='fname' required/>
                </p>
                <p>
                <label for='lname'> Enter your child's last name </label>
                <input type="text" name="lname" id='lname' required/>
                </p>
                
                
            </div>
            
          <p>
            <label for="Grade">What grade is your child coming out of?</label>
            
                <?php
                $sql = "SELECT * FROM bunks GROUP BY grade;";
                $data = mysqli_query($conn, $sql);
                
                echo '<select name="grade" id="Grade">';
                
                if($data){
                    while($row = mysqli_fetch_array($data)){
                        
                        echo '<option>'.$row['grade'].'th</option>';
                    }
                }else {
                    echo '<option>There was an error getting this information.</option>';
                }
                
                echo '</select>';
                
                ?>
        
            </p>
        
            
            <p>
            <label for= "bunk">Please select your child's bunk</label>
               <?php
                $sql2 = "SELECT * FROM bunks;";
                $data2 = mysqli_query($conn, $sql2);
                
                echo '<select name="bunk" id="bunk">';
                
                if($data2){
                    while($row = mysqli_fetch_array($data2)){
                        
                        echo '<option>'.$row['bunk_name'].'</option>';
                    }
                    
                    //after gets all bunk names- also have option of 'Not sure!'
                    echo "<option selected>Not Sure!</option>";
                }else {
                    echo '<option>There was an error getting this information.</option>';
                }
                
                echo '</select>';
                
                ?>
            </p>
            
            <p>
                <label>Is this message urgent? (Please only click yes if your child needs this message in the next 3 hours)</label>
                <label for="yurgent">Yes</label>
                <input name="urgent" id="yurgent" type="radio" value="Yes" required/>
                <label for="nurgent">No</label>
                <input name="urgent" id="nurgent" type="radio" value="No" required/>
            </p>
            
            
            <!-- Message to camper -->
            <p>
                <label for="message">Message for your child</label>
                <textarea name="message" id="message" rows="4" cols="70" required></textarea>
            </p>
            
            <!-- Submit button -->
            <input type="submit" name="submit" value="sumbit"/>        </form>
  
</main>           

<?php 
  if(isset($_GET['error'])){
      if($_GET['error'] == 'emptyInput'){
          echo '<h2 style="text-align: center; color: red">Please fill out all the feilds!</h2>';
      }
  }
  ?>

    <?php include "footer.php"; ?>

<?php 
//close connection to database
   mysqli_close($conn);
   ?>


