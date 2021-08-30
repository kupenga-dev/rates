<?php 
require_once("CCurrency.php");
require_once("database.php");
function pr($s)
{
	echo "<pre>";print_r($s);echo "<pre>";
}
$rubID = 298;
$NameOfCurrency = 'Российский рубль (100 RUB)';
$rateRUB = new CCurrency();
$ResultRate = $rateRUB->GetRates($rateRUB->startdate, $rateRUB->enddate, $rubID);
foreach ($ResultRate as $rates) {
	$data = $rates['date'];
	$value = $rates['value'];
	$sql = "INSERT IGNORE INTO `CurrencyRUB`(id, data, value) VALUES (0, '$data','$value')";

		if (mysqli_query($link, $sql) !== TRUE)
		{
    		echo "Ошибка: " . $link->error;
		}
}
$json = json_encode($ResultRate);
?>
<?include('menu.php');?>
<?include('header.php');?>