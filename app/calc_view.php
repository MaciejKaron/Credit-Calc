<?php require_once dirname(__FILE__).'/../config.php'; ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.5/build/pure-min.css" integrity="sha384-LTIDeidl25h2dPxrB2Ekgc9c7sEC3CWGM6HeFmuDNUjX76Ert4Z4IY714dhZHPLd" crossorigin="anonymous">
</head>
<body>

<div style="width:20rem; margin-left:1rem; margin-top:1rem">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button pure-button-active">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>

</div>

<div style="margin-left:1rem ; margin-top:1rem">
<form class="pure-form pure-form-stacked" action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_amount">Amount: </label> 
	<input id="id_amount" type="text" name="amount" style="width:300px" value=<?php out($amount) ?> >
	<label for="id_years">Years: </label> 
	<input id="id_years" type="text" name="years" style="width:300px" value=<?php out($years) ?> >
	<label for="id_percentages">Percentages: </label> 
	<input id="id_percentages" type="text" name="percentages" style="width:300px" value=<?php out($percentages) ?> >
	<button class="pure-button" type="submit">Calculate</button>
</form>	
<?php

//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ($messages) > 0){
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin-top:1rem ;padding:10px; border-radius: 8px; background-color: #8f0; width:18rem; text-align:center">
<?php echo 'Miesięczna rata: '.$result; ?>
</div>
<?php } ?>

</div>
</body>
</html>

