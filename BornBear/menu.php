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
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Меню товара</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" <?php echo 'href="basket.php?user='. $_GET['user'] .'"'?>>Корзина</a>
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
				<a <?php echo'href="menu.php?school='.$_GET['school'].'"'?>><button class="btn btn-outline-success my-2 my-sm-0" type="submit">выйти</button></a>
			<?php
				}
					else{
			?>
		    <form class="form-inline my-2 my-lg-0" method="POST" action="check2.php?laying=menu">
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
		<div class="row">
			<form method="POST" <?php echo 'action="lol.php?user='. $_GET['user'] .'"' ?> style="width: 100%"
			<div class="input-group mb-3 mr-2 col-6 mt-4">
				<div class="input-group mb-3">
					<?php
					$query_school = mysqli_query($con,'SELECT * FROM school');
					$number = $query_school->num_rows;
					?>
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Школа</label>
					</div>
					<select class="custom-select" id="inputGroupSelect01" name="school">
						<option selected>Выберите школу...</option>
						<?php for($i=0;$i<$number;$i++){
						$res = $query_school->fetch_assoc(); ?>
						<option <?php echo 'value="'.$res['name_school'].'"' ?>> <?php echo $res['name_school'] ?> </option>
						<?php } ?>
					</select>
				</div>
				<button class="btn" style="height: 40px">найти</button>
			</form>
			<div class="row">
					<?php
						$query_product = mysqli_query($con,"SELECT * FROM product 
						INNER JOIN menu ON menu.name_menu = product.id_menu_product WHERE  product.id_school_product ='".$_GET['school']."'");
						$number = $query_product->num_rows;
						for($i=0;$i<$number;$i++){
							$res = $query_product->fetch_assoc();
					?>
						<div style="margin-left: auto;margin-right: auto;" class="col-3">
							<div class="p_inf mb-2">
								<h5>
									<?php echo $res['name_menu'] ?>
								</h5>
								<p>Кол-во: <?php echo $res['number_product'] ?></p>
								<p>Цена: <?php echo $res['sale_menu'].' рублей' ?></p>
								<img border="0" <?php echo 'src="' . $res['img_menu'] . ' "' ?> width="270" height="200" class="anime_kk">
								<span>
									<?php echo $res['opis_menu'] ?>
								</span>
							</div>
							<?php if($_GET['user']>0){ ?>
							<form method="POST" <?php echo 'action="basket_add.php?school='.$_GET['school'].'"'?> >
								<div class="row">
									<input class="form-control mr-sm-2" type="text" placeholder="кол-во" aria-label="Search" name="number" style="width: 100px">
									<input type="hidden" <?php echo 'value="'.$_GET['user'].'"'?> name="user">
									<input type="hidden" <?php echo 'value="'.$res['id_product'].'"'?> name="prod">
									<button class="btn" style="height: 40px">добавить</button>
								</div>
							</form>
							<?php } ?>	
						</div>
					<?php
						}
					?>
			</div>
		</div>
	</div>
</body>
</html>