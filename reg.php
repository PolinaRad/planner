<?php
require "functions/db_connect.php";
require "functions/functions";

if (isset($_POST['submit'])) {
    
   
    $user_login = val_input($_POST['user_login']);

    $user_email = val_input($_POST['user_email']);

    $user_password = md5($_POST['user_password']);
  
     
$sql = "SELECT user_id, user_login, user_email FROM user where user_login = '$user_login'";

    $result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
       $user_id= $row["user_id"];
    }
    alert("Login is busy. Please choose another one".$user_id);
 }
 else {
   $mysqli->query("INSERT INTO `user` (`user_id`, `user_login`, `user_email`, `user_password`) VALUES (NULL, '$user_login', '$user_email','$user_password');");
     
    redirect("login.php");
}
 

}

$mysqli-> close();

?>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PLANNER</title>
  <script src="js/validation_reg.js"> </script>
    <link rel="stylesheet" href="styles.css">


</head>

<body>
<header>
     <h1><a href="index.php">Sign Up </a>  </h1>
    
    </header>

    <form name="registration" onSubmit="return formValidation();" action="reg.php" method="POST">
        <h5>Please enter your details.</h5>
        <TABLE>
            <tr>
                <td><label for="user_login">Login:</label></td>
                <td><INPUT type="text" id="user_login" NAME="user_login" SIZE=20 placeholder="nickname"/></td>
           </tr>
           <tr>
                <td><label for="user_email">E-mail:</label></td>
                <td><INPUT type="email" id="user_email" NAME="user_email" SIZE=20 placeholder="email@planner" /></td>
           </tr>
            <tr>
                <td><label for="user_password">Password:</label></td>
                <td><INPUT type="password" id="user_password"  NAME="user_password" SIZE=20 placeholder="password" /></td>
           </tr>
            <tr>
                <td><label for="user_password2">Repeat Password:</label></td>
                <td><INPUT type="password" id="user_password2"  NAME="user_password2" SIZE=20 placeholder="password" /></td>
           </tr>
            <tr>
               <td> <div class="container"><input TYPE="submit" name="submit" VALUE="SIGN UP" class="btn"/> </div> </td>
                `</tr>    
        </TABLE>

       <p>Already have an account?</p>
   <p> <a href="login.php">Log In</a></p>
            </form>
 

</body>
  
     
                
                       
<footer>
    <p>Designed by Polina Radchenko 2019</p>
</footer>
                    </html>
