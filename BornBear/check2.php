<?php
	$con = mysqli_connect('127.0.0.1','root','','project');
	$query = mysqli_query($con,'SELECT * FROM students WHERE password_students = "' . $_POST['password'] .
		'" and (login_students = "' . $_POST['login'] .'" or mail_students = "' . $_POST['login'] .'")'
	);
	if($query->num_rows != 0){
		header("Location: http://hv/IT-project/".$_GET['laying'].".php?user=".$query->fetch_assoc()['id_students']);
	}
	else {
		header("Location: http://hv/IT-project/".$_GET['laying'].".php?user=нет");
	}
?>