<?php
require '../config/connec_db.php';

class AdminController
{

	// show car
	function getCar(){
		global $connect;
		$sql = 'SELECT * FROM CAR';
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		$car = $req->fetch();
		var_dump($car);
	}

	// Add car
	function createCar()
	{
		global $connect;
		$sql = 'INSERT INTO CAR(ID,FK_BRAND,MOTORISATION,TRANSMISSION,DRIVEN,FUEL,TYPE,COLOR,MODEL,PRICE) VALUES(:id,:fk_brand,:motorisation,:transmission,:driven,:fuel,:type,:color,:model,:price)';
		$req = $connect->prepare($sql);
		$req->execute(array(':id'=> NULL, ':fk_brand' => $_POST['brand'],':motorisation' => $_POST['motorisation'],':transmission' => $_POST['transmission'],':driven' => $_POST['driven'],':fuel' => $_POST['fuel'],':type' => $_POST['type'],':color' => $_POST['color'],':model' => $_POST['model'],':price' => $_POST['price'])) or die(print_r($connect->erroInfo()));
	}
}
if(isset($_POST)){
	$create_car = new AdminController();
	$create_car->createCar();
	echo "test";
}
