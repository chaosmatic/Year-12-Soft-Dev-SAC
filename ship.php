<?php
session_start();
require_once("head.php");

//RM STORE
echo "<div id='UI'>";
$storeNumber = filter_var($_GET["store"], FILTER_SANITIZE_NUMBER_INT);
if (filter_var($storeNumber,FILTER_VALIDATE_INT) && $storeNumber > 0 && $storeNumber <= $amountOfStores ){
	unset($_SESSION['store'.$storeNumber]);
	$_SESSION['store'.$storeNumber] = array();
	require_once("UI.php");
}else{
	print "Store ".$storeNumber." is not a valid store.";
}
echo "</div>";

require_once("display.php");

require_once("foot.php");
?>