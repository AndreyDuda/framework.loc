<?php
/** @var \cms\base\View $this */
/** @var string $content */
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $this->getMeta();?>
</head>
<h1>Default</h1>
<body>
<?php echo $content;?>
</body>
</html>
