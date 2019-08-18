<?php 
require "functions/db_connect.php";
require "functions/functions.php";
session_start();
 
$user_id = $_SESSION["user_id"];


?>

<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PLANNER</title>
<script src="js/my_javascript.js"> </script>
<script src="js/validation.js"> </script>
<link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="simple-calendar/tcal.css" />
    <script type="text/javascript" src="simple-calendar/tcal_en.js"></script>
</head>


<body>
    <header>
        <h1><a href="index.php">Planner </a> </h1>
        <div id="user">
            <p>
                <?php
    print(" User: ".$_SESSION["user_login"]);
?><a class="clickMe" href="logout.php">Logout</a>
            </p>

        </div>
        <nav>
            <ul>
                <div class="dropdown">
                    <button class="dropbtn">Assignments</button>
                    <div class="dropdown-menu">
                        <a href="new_assignment.php">New assignment</a>
                        <a href="all_assignments.php">All assignments</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Subjects</button>
                    <div class="dropdown-menu">
                        <a href="new_subject.php">New subject</a>
                        <a href="all_subjects.php">All subjects</a>
                    </div>
                </div>

            </ul>
        </nav>

    </header>



<form name="subject" action="change_subject.php" onSubmit="return formValidationSub();"  method="POST">
    
         <?php 
              
           if(isset($_GET['link']) /*you can validate the link here*/){
    $_SESSION['link']=$_GET['link'];
 }
         $sub_id =    $_SESSION['link'];
        

         
    
    ?>
        <TABLE>
            <TR>
                <TD><label for="sub_name">Subject Name:</label></TD>
                <TD><INPUT type="text" id="sub_name" NAME="sub_name" SIZE=20 value = ""/></TD>
            </TR>        
            
            <TR>
                <TD><label for="trimester">Trimester:</label></TD>
                <TD>
                    <select type="number" id="sub_trimester" NAME="sub_trimester" >
                    <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                    </select></TD>
                   
             </TR>         
                     
            <TR>
                <TD><label for="sub_desc">Description:</label></TD>
                <TD><textarea rows="10" cols="50" id="sub_desc" name="sub_desc" placeholder="..." ></textarea></TD>
                </TR>
            
          
        </TABLE>
       
        <INPUT TYPE="submit" id= "submit" name="submit" VALUE="Submit" />
         <INPUT TYPE="reset" id="reset" name="reset" VALUE="Reset" />    
        
    </form>

</body>

<footer>
    <p>Designed by Polina Radchenko 2019</p>
</footer>

</html>

<?php

if (isset($_POST['submit'])) {
    
  
  
    
    
    $user_id=$_SESSION["user_id"];
  
    $sql = "SELECT   `sub_id` FROM `subject` where `user_id` = '$user_id' and `sub_id` != '$sub_id' and `sub_name`='$sub_name'' ";
  
    $result_s = $mysqli->query($sql);


    
if ($result_s->num_rows > 0) {
    
    alert("This subject is already exist. Please change the name.");
 }
 else { 
      if(isset($_POST['sub_name'])) 
     {
        
         $sub_name = val_input_num($_POST['sub_name']);
         $mysqli->query(" UPDATE `subject` SET `sub_name` = '$sub_name' WHERE `subject`.`sub_id` = '$sub_id'");
          
     }
     if(isset($_POST['sub_trimester'])) 
     {
           $sub_trimester = val_input($_POST['sub_trimester']);
         
         $mysqli->query(" UPDATE `subject` SET `sub_trimester` = '$sub_trimester' WHERE `subject`.`sub_id` = '$sub_id'");
          
     }
     if(isset($_POST['sub_desc'])) 
     {
        
         $sub_desc = val_input($_POST['sub_desc']);
         $mysqli->query(" UPDATE `subject` SET `sub_desc` = '$sub_desc' WHERE `subject`.`sub_id` = '$sub_id'");
          
     }
    
     alert("Done!");
    redirect("all_subjects.php");
 }
    
     
         

  }



?>
