
 <?php  include 'header.php' ; ?>

<main>
    <form action='ValidateUser.php' method='POST' class="login" >
        
        <p>
        <label for='username'>Username</label> 
        <input type='text' name='username' required />
        </p>
        
        <p>
        <label for='password'>Password</label>
        <input type='password' name='password' required />
        </p>
        
        <input type='submit' name='submit' value='submit'/>
    </form>
    
    
</main>


<?php 

    
session_start();
if (isset($_SESSION['LoggedIn'])){
    if ($_SESSION['LoggedIn']== true){
      //automatically go to home page
      echo '<meta http-equiv="Refresh" content="0;URL=home.php">';
    }else{
        echo '<h3 style="text-align: center; color: red">Error: You entered an invalid username or password.</h3>';
        
        //unset the session so user wont get same error message when goes back to staffInfo page
        session_unset();
        session_destroy();
        
        //go back to login page after 3 seconds
        echo '<meta http-equiv="Refresh" content="3;URL=Login.php">';

    } 
}



?>


<?php include 'footer.php' ; ?>