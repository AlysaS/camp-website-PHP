<?php

session_start();
$_SESSION['LoggedIn']= false;

//connect to database
$conn = mysqli_connect("localhost","root","","camp_summer");

//get username and password that user entered into form
$username= $_POST['username'];
$password = $_POST['password'];
//get role to store as cookie

//check to see if user entered a valid username and password pair
$sql = "SELECT username, password, role FROM authorized_user WHERE username= ? AND password= ?";
$stmt = mysqli_stmt_init($conn);      

mysqli_stmt_prepare($stmt, $sql);
//bind username and passord to the statement 
mysqli_stmt_bind_param($stmt, "ss", $username, $password);

 mysqli_stmt_execute($stmt);


//fetch data and put into an array
$data= mysqli_stmt_get_result($stmt);

$array = mysqli_fetch_all($data,MYSQLI_ASSOC);



//check if there is anything in the array- if yes: give user access to the staff info page
// if not - bring user back to login pge with error

if(empty($array)){
    loginFalse();  
}else if (count($array)=== 1){
             //print_r($array);
//get role to store as cookie
$role = $array[0]['role'];
    valid($username,$role);
    
}else{
    loginFalse();
}





  
  function valid($un,$role){
      //set username and role cookies
      setcookie('username',$un);
      setcookie('role',$role);
      //set session varibale loggedIn to true
      $_SESSION['LoggedIn']= true; 
      
  }
  
  function loginFalse(){
       //set session varibale loggedIn to false
      $_SESSION['LoggedIn']= false; 
      
  }
  
  
  //go back to login page next page
  header( 'Location: Login.php');

?>
