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

$result=mysqli_query($con,"select * from post ");
$rowc=mysqli_num_rows($result);
?>
<table class="table " style="width:100%">
	<thead>
	<tr>
		<th scope="col">Title</th>
		<th scope="col">Authors_id</th>
		<th scope="col">Author_name</th>
		<th scope="col">Published date</th>
		<th scope="col">Categories</th>
		<th scope="col">Image</th>
		<th scope="col">Modify</th>

	</tr>
	</thead>
	<tbody>
	<?php
	for($i=1;$i<=$rowc;$i++){

	$row=mysqli_fetch_array($result);
	?>
	<tr>
	<td><?php echo $row['title'];?></td>	
	<td><?php echo $row["auth_id"];?></td>	
	<td><?php echo $row["auth_name"];?></td>	
	<td><?php echo $row["date"];?></td>	
	<td><?php echo $row["checkbox"];?></td>	
	<td><img class="img-thumbnail" src="../image/<?php echo $row['photo'];?>" height='200' width='200' class="img-thumbnail"></td>	

	


	<td>
		<button type="button" class="btn   btn-outline-info" ><a  style="  color: black; text-decoration: none;" href="update_books.php?sid=<?php echo $row["auth_id"] ?>"> update</a></button><br>
		<button type="button" class="btn   btn-outline-danger" style=" text-decoration: none;"><a  style=" color: black; text-decoration: none;" href="?delid=<?php echo $row["auth_id"] ?>">delete</a></button>
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
