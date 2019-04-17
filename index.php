<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Пример веб-страницы</title>
  <link rel="stylesheet" href="css/style.css">
  
  <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css">
  
 </head>
 <body>
	 <div class="container">
		<header>
			<h1>Галерея картинок</h1>
		</header>
		
<div class="content">
	<?php
		include 'functions.php';
	?>
</div>

<div class="form">
	<form action="#" method="GET" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit" name="submit">
	</form>
</div>
<footer>
			
</footer>  
  
<script src="scripts/jquery-1.4.3.min.js"></script>
<script src="scripts/jquery.easing-1.3.pack.js"></script>
<script src="scripts/jquery.fancybox-1.3.4.pack.js"></script>
<script src="scripts/main.js"></script>

 </body>
 
</html>
