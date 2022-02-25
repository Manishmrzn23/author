<?php

include('header.php');

if(!isset($_SESSION['ADMINLOGIN'])){
    header('location:login.php');
    die();

}

?>



<div class="bg"></div>
<?php
	include('footer.php');
  ?>
</body>
</html>