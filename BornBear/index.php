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
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Главная</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" <?php echo 'href="menu.php?user='. $_GET['user'] .'"'?>>Меню товара</a>
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
			?>	
				<p class="mr-4">ФИО: <?php echo $res_users['name_students'] ?></p>
				<p class="mr-4">money: <?php echo $res_users['money'] ?></p>
				<a href="index.php"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">выйти</button></a>
			<?php
				}
					else{
			?>
		    <form class="form-inline my-2 my-lg-0" method="POST" action="check2.php?laying=index">
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
		<div class="w-100" style="background:gray; color:white">
			<div class="col-6">
				<div style="height: 100px"></div>
				<form method="POST" action="reg.php">
				  <div class="form-group row">
				  	<div class="col-2"></div>
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
				    </div>
				  </div>
				  <div class="form-group row">
				  	<div class="col-2"></div>
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Пароль</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль" name="password">
				    </div>
				  </div>
				  <div class="form-group row">
				  	<div class="col-2"></div>
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Login</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="inputPassword3" placeholder="Login" name="login">
				    </div>
				  </div>
				  <div class="form-group row">
				  	<div class="col-2"></div>
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Школа</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="inputPassword3" placeholder="Школа" name="school">
				    </div>
				  </div>
				  <div class="form-group row">
				  	<div class="col-2"></div>
				    <label for="inputPassword3" class="col-sm-2 col-form-label">ФИО</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="inputPassword3" placeholder="ФИО" name="name">
				    </div>
				  </div>
				  <div class="form-group row">
				  	<div class="col-2"></div>
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Класс</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="inputPassword3" placeholder="Класс" name="class">
				    </div>
				  </div>
				  <div class="form-group row">
				  	<div class="col-2"></div>
				    <div class="col-sm-8">
				      <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
				    </div>
				  </div>
				</form>
				<div style="height: 100px"></div>
			</div>
		</div>
	</div>
</body>
</html>