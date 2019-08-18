

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PLANNER</title>
  <script src="js/validation_login.js"> </script>
  <link rel="stylesheet" href="styles.css">
      

</head>

<body>
<header>
     <h1><a href="index.php">Sign In</a>  </h1>
    
    </header>

  
        <form name="login" action="login.php" onSubmit="return formValidation();" method="post">  
      <h5>Please enter login and password.</h5>
            <TABLE>
           
                <TR>
                <TD><label for="user_login">Login:</label></TD>
                <TD><INPUT type="text" id="user_login" NAME="user_login" SIZE=20 placeholder="Login" /></TD>
            </TR>
           
            <TR>
                <TD><label for="user_password">Password:</label></TD>
                <TD><INPUT type="password" id="user_password"  NAME="user_password" SIZE=20 placeholder="Password" /></TD>
                </TR>
        
          <TR>      
              <td>  <div class="container"><input TYPE="submit" name="submit" VALUE="SIGN IN" class="btn"/> </div>  </td>  </TR>
                
                
        </TABLE>
       
            <p>First time?</p>
   <p> <a href="reg.php">Registration</a></p>
            </form>
     


</body>
                    
<footer>
    <p>Designed by Polina Radchenko 2019</p>
</footer>



<?php
require "functions/db_connect.php";
require "functions/functions.php";
session_start();

   
if (isset($_POST['submit'])) 
{
      
$user_login = val_input($_POST['user_login']);
     
$user_password = md5($_POST['user_password']);
    
    
    $sql = "SELECT user_id, user_login, user_password FROM user where user_login = '$user_login' and user_password = '$user_password';";



$result = $mysqli->query($sql);

             
    
if ($result->num_rows > 0) {
    $_SESSION["user_login"] = $user_login;
    
    while($row = $result->fetch_assoc()) {
      
       $_SESSION["user_id"] =  $row["user_id"];
    }
    
    alert("Welcome to the Planner!");
  redirect("index.php");
}
 else if ($result->num_rows == 0){
    alert("Your password or login is incorret. Please try another one.");
}
   
}

$mysqli-> close();

?>