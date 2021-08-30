<?php 
require_once("CCurrency.php");
require_once("database.php");
function pr($s)
{
	echo "<pre>";print_r($s);echo "<pre>";
}
$usdID = 145;
$NameOfCurrency = 'доллар США';
$rateUSD = new CCurrency();
$ResultRate = $rateUSD->GetRates($rateUSD->startdate, $rateUSD->enddate, $usdID);
foreach ($ResultRate as $rates) {
	$data = $rates['date'];
	$value = $rates['value'];
	$sql = "INSERT IGNORE INTO `CurrencyUSD`(id, data, value) VALUES (0, '$data','$value')";

		if (mysqli_query($link, $sql) !== TRUE)
		{
    		echo "Ошибка: " . $link->error;
		}
}
$json = json_encode($ResultRate);
?>
<?include('menu.php');?>
<?include('header.php');?>