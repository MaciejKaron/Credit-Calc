<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

// 1. pobranie parametrów

function getParams(&$amount,&$years,&$percentages){
	$amount = isset($_REQUEST ['amount']) ? $_REQUEST['amount'] : null;
	$years = isset($_REQUEST ['years']) ? $_REQUEST['years'] : null;
	$percentages = isset($_REQUEST ['percentages']) ? $_REQUEST['percentages'] : null;
}


// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku


function validate(&$amount,&$years,&$percentages,&$messages){
	if ( ! (isset($amount) && isset($years) && isset($percentages))) {
		return false;
	}
	

if ( $amount == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $years == "") {
	$messages [] = 'Nie podano liczby lat';
}
if ( $percentages == "") {
	$messages [] = 'Nie podano oprocentowania';
}

if (count( $messages ) != 0) return false; 
	
	// sprawdzenie, czy są liczbami całkowitymi
	if (! is_numeric( $amount )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $years )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $years )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}
	
	if (count($messages) != 0) {
		return false;
	}else{
		return true;
	}


}

// 3. wykonaj zadanie jeśli wszystko w porządku


function process(&$amount,&$years,&$percentages,&$messages,&$result){
	
	$amount = intval($amount);
	$years = intval($years);
	$percentages = floatval($percentages);
	
	//wykonanie operacji
    $result = ($amount/($years*12)) + ($amount/($years*12) * ($percentages/100));

}

$amoun = null;
$years = null;
$percentages = null;
$result = null;
$messages = array();

getParams($amount,$years,$percentages);
if(validate($amount,$years,$percentages,$messages)){
	process($amount,$years,$percentages,$messages,$result);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$amount,$years,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';