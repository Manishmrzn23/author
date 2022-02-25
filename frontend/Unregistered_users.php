<?php 
include('header.php');

$message='';
		 $result=mysqli_query($con,"select * from auth_wait");
  	$rowc=mysqli_num_rows($result);
	
// Close connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>
    registration
  </title>
</head>

<body>


  <div class="container mt-3">
    <div class="container-fluid">
    <style>


table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

<table class="table " style="width:100%">
	<thead>
	<tr>
		<th scope="col">Author_id</th>
		<th scope="col">Author_name</th>
		<th scope="col">Email</th>
		<th scope="col">Facebook</th>
		<th scope="col">Twitter</th>
		<th scope="col">Instagram</th>
		<th scope="col">Photo</th>
		<th scope="col">Modify</th>

	</tr>
	</thead>
	<tbody>
		
	<?php
	for($i=1;$i<=$rowc;$i++){

	$row=mysqli_fetch_array($result);
	?>
	<tr>
	<td><?php echo $row['id_auth'];?></td>	
	<td><?php echo $row['name'];?></td>	
	<td><?php echo $row["email"] ?></td>	
	<td><?php echo $row["facebook"];?></td>
	<td><?php echo $row["twitter"];?></td>		
	<td><?php echo $row["instagram"];?></td>	
	<td><img class="img-thumbnail" src="image/<?php echo $row['photo'];?>" height='200' width='200' class="img-thumbnail"></td>	
	<td>
		<button type="button" class="btn   btn-outline-info" ><a style=" text-decoration: none; color: black;" href="movedata.php?sid=<?php echo $row["id_auth"] ?>">Approve</a></button><br>
		<button type="button" class="btn   btn-outline-danger" style=" text-decoration: none;"><a >Delete</a></button>
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