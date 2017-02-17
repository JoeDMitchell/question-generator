<?php
session_start();

function xDigitNo($digits){
	return rand(pow(10, $digits-1), pow(10, $digits)-1);
}

function generateOpQ($intDig,$operator,$actDig){

	$operators = array(
					'addition' => '+',
					'subtraction' => '-',
					'multiplication' => 'x',
					'division' => '/'
				);

	$op = $operators[$operator];
	$int = xDigitNo($intDig);
	$act = xDigitNo($actDig);

	return $int.' '.$op.' '.$act.' =';

}

function returnGenerations($count,$intDig,$operator,$actDig){

	$result = '<table><tr><th colspan="3">'.ucwords($operator).'</th></tr>';
	$i = 0;
	while ($i++ < $count)
	{
	    $result .= '<tr><td>'.$i.'</td><td>'.generateOpQ($intDig,$operator,$actDig).'</td><td></td></tr>';
	}

	$result .= '</table>';

	return $result;

}

if($_POST) {

    if(!isset($_POST['initial-digits']) || !isset($_POST['actor-digits'])) {

      	$_SESSION['error'] = "Please enter the required digits";

    } elseif(!isset($_POST['operator'])) {

      	$_SESSION['error'] = "Please select the operator";

    } elseif(!isset($_POST['questions-amount'])) {

      	$_SESSION['error'] = "Please enter how many questions you would like to generate";

    } else {

    	$initial_digits = $_POST['initial-digits'];
    	$operator = $_POST['operator'];
    	$actor_digits = $_POST['actor-digits'];
    	$questions_amount = $_POST['questions-amount'];
      
    	$_SESSION['result'] = returnGenerations($questions_amount,$initial_digits,$operator,$actor_digits);
      	
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;

 }



?>