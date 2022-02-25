<?php
    include('db.php');
    include('function_alert.php');

    if(isset($_SESSION['LOGIN'])){
        header('location:dashboard.php');
        die();
    }

    if (isset($_SESSION['ADMINLOGIN'])) {
        header('location:admin/admin.php');
    }

    $message='';
    if (isset( $_POST['password']) && isset($_POST['email']) && !isset($_SESSION['LOGIN']) && !isset($_SESSION['ADMINLOGIN'])) {
        $password =mysqli_real_escape_string($con,$_POST['password']);
        $email =mysqli_real_escape_string($con,$_POST['email']);
        $res=mysqli_query($con,"select * from auth_reg where email='$email'");
        if(mysqli_num_rows($res)>0){
            $row=mysqli_fetch_assoc($res);
            $verify=password_verify($password,$row['password']);
            $_SESSION['role']= $row['role'];
            if ($verify) {
                $_SESSION['EMAIL']=$row['email'];
                if ($row['role']=="user"){
                    $_SESSION['LOGIN']=true;
                    $_SESSION['ID']=$row['auth_id'];
                    header('location:dashboard.php');
                } elseif ($row['role']=="admin"){
                    $_SESSION['ADMINLOGIN']=true;
                    $_SESSION['abc']=$row['name'];
                    header('location:admin/admin.php');
                }
                die();
            }
            else {
                 $message=alert_message("alert-danger","user password doesn't match.");
            }
        }
        else{
            $message=alert_message("alert-danger","Email doesnt match.");
        }
    }
    mysqli_close($con);
?>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>User Login</title>
</head>
<body>

<section class="h-100 h-custom" style="background-color: #8fc4b7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">login</h3>
            <form action="" method="POST" class="px-md-2">
                <div class="message pt-0 pb-3 font-italic">
                    <?php if($message!="") 
                { 
                    echo $message; 
                } 
            ?>
                </div>
                <div class="form-outline mb-4">
                  <label class="Email" for="form3Example1q">Email</label>
                <input type="text" id="form3Example1q" name="email" class="form-control" >
              
              </div>
               <div class="form-outline mb-4">
                 <label class="form-label">password</label>
                <input type="password" name="password" class="form-control" >
              </div>
             
              <button type="submit" class="btn btn-success btn-lg mb-1">login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>