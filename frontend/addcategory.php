 <?php
  
  include('header.php');
  $message='';
  if(isset($_POST['catname'])) {
        
        $catname =  $_POST['catname'];

        $result = mysqli_query($con,"SELECT * FROM categories WHERE  catname='" . $_POST['catname'] . "'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $message=alert_message('alert-danger','Category name is already taken.');  

        }
        else{
        $sql = "INSERT INTO categories (`catname`) VALUES ('$catname')";
        if(mysqli_query($con, $sql)){
            $message=alert_message('alert-success','Data uploaded successfully.');   
        } 
        else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($con);
        }
}
          }

        
        mysqli_close($con);

        ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
    
    </title>
</head>
<body>
<div class="container mt-3 ">
<div class="container-fluid">
     
  

<form action="" method="post" enctype="multipart/form-data">
  <div class="message"><?php if($message!="") { echo $message; } ?></div>
    



  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="catname" class="form-control"  placeholder="Bookname">

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>


</form>
 
</div>
</div>



</body>

<?php
include('footer.php');
?>
</html>