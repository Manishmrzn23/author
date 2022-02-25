 <?php

        include('db.php');
        include('function_alert.php');
        $message='';
        if(isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword']) && isset($_FILES['fileToUpload'])) {

        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
        $name = $_POST['name'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $instagram = $_POST['instagram'];
        $filename = $_FILES["fileToUpload"]["name"];
        $tempname = $_FILES["fileToUpload"]["tmp_name"];
        $folder="image/".$filename;
        $secure_pass = password_hash($pass, PASSWORD_DEFAULT);

          $sql = "INSERT INTO auth_wait (`name`, `email`,`password`, `photo`,`facebook`, `twitter`,`instagram`) VALUES ('$name', '$email','$secure_pass','$filename','$facebook','$twitter','$instagram')";
          $data = $_POST;
          
         if (empty($data['email']) ||
            empty($data['password']) ||
            empty($data['cpassword'])) {
             $message=alert_message(" alert-danger","Please fill all required fields");  
        }
        
         elseif ($data['password'] !== $data['cpassword']) {
               $message=alert_message(" alert-danger","Both passwords should match");  
  
        }
        else{
          $select = mysqli_query($con, "select * from auth_wait where email = '".$_POST['email']."' union all select * from auth_reg where email = '".$_POST['email']."'");
          if(mysqli_num_rows($select)>0) {
              $message=alert_message(" alert-danger","This email already exists");
          }
          elseif(mysqli_query($con, $sql)){
          $message=alert_message(" alert-success","We will verify your detail and accept your registration soon. ");
          }
          else{
            echo "ERROR: Hush! Sorry $sql. ". mysqli_error($con);
        }
      } 
      }
      
         
        // Close connection
        mysqli_close($con);
        ?>
      
<html>
<head>
	<meta charset="utf-8">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>
		registration
	</title>
</head>

<body>


  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
     
        <div class="card rounded-3">
          <img src="author.jpeg" class="w-100"  alt="Sample photo" height="400" width="200">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration</h3>

            <form action="" method="POST" class="px-md-2" enctype="multipart/form-data">
              <div class="message pt-0 pb-3 font-italic">
                
                 <?php if($message!="") 
                { 
                    echo $message; 
                  
                } 
            ?>
                
              </div>
               <div class="form-outline mb-4">
                  <label class="Email" for="form3Example1q">Name</label>
                <input type="text" id="form3Example1q" name="name" class="form-control" required>
              
              </div>
              <div class="form-outline mb-4">
              	  <label class="Email" for="form3Example1q">Email</label>
                <input type="email" id="form3Example1q" name="email" class="form-control" required>
              
              </div>
               <div class="form-outline mb-4">
                 <label class="form-label" >password</label>
                <input type="password"  name="password" class="form-control" required>
               
              </div>
              <div class="form-outline mb-4">
                 <label class="form-label" >Confirm password</label>
                <input type="password"  name="cpassword" class="form-control" required>
               
              </div>
              <div class="form-outline mb-4">
                  <label  for="form3Example1q">Photo</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"  placeholder="Upload photo" required>
              </div>
                  <label class="lead" for="exampleInputPassword1">Social Media Links</label><br><br>
                  <div class="form-outline mb-4">
                  <label  for="form3Example1q">Facebook</label>
                <input type="text" id="form3Example1q" name="facebook" class="form-control" required>
              </div>
               <div class="form-outline mb-4">
                  <label  for="form3Example1q">Twitter</label>
                <input type="text" id="form3Example1q" name="twitter" class="form-control" required>
              </div>
               <div class="form-outline mb-4">
                  <label  for="form3Example1q">Instagram</label>
                <input type="text" id="form3Example1q" name="instagram" class="form-control" required>
              </div>
             
              <button type="submit" name="submit" class="btn btn-success btn-lg mb-1">Register</button>

            </form>

        </div>
      </div>
    </div>
  </div>


</body>
</html>