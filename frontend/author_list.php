<?php 
include('header.php');

$message='';
if (isset($_REQUEST['sid'])) {
  $sid = $_REQUEST['sid'];
}
if (isset($sid)){
  $result=mysqli_query($con,"select * from post where auth_id='$sid'");
  $rowc=mysqli_num_rows($result);
}

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
		<th scope="col">Author_name</th>
		<th scope="col">Title</th>
		<th scope="col">Shortdes</th>
		<th scope="col">Content</th>
		<th scope="col">Photo</th>
		<th scope="col">Checkbox</th>
		<th scope="col">Date</th>
		<th scope="col">Modify</th>

	</tr>
	</thead>
	<tbody>
	<?php
	for($i=1;$i<=$rowc;$i++){

	$row=mysqli_fetch_array($result);
	?>
	<tr>
	<td><?php echo $row['auth_name'];?></td>	
	<td><?php echo $row["title"] ?></td>	
	<td><?php echo $row["shortdes"];?></td>
	<td><?php echo $row["content"];?></td>	
	<td><img class="img-thumbnail" src="image/<?php echo $row['photo'];?>" height='200' width='200' class="img-thumbnail"></td>	
	<td><?php echo $row["checkbox"];?></td>
	<td><?php echo $row["date"];?></td>		
	<td>
		<button type="button" class="btn   btn-outline-info" ><a > update</a></button><br>
		<button type="button" class="btn   btn-outline-danger" style=" text-decoration: none;"><a >delete</a></button>
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