<?php 
	$con = mysqli_connect('127.0.0.1','root','','project');
	if($_POST['number']>1){
		$k=$_POST['number'];
	}
	else{
		$k=1;
	}
	$query2 = mysqli_query($con,"SELECT * FROM basket WHERE product_menu_basket	='". $_POST['prod'] ."'
		ORDER BY number_basket DESC");
	$res = $query2->fetch_assoc();
	//echo $res['number_basket'];
	if($res['number_basket']-$k<=0){
		$query = mysqli_query($con, "DELETE FROM basket WHERE product_menu_basket = '" . $_POST['prod'] ."'");
		$query3 = mysqli_query($con, "UPDATE product SET number_product=number_product+'".$res['number_basket']."'WHERE id_product=". $_POST['prod']);
	}else{
		$query4 = mysqli_query($con, "UPDATE basket SET number_basket=number_basket-'".$k."'WHERE product_menu_basket = '" . $_POST['prod'] ."'");
		$query3 = mysqli_query($con, "UPDATE product SET number_product=number_product+'".$k."'WHERE id_product=". $_POST['prod']);
	}
	//echo $_POST['user'];
	header("Location: http://hv/IT-project/basket.php?user=".$_POST['user']);
 ?>