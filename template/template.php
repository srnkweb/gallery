<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Gallery</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
	<header class="header">
		<a class="logo" href="/index.php">gallery</a>
		<?php
		{
			include __DIR__ . "/$regFormView";
		}
		?>
	</header>
	<main>
		<?php  include __DIR__ . "/$content_view"; ?>
	</main>
	<footer>
	</footer>
</div>
</body>
</html>