<?php 
require_once("CCurrency.php");
require_once("database.php");
function pr($s)
{
	echo "<pre>";print_r($s);echo "<pre>";
}
$eurID = 292;
$NameOfCurrency = 'Евро';
$rateEUR = new CCurrency();
$ResultRate = $rateEUR->GetRates($rateEUR->startdate, $rateEUR->enddate, $eurID);
foreach ($ResultRate as $rates) {
	$data = $rates['date'];
	$value = $rates['value'];
	$sql = "INSERT IGNORE INTO `CurrencyEUR`(id, data, value) VALUES (0, '$data','$value')";

		if (mysqli_query($link, $sql) !== TRUE)
		{
    		echo "Ошибка: " . $link->error;
		}
}
$json = json_encode($ResultRate);
?>
<?include('menu.php');?>
<?include('header.php');?>