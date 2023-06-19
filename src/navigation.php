
<ul id="navigation" class="slimmenu">
    <li><a href="home.php">Home</a></li>
    <li><a href="Form.php">Contact Camper</a></li>
  

    <?php
    
    /*if user is an administrator, allow them to see all messages sent in*/
        if(isset($_COOKIE['role'])){
            if($_COOKIE['role'] == 'administrator'){
                echo '<li><a href= "messages.php">Messages</a></li>';
            }
    }
    ?>
    <li><a href= "staffInfo.php" >Staff Contact Information</a></li>
    
   
    <li><a href="pictures.php">Pictures</a>
        <ul>
            <li><a href="pictures.php#week_one">Week One</a></li>
            <li><a href="pictures.php#week_two">Week Two</a></li>
            <li><a href="pictures.php#week_three">Week Three</a></li>
        </ul>
    </li>
    
    
    <li><a href="contactOffice.php">Contact Us!</a></li>
    
   
     <?php 
     //if user is signed in display sign out button, and if not than display sign in 
        if(isset($_COOKIE['username'])){
                echo '<li><a href= "logout.php">Sign Out</a></li>';
        }else{
            echo '<li><a href= "login.php">Sign In</a></li>';
    }
    ?>
</ul>


<script src="jquery.slimmenu.min.js"></script>
<script>
    $('#navigation').slimmenu(
{
    resizeWidth: '800',
    collapserTitle: 'Main Menu',
    animSpeed: 'medium',
    easingEffect: null,
    indentChildren: false,
    childrenIndenter: '&nbsp;'
});</script>

