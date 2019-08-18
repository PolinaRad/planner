  <?php 
              
      require "functions/db_connect.php";
    require "functions/functions.php";
    session_start();

         if(isset($_GET['link']))
         {
            $as_id=$_GET['link'];
            }
          
        $user_id =$_SESSION['user_id'];
        
    $sql_as = "Delete  FROM `assignment` where `user_id` = '$user_id' and `as_id` = '$as_id'";
       
    $mysqli->query($sql_as);
   
  redirect("all_assignments.php");

   
    
    ?>
