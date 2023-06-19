<?php
include 'header.php'
?>

<?php 
echo "<h2 style='text-align: center'>You are signed in as ".$_COOKIE['username']."</h2>";
?>
<form action='logout.php' method='POST' id='signout'>
    
    <input type='submit' name='signout' value='Sign out'/>
   
</form>

<?php

if (isset($_POST['signout'])){
//destroy cookies session and cookies
session_start();
session_unset();
session_destroy();

setcookie('username','',time() - 4800);
setcookie('role', '',time() - 4800);

echo '<h2 style= "text-align: center">We are logging you out...</h2>';

echo '<meta http-equiv="Refresh" content="2;URL=home.php">';

}
?>

