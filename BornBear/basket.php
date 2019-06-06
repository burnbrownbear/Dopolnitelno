<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="style2.css">
</head>
<body>
	<?php $con = mysqli_connect('127.0.0.1','root','','project');
	?>
	<div class="container bg-muted">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" <?php echo 'href="index.php?user='. $_GET['user'] .'"'?>>Главная</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" <?php echo 'href="menu.php?user='. $_GET['user'] .'"'?>>Меню товара</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Корзина</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" <?php echo 'href="pop.php?user='. $_GET['user'] .'"'?>>Пополнить</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" <?php echo 'href="checki.php?user='. $_GET['user'] .'"'?>>Ваш чек</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" <?php echo 'href="main.php?user='. $_GET['user'] .'"'?>>О сайте</a>
		      </li>
		    </ul>
		    <?php if ($_GET['user'] > 0){
					$query_users = mysqli_query($con,'SELECT * FROM students WHERE id_students = "' . $_GET['user'] .'"');
					$res_users = $query_users->fetch_assoc();
			?><p class="mr-4">ФИО: <?php echo $res_users['name_students'] ?></p>
				<p class="mr-4">money: <?php echo $res_users['money'] ?></p>
				<a href="basket.php"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">выйти</button></a>
			<?php
				}
					else{
			?>
		    <form class="form-inline my-2 my-lg-0" method="POST" action="check2.php?laying=basket">
		      <input class="form-control mr-sm-2" type="text" placeholder="mail или логин" aria-label="Search" name="login">
		      <input class="form-control mr-sm-2" type="password" placeholder="пароль" aria-label="Search" name="password">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">войти</button>
		      <?php if($_GET['user'] == 'нет'){echo'
				<p class="mt-2 bg-danger rounded text-white" style="padding: 10px; width: 210px">
					нет такого пользователя</p>';} ?>
		    </form>
		    <?php } ?>
		  </div>
		</nav>
		<div>
			<?php $query_basket = mysqli_query($con,"SELECT * FROM students
						INNER JOIN basket ON basket.students_name_basket = students.id_students
						INNER JOIN product ON basket.product_menu_basket = product.id_product
						INNER JOIN menu ON menu.name_menu = product.id_menu_product 
						WHERE students.id_students=" . $_GET['user']);
						$number = $query_basket->num_rows;
						if($number==0){echo '<div class="jumbotron"><h1 class="display-4">Вы ничего не добавили</h1></div>';} ?>
			<div class="row">
					<?php
						
						for($i=0;$i<$number;$i++){
							$res = $query_basket->fetch_assoc();
					?>
						<div style="margin-left: auto;margin-right: auto;" class="col-3">
							<div class="p_inf mb-2">
								<h5>
									<?php echo $res['name_menu'] ?>
								</h5>
								<p>кол-во: <?php echo $res['number_basket'] ?></p>
								<p>школа: <?php echo $res['id_school_product'] ?></p>
								<img border="0" <?php echo 'src="' . $res['img_menu'] . ' "' ?> width="270" height="200" class="anime_kk">
								<span>
									<?php echo $res['opis_menu'] ?>
								</span>
							</div>
							<form method="POST" action="basket_delete.php">
								<div class="row pl-2">
									<input class="form-control mr-sm-2" type="text" placeholder="кол-во" aria-label="Search" name="number" style="width: 100px">
									<input type="hidden" <?php echo 'value="'.$_GET['user'].'"'?> name="user">
									<input type="hidden" <?php echo 'value="'.$res['id_product'].'"'?> name="prod">
									<button class="btn pp" style="height: 40px">удалить</button>
								</div>
							</form>
						</div>
					<?php
							$sum+=$res['number_basket']*$res['sale_menu'];
						}
					?>
			</div>
			<?php if($number==0){}else{ ?>
			<div class="jumbotron">
				<form method="POST" action="buy.php">
					<input type="hidden" <?php echo 'value="'.$_GET['user'].'"'?> name="user">
					<?php 
						$query = mysqli_query($con,"SELECT * FROM students WHERE id_students=".$_GET['user']);
						$res2 = $query->fetch_assoc();
						$k = $res2['money']-$sum;
					?>
					<input type="hidden" <?php echo 'value="'.$k.'"'?> name="money">
				<h3>Цена: <?php echo $sum ?></h3>
				<?php if($sum>$res2['money']){echo '<p>не хватает средств</p>';}else { ?>
				<button class="btn">оплатить</button>
				<?php } ?>

				</form>
			</div>
			<?php } ?>
		</div>
	</div>

</body>
</html>