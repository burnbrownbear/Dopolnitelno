<?php 
	$con = mysqli_connect('127.0.0.1','root','','project');
	if($_POST['number']>1){
		$k=$_POST['number'];
	}
	else{
		$k=1;
	}
	$query = mysqli_query($con, "INSERT INTO basket (number_basket,product_menu_basket,students_name_basket) VALUES ('". $k."','". $_POST['prod']."','" . $_POST['user']. "')");
	$query2 = mysqli_query($con, "UPDATE product SET number_product=number_product-'".$k."'WHERE id_product=". $_POST['prod']);

	header("Location: http://hv/IT-project/menu.php?user=".$_POST['user']."&school=".$_GET['school']);
	//header("Location: http://hv/IT-project/index.php");
 ?>