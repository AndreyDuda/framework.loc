<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ERROR</title>
</head>
<body>
	<h1>Произошла ошибка</h1>
	<p><b>Код ошибки: </b><?php echo $responce?></p>
	<p><b>Текст ошибки: </b><?php echo $errstr ?></p>
	<p><b>Файл, в котором произошла ошибка: </b><?php echo $errfile?></p>
	<p><b>Строка, в которой произошла ошибка: </b> <?php echo $errline?></p>
</body>
</html>
