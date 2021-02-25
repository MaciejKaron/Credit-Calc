<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_x">Wpłacona kwota: </label> <br />
	<input id="id_x" type="text" name="x" style="width:300px" value="<?php if (isset($x)) print($x); ?>" /><br />
	<label for="id_y">Liczba lat: </label> <br />
	<input id="id_y" type="text" name="y" style="width:300px" value="<?php if (isset($y)) print($y); ?>" /><br />
	<label for="id_z">Oprocentowanie: </label> <br />
	<input id="id_z" type="text" name="z" style="width:300px" value="<?php if (isset($z)) print($z); ?>" /><br />
	<input type="submit" style="margin-top:10px" value="Oblicz" /> 
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata: '.$result; ?>
</div>
<?php } ?>

</body>
</html>