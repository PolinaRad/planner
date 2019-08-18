

<?php 
require "functions/db_connect.php";
require "functions/functions.php";
session_start();

if (isset($_POST['submit'])) {
    
   
   $sub_name = val_input($_POST['sub_name']);

    $sub_id = val_input($_POST['sub_id']);

    $sub_trimester = val_input($_POST['sub_trimester']);
    
    $sub_desc = val_input($_POST['sub_desc']);
    
    
    $user_id=$_SESSION["user_id"];
   
   
    $sql = "SELECT   `sub_id` FROM `subject` where `user_id` = '$user_id' and `sub_id` = '$sub_id' and `sub_name`='$sub_name'' ";
  
    
    $result = $mysqli->query($sql);


    
if ($result->num_rows > 0) {
    
    alert("This Subject is already exist. Please change the name.");
 }
 else {  
   $mysqli->query("INSERT INTO `subject` (`sub_id`, `sub_name`, `sub_desc`, `sub_trimester`,`user_id`) VALUES ('$sub_id', '$sub_name', '$sub_desc', '$sub_trimester','$user_id');");
    
     
   
     alert("Submit");
    redirect("all_subjects.php");
 }
    
    
   
}
  
  
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PLANNER</title>

    <link rel="stylesheet" href="styles.css">
</head>
    <script src="js/my_javascript.js"> </script>
    <script src="js/validation.js"> </script>
<body>
     <header>
            <h1><a href="index.php">Planner </a>  </h1>
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
                        <button class="dropbtn" id="1">Assignments</button>
                        <div class="dropdown-menu">
                            <a href="new_assignment.php">New assignment</a>
                            <a href="all_assignments.php">All assignments</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn" id="1">Subjects</button>
                        <div class="dropdown-menu">
                            <a href="new_subject.php">New subject</a>
                            <a href="all_subjects.php">All subjects</a>
                    </div>
                   </div> 
                    
                </ul>
            </nav>
        
        </header>
        

    
         <form name="subject" action="new_subject.php" onSubmit="return formValidationSub();"  method="POST">
    
        <TABLE>
            <TR>
                <TD><label for="sub_name">Subject Name:</label></TD>
                <TD><INPUT type="text" id="sub_name" NAME="sub_name" SIZE=20 placeholder="name" /></TD>
            </TR>        
            <TR>
                <TD><label for="sub_id">Subject ID:</label></TD>
                <TD><INPUT type="text" id="sub_id" NAME="sub_id" SIZE=20 placeholder="CP01234" /></TD>
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
