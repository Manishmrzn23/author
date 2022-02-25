<?php 
 include('header.php');
 $message='';



?>

<!DOCTYPE html>
<html>
<head>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<div class="container mt-3 ">
		<div class="container-fluid">
		<div class="message"><?php if($message!="") { echo $message; } ?></div>
<style>


table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<?php

$result=mysqli_query($con,"select * from categories ");
$rowc=mysqli_num_rows($result);
?>
<table class="table " style="width:100%">
	<thead>
	<tr>
		<th scope="col">Category Id</th>
		<th scope="col">Category Name</th>
		<th scope="col">Modify</th>

	</tr>
	</thead>
	<tbody>
	<?php
	for($i=1;$i<=$rowc;$i++){

	$row=mysqli_fetch_array($result);
	?>
	<tr>
	<td> <?php echo $row["cat_id"];?></td>	
	<td><a style=" text-decoration: none;"  href="check_cat.php?sid=<?php echo $row["catname"] ?>"><?php echo $row["catname"];?>  </a></td>
	<td>
		<button type="button" class="btn   btn-outline-info" ><a  style="  color: black; text-decoration: none;" href="update_books.php?sid=<?php echo $row["cat_id"] ?>"> update</a></button><br>
		<button type="button" class="btn   btn-outline-danger" style=" text-decoration: none;"><a  style=" color: black; text-decoration: none;" href="?delid=<?php echo $row["cat_id"] ?>">delete</a></button>
	</td>	
	</tr>


<?php
	}
?>
</tbody>
</table>
</div>
</div>
</body>
<?php
include('footer.php');
?>
</html>
