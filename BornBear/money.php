<?php
	$con = mysqli_connect('127.0.0.1','root','','project');
	$query2 = mysqli_query($con, "UPDATE students SET money=money+'".$_POST['money']."' WHERE id_students=". $_GET['user']);
	header("Location: http://hv/IT-project/index.php?user=".$_GET['user']);
?>