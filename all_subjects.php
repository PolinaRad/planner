
<?php 
require "functions/db_connect.php";
require "functions/functions.php";
session_start();
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
               
  $user_id = $_SESSION["user_id"];
   
    $sql_sub = "SELECT `sub_id`, concat(`sub_id`, ' ', `sub_name`) AS `sub_id_name` FROM `subject` where `user_id` = '$user_id'";
    
    
    $result_s = $mysqli->query($sql_sub);

    while($row = $result_s->fetch_assoc()) {
       $sub_id= $row["sub_id"];
    ?>
    <h4>
        <?php
        print(nl2br("Subject: ".$row["sub_id_name"]."\n"));
        ?>
    </h4>
    <p> <a class="clickMe" href="change_subject.php?link=<?php echo $sub_id;?> ">Change</a>
 </p>
     
    <?php } ?>
    
    
</div>
    
</body>

<footer>
    <p>Designed by Polina Radchenko 2019</p>
</footer>
