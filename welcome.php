<?php
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
    <body>
        <header>
           <h1><a href="index.php">Welcome to the Planner </a>  </h1>
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
 <div class="list"> 
        <h3>Welcome to the Planner!</h3>
        
        <a class="clickMe" href="login.php">Log In</a>
        <a class="clickMe" href="reg.php">Registration</a>
        <p>We will happy to help you orginize, control and manage your study tasks and subjects!</p>
    <p>How it works:</p>
        <ul><li>Create Subject;
            </li>
            <li>Create Assignment;
            </li>
            <li>Change Subject or Assignment if additional information appeared. Be careful you cannot delete subject;
            </li>
            <li>Done!
            </li>
        </ul>
        <p>Now you can work! </p>
     </div>
    </body>
    
    
    <footer>
       <p>Designed by Polina Radchenko 2019</p> 
    </footer>