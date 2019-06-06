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
		      <li class="nav-item">
		        <a class="nav-link" <?php echo 'href="basket.php?user='. $_GET['user'] .'"'?>>Корзина</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" <?php echo 'href="pop.php?user='. $_GET['user'] .'"'?>>Пополнить</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" <?php echo 'href="checki.php?user='. $_GET['user'] .'"'?>>Ваш чек</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="#">О сайте</a>
		      </li>
		    </ul>
		    <?php if ($_GET['user'] > 0){
					$query_users = mysqli_query($con,'SELECT * FROM students WHERE id_students = "' . $_GET['user'] .'"');
					$res_users = $query_users->fetch_assoc();
			?><p class="mr-4">ФИО: <?php echo $res_users['name_students'] ?></p>
				<p class="mr-4">money: <?php echo $res_users['money'] ?></p>
				<a href="main.php"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">выйти</button></a>
			<?php
				}
					else{
			?>
		    <form class="form-inline my-2 my-lg-0" method="POST" action="check2.php?laying=main">
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
		<div class="jumbotron">
		  <h1 class="display-4">Проект: "Питание школьников"</h1>
		  <p class="lead">Данный сайт был разработан благодаря ученикам и ученице, 9-х 10-х классов Республиканского Лицея Интерната и Школы №17. 
			</p>
		  <hr class="my-4">
		  <h3>News:</h3>
		  <p class="lead">В скором времени в данный сайт будут внедрены новые изменения и функции для удобств наших дорогих учеников и учителей. Ожидайте обновления от нас.
			</p>
		  <h5 style="margin-top: 100px">Благодарим за использование нашего проекта!</h5>
			07.04.2019
		</div>

	</div>
</body>
</html>