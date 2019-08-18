<?php
// Start the session
session_start();
?>
<?php 
require "functions/db_connect.php";
require "functions/functions.php";

if (isset($_POST['submit'])) {
    

    
   
    $as_name = val_input($_POST['as_name']);

    $as_mark = val_input($_POST['as_mark']);

    $as_max_mark = val_input($_POST['as_max_mark']);
     
    $as_percent = val_input($_POST['as_percent']);
      
    $as_cur_date = val_input($_POST['as_cur_date']);
    
     $as_due_date =val_input( $_POST['as_due_date']);
    
    $as_desc = val_input($_POST['as_desc']);
    
    
     $sub_id = val_input($_POST['sub_id']);
    $user_id = $_SESSION["user_id"];
     
$sql = "SELECT `user_id`, `as_name` FROM `assignment` where `user_id` = '$user_id' and `as_name` = '$as_name' and `sub_id` = '$sub_id' ";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    
    alert("This assignment is already exist. Please change the name.");
 }
 else { 
     
     
     $mysqli->query("INSERT INTO `assignment` (`as_id`, `as_name`, `as_percent`, `as_mark`, `as_max_mark`, `as_due_date`, `as_cur_date`, `as_desc`,`user_id`, `sub_id`) VALUES (NULL, '$as_name', '$as_percent', '$as_mark','$as_max_mark', '$as_due_date', '$as_cur_date', '$as_desc', '$user_id', '$sub_id');");
    
      $sub_mark = $as_mark*$as_percent/$as_max_mark;

     redirect("all_assignments.php");}
     
      
 }



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PLANNER</title>
     <link rel="stylesheet" href="styles.css">
    
</head>
    <script src="js/my_javascript.js"> </script>
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
        
<div class="list"> 
    <?php 
              $_SESSION["as_id"]=0; 
  $user_id = $_SESSION["user_id"];
    
   $sql_as =  "SELECT `user_id`, `as_id`, `sub_id`, `as_name`, `as_percent`, `as_mark`, `as_max_mark`, `as_due_date`, `as_cur_date`, `as_desc`, (`as_mark`*`as_percent`/`as_max_mark`) AS `as_your_percent`, `sub_id`  FROM `assignment` where `user_id` = '$user_id'";
      
    
    $sql_sub_id = "SELECT `sub_id`  FROM `assignment` where `user_id` = '$user_id'";
    

    $sql_sub = "SELECT `sub_id`, concat(`sub_id`, ' ', `sub_name`) AS `sub_id_name` FROM `subject` where `user_id` = '$user_id' ";
   
    
    $result_sub_id = $mysqli->query($sql_sub_id);
    $result_s = $mysqli->query($sql_sub);
     $result_a = $mysqli->query($sql_as);
     
   
    while($row_a = $result_a->fetch_assoc()) {
        $sub_id=row_a["sub_id"];
    ?>
    <h4>
        <?php
        print(nl2br("Subject: ".$row_a["sub_id"]."\n"));
        
      ?> </h4>
      <h5>  <?php print(nl2br("Assignment: \n"));
          $as_id=$row_a["as_id"];?>
           <?php print(nl2br($row_a["as_name"]."\n")); ?> </h5>
    
  <p> <a class="clickMe" href="change_assignment.php?link=<?php echo $as_id;?> ">Change</a>
      <a class="clickMe" href="delete_assignment.php?link=<?php echo $as_id;?> ">Delete</a> </p>
   
   

 
     <?php 
          if(!empty($row_a["as_percent"])){
     ?>
    <ul> <li>
         <?php
       print(nl2br("Per cent out of total: ".$row_a["as_percent"]."%;\n"));
        
        }
         ?>
       
    </li>
     <?php if(!empty($row_a["as_max_mark"])){
     ?>
     <li>
         <?php
       print(nl2br("Maximum score for this assignment: ".$row_a["as_max_mark"].";\n"));
        
        }
         ?>
       
    </li>
        <?php if(!empty($row_a["as_mark"])){
     ?>
     <li>
         <?php
       print(nl2br("Your score for this assignment: ".$row_a["as_mark"].";\n"));
        
        }
         ?>
    </li>
         <?php if(!empty($row_a["as_mark"]) && !empty($row_a["as_max_mark"]) && !empty($row_a["as_percent"])){
      
    
     ?>
     <li>
         <?php
       print(nl2br("Your percent for this assignment out of total mark for this subject: ".$row_a["as_your_percent"]."%;\n"));
             
           
        }
         ?>
      <?php if(!empty($row_a["cur_date"])) {
      
    
     ?>
     <li>
         <?php
       print(nl2br("Start date: ".$row_a["cur_date"]."%;\n"));
             
           
        }
         ?>
     <?php if(!empty($row_a["due_date"])){
      
    
     ?>
     <li>
         <?php
       print(nl2br("Due date: ".$row_a["due_date"]."%;\n"));
             
           
        }
         ?>
    
     
     </ul>
      
    <?php }  ?>
    
     
    
   
</div>
    
</body>

<footer>
    <p>Designed by Polina Radchenko 2019</p>
</footer>
