<?php
	$con = mysqli_connect('127.0.0.1','root','','project');
	$query = mysqli_query($con, "INSERT INTO students (name_students, login_students, mail_students, class_students, school_students,password_students) 
		VALUES ('". $_POST['name']."',
				'". $_POST['login']."',
				'". $_POST['email']."',
				'". $_POST['class']."',
				'". $_POST['school']."',
				'" . $_POST['password']. "')");
	header("Location: http://hv/IT-project/index.php");
?>