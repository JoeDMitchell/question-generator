<?php
session_start();

function xDigitNo($digits){
	return rand(pow(10, $digits-1), pow(10, $digits)-1);
}

function generateOpQ($intDig,$intDec,$operator,$actDig,$actDec,$actor){

	$operators = array(
					'addition' => '+',
					'subtraction' => '-',
					'multiplication' => 'x',
					'division' => '&divide'
				);

	$op = $operators[$operator];
	$int = xDigitNo($intDig);
	$act = xDigitNo($actDig);

	$intDiv = pow(10,$intDec);
	$actDiv = pow(10,$actDec);

	$intTotal = number_format($int / $intDiv, $intDec, '.', '');
	$actTotal = number_format($act / $actDiv, $actDec, '.', '');

	if ($actor !== false){
		$actTotal = $actor;
	}

	return $intTotal.' '.$op.' '.$actTotal.' =';

}

function returnGenerations($count,$intDig,$intDec,$operator,$actDig,$actDec,$actor){

	$result = '<table><tr><th colspan="3">'.ucwords($operator).'</th></tr>';
	$i = 0;
	while ($i++ < $count)
	{
	    $result .= '<tr><td>'.$i.'</td><td>'.generateOpQ($intDig,$intDec,$operator,$actDig,$actDec,$actor).'</td><td></td></tr>';
	}

	$result .= '</table>';

	return $result;

}

if($_POST) {

    if(!isset($_POST['initial-digits']) || !isset($_POST['actor-digits']) || !isset($_POST['actor-decimals']) || !isset($_POST['initial-decimals'])) {

      	$_SESSION['error'] = "Please enter the required digits and decimals";

    } elseif(!isset($_POST['operator'])) {

      	$_SESSION['error'] = "Please select the operator";

    } elseif(!isset($_POST['questions-amount'])) {

      	$_SESSION['error'] = "Please enter how many questions you would like to generate";

    } else {

    	if (isset($_POST['set-actor'])){
    		$actor = $_POST['actor-number'];
    	} else {
    		$actor = false;
    	}

    	$initial_digits = $_POST['initial-digits'];
    	$initial_decimals = $_POST['initial-decimals'];
    	$operator = $_POST['operator'];
    	$actor_digits = $_POST['actor-digits'];
    	$actor_decimals = $_POST['actor-decimals'];
    	$questions_amount = $_POST['questions-amount'];
      
    	$_SESSION['result'] = returnGenerations($questions_amount,$initial_digits,$initial_decimals,$operator,$actor_digits,$actor_decimals,$actor);
      	
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;

 }



?>