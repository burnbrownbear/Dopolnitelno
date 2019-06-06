<?php 
	$con = mysqli_connect('127.0.0.1','root','','project');
	$k = $_POST['money'];
	/*$l=''
	for($i=0;$i<$number;$i++){
		$l += '<h6>'.$res['id_menu_product'].' '.$res['basket'].'</h6>
				<p>цена:'.$res['sale_menu'].'</p>';
	}
	$l+='<p>$sum</p>'
	$quer = mysqli_query($con, "INSERT INTO chec (number_chec,text_chec) VALUES ('".rand(1, 10000)."','" . $l. "')");
	*/
	$query = mysqli_query($con, "UPDATE students SET money='".$k."' WHERE id_students = '" . $_POST['user'] ."'");

	$query2 = mysqli_query($con, "DELETE FROM basket WHERE students_name_basket = '" . $_POST['user'] ."'");
	header("Location: http://hv/IT-project/basket.php?user=".$_POST['user']);
 ?>