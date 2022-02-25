<?php
include('header.php');
if (isset($_REQUEST['sid'])) {
  $sid = $_REQUEST['sid'];
}
if (isset($sid)){
    $result=mysqli_query($con,"select * from auth_wait where id_auth='$sid'");
    $row=mysqli_fetch_array($result);
   
}
 $sql = "INSERT INTO auth_reg (name,email,password,photo,facebook,twitter,instagram)
SELECT name,email,password,photo,facebook,twitter,instagram
FROM auth_wait
WHERE id_auth='$sid'";
 if(mysqli_query($con, $sql)){
       $del="DELETE FROM auth_wait WHERE  id_auth='$sid'";
        if(mysqli_query($con, $del)){
          header('location:Unregistered_users.php');
          }
          else{
            echo "ERROR: Hush! Sorry $sql. ". mysqli_error($con);
        }
      }
      
      
      
         
        // Close connection
        mysqli_close($con);
        ?>


