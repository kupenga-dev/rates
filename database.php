<?php 

$link = mysqli_connect('localhost', 'root', 'root', 'myrac');
if ($link == false){
    print_r('Ошибка: Невозможно подключиться к MySQL ' . mysqli_connect_error());
}

mysqli_query($link, "SET NAMES 'utf8'");
mysqli_query($link, "SET CHARACTER SET 'utf8'");

if (mysqli_query($link, "CREATE TABLE IF NOT EXISTS `CurrencyUSD`(
 id int AUTO_INCREMENT PRIMARY KEY, 
 data varchar(24),
 value float(5) 
 )") !== TRUE)
{
    echo "Ошибка создания таблицы: " . $link->error;
}

if (mysqli_query($link, "CREATE TABLE IF NOT EXISTS `CurrencyRUB`(
 id int AUTO_INCREMENT PRIMARY KEY, 
 data varchar(24),
 value float(5) 
 )") !== TRUE)
{
    echo "Ошибка создания таблицы: " . $link->error;
}

if (mysqli_query($link, "CREATE TABLE IF NOT EXISTS `CurrencyEUR`(
 id int AUTO_INCREMENT PRIMARY KEY, 
 data varchar(24),
 value float(5)
 )") !== TRUE)
{
    echo "Ошибка создания таблицы: " . $link->error;
}

?>