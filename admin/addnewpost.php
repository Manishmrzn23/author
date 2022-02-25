<?php
include('header.php');
$message='';



        if(isset($_POST['submit'])&& isset($_POST['title'])&& isset($_POST['shortdes'])&& isset($_POST['content'])&& isset($_FILES['fileToUpload'])&& isset($_POST['checkbox'])&& isset($_POST['date'])) {
        $filename = $_FILES["fileToUpload"]["name"];
        $tempname = $_FILES["fileToUpload"]["tmp_name"];
        $folder="../image/".$filename;
        
        
        $title =  mysqli_real_escape_string($con,$_POST['title']);
        $shortdes =  mysqli_real_escape_string($con,$_POST['shortdes']);  
        $content =  mysqli_real_escape_string($con,$_POST['content']);  
        $checkbox = $_POST['checkbox'];
        $date =  $_POST['date'];
        $chk='';
        foreach($checkbox as $check1){
        	$chk.=$check1.",";
          $trims= trim($chk,",");
        }
          
       
        $sql = "INSERT INTO post(`auth_name`,`title`,`shortdes`,`content`,`photo`,`checkbox`,`date`) VALUES ('admin','$title','$shortdes','$content','$filename','$trims','$date')";

          if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";

        }else{

            $msg = "Failed to upload image";

    }
        if(mysqli_query($con, $sql)){
            $message=alert_message('alert-success','Data uploaded successfully.');   
        } 
        else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($con);
        
}
          }

        
        mysqli_close($con);
?>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>User Login</title>
</head>
<body>
   
    
  
<div class="container mt-3 ">
		<div class="container-fluid">
  

<form action="" method="post" enctype="multipart/form-data">
  <div class="message"><?php if($message!="") { echo $message; } ?></div>

	


 
  <div class="form-row">
  	<div class="form-group col-md-6">
      <label>Title</label>
      <input type="text" class="form-control" name="title" id="roll"  required>
    </div>
</div>
   <div class="form-group">
    <label>Short description</label>
      <input type="text" class="form-control" name="shortdes" id="roll"  required>
  </div>
  <div class="form-group">
    <label>Content</label>
      <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" name="content" rows="10"></textarea>
  </div>
   <div class="form-group">
    <label for="inputAddress2">Featured Image</label>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"   required>
  </div>
  <div class="form-group">
    <label >Categories</label>
    <?php
    $con = mysqli_connect('localhost','root','','vlog') or die('Unable To connect');
        $querys="select * from categories";
        $results=mysqli_query($con,$querys);
        while ($rowas=mysqli_fetch_assoc($results)) {
         ?>
         <br>
         <input type="checkbox" name="checkbox[]"  value="<?php echo $rowas["catname"];  ?>"> <?php echo $rowas["catname"];  ?>  
         
        
        <?php
        
         }

         ?>
    </select>

       
      
    
  </div>
 
   <div class="form-group">
    <label for="inputAddress2">Date</label>
    <?php 
     $datee=date("Y-m-d");
     ?>
    <input type="text" name="date" id="fileToUpload" value="<?php echo $datee;  ?>" class="form-control"  placeholder="<?php echo $datee;  ?>" required>
  </div>
 <br>
 <?php
 $result=mysqli_query($con,"select * from auth_reg where email='".$_SESSION['EMAIL']."'");
 $row=mysqli_fetch_array($result);
 ?>
  <button type="submit" name="submit" value="?sid=<?php echo $row["auth_id"]; ?>"  class="btn btn-primary"><a  href="index.php?sid=<?php echo $row["auth_id"] ?>"></a>REGISTER</button>


</form>
 
</div>
</div>
<?php
include('footer.php');
?>
</body>
</html>