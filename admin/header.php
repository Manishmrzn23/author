
<?php
include('db.php'); 
include('function_alert.php');
if(!isset($_SESSION['ADMINLOGIN'])){
    header('location:../login.php');
    die();

}
?>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style type="text/css">
    body{
      height: 100%;
      margin: 0;
    }
    .bg {
  
  background-image: url("author.jpeg");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  margin-top: 0;
}

  </style>

<title>User Login</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-0">
  <a class="navbar-brand" href="dashboard.php">BLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="addnewpost.php">Add new post<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="authors.php">Blog Posts<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="viewcategory.php">Categories<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="addcategory.php">Add Categories<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="view_authors.php">Authors<span class="sr-only">(current)</span></a>
      </li>
     <li class="nav-item active">
        <a class="nav-link" href="admin_user_reg.php">Create Authors<span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="Unregistered_users.php">Unregistered Authors<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text">
    
      <?php
      echo "welcome ".$_SESSION['abc'];
      ?>|
      <a href="logout.php">logout</a>
    </span>
  </div>
</nav>
<br/>


</body>
</html>