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


    <form name="assignment" onSubmit="return formValidationAs();" action="new_assignment.php" method="POST">
        <TABLE>
            <TR>
                <TD><label for="as_name">Assignment Name:</label></TD>
                <TD><INPUT type="text" id="as_name" NAME="as_name" SIZE=20 placeholder="name" /></TD>
            </TR>
            <TR>
                <TD><label for="sub_id">Subject:</label></TD>
                <TD>


                    <select type="text" id="sub_id" NAME="sub_id">


                        <?php 
               
 $sql_subject = "SELECT `sub_id`, concat(`sub_id`, ' ', `sub_name`) AS `sub_id_name` FROM `subject` where `user_id` = '$user_id'";
       
    $result_s = $mysqli->query($sql_subject);
     
    while($row = $result_s->fetch_assoc()) {
    
    ?>

                        <option value="<?php print($row["sub_id"]) ?>">
                            <?php print($row["sub_id_name"]); ?>

                        </option>

                        <?php }?>

                    </select>


                </TD>
            </TR>
            <TR>
                <TD><label for="as_mark">Your score:</label></TD>
                <TD><INPUT type="number" id="as_mark" NAME="as_mark" SIZE=5 placeholder="80" step="any" /></TD>
            </TR>

            <TR>
                <TD><label for="as_percent">Percentage:</label></TD>
                <TD><INPUT type="number" id="as_percent" NAME="as_percent" SIZE=5 placeholder="80" step="any" /></TD>
            </TR>

            <TR>
                <TD><label for="as_max_mark">Maximum score:</label></TD>
                <TD><INPUT type="number" id="as_max_mark" NAME="as_max_mark" SIZE=5 placeholder="90.0" step="any" /></TD>
            </TR>
            <TR>
                <TD><label for="as_cur_date">Current Date:</label></TD>
                <TD><input type="date" id="as_cur_date" name="as_cur_date" class="tcal" value="" /></TD>
            </TR>

            <TR>
                <TD><label for="as_due_date">Due Date:</label></TD>
                <TD><input type="date" id="as_due_date" name="as_due_date" class="tcal" value="" /></TD>
            </TR>
            <TR>
                <TD><label for="as_desc">Description:</label></TD>
                <TD><textarea rows="10" cols="50" id="as_desc" name="as_desc" placeholder="..."></textarea></TD>
            </TR>


        </TABLE>
      
        <INPUT TYPE="submit" id="submit" name="submit" VALUE="Submit" />
        <INPUT TYPE="reset" id="reset" name="reset" VALUE="Reset" />
    </form>


</body>

<footer>
    <p>Designed by Polina Radchenko 2019</p>
</footer>

</html>

<?php

if (isset($_POST['submit'])) {
    
  
    $as_name = val_input($_POST['as_name']);
      
    $as_cur_date = val_input($_POST['as_cur_date']);
    
     $as_due_date =val_input($_POST['as_due_date']);
    
    $as_desc = val_input($_POST['as_desc']);
    
     $sub_id = val_input($_POST['sub_id']);
    

    
  $sql = "SELECT `user_id`, `as_name` FROM `assignment` where `user_id` = '$user_id' and `as_name` = '$as_name' and `sub_id` = '$sub_id' ";
  
    
    $result = $mysqli->query($sql);


    
if ($result->num_rows > 0) {
    
    alert("This assignment is already exist. Please change the name.");
 }
 else { 
       $mysqli->query(" INSERT INTO `assignment` (`as_id`, `as_name`, `as_percent`, `as_mark`, `as_max_mark`, `as_due_date`, `as_cur_date`, `user_id`, `as_desc`, `sub_id`) VALUES (NULL, '$as_name', NULL, NULL, NULL,'$as_due_date','$as_cur_date','$user_id','$as_desc','$sub_id')");
     
   
     alert("Submit");
    redirect("all_assignments.php");
 }
    
     if(isset($_POST['as_mark'])) 
     {
        
         $as_mark = val_input_num($_POST['as_mark']);
         $mysqli->query(" UPDATE `assignment` SET `as_mark` = '$as_mark' WHERE `assignment`.`as_name` = '$as_name'");
          
     }
     if (isset($_POST['as_max_mark'])) 
     {  $as_max_mark = val_input_num($_POST['as_max_mark']);
      $mysqli->query(" UPDATE `assignment` SET `as_max_mark` = '$as_max_mark' WHERE `assignment`.`as_name` = '$as_name'");
      }
   if (isset($_POST['as_percent']))
    {
           $as_percent = val_input_num($_POST['as_percent']);
         $mysqli->query(" UPDATE `assignment` SET `as_percent` = '$as_percent' WHERE `assignment`.`as_name` = '$as_name'");
    }
         

  }



?>
