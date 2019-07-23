<?php
require '../config/connec_db.php';

class AdminCarController
{
	private $tabCars;
	private $tabCar;

	function __construct()
	{
		$this->tabCars = array();
		$this->tabCar = array();
	}

	// show all car
	public function getCars(){
		global $connect;
		$sql = 'SELECT * FROM CAR';
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		$i = 0;
		while($car = $req->fetch())
		{
			$this->tabCars[$i++] = ['id' => $car['ID'],'brand' => $car['FK_BRAND'],'motorisation' => $car['MOTORISATION'],'transmission' => $car['TRANSMISSION'],'driven' => $car['DRIVEN'],'fuel' =>$car['FUEL'],'type' => $car['TYPE'],'color' => $car['COLOR'],'model' => $car['MODEL'],'price' => $car['PRICE']];
		}
		return $this->tabCars;
	}

	// show the current car
	public function getCarById($id)
	{
		global $connect;
        // we request the car which have the id find in URL
        $sql = "SELECT * FROM CAR WHERE ID='".$id."'";
        $req = $connect->prepare($sql);
        $req->execute() or die(print_r($connect->erroInfo()));
        $i = 0;
        while($car = $req->fetch()){
          $this->tabCar = ['id' => $car['ID'],'brand' => $car['FK_BRAND'],'motorisation' => $car['MOTORISATION'],'transmission' => $car['TRANSMISSION'],'driven' => $car['DRIVEN'],'fuel' =>$car['FUEL'],'type' => $car['TYPE'],'color' => $car['COLOR'],'model' => $car['MODEL'],'price' => $car['PRICE']];
        }
        return $this->tabCar;
	}

	// Add car
	public function create()
	{
		global $connect;
		$sql = 'INSERT INTO CAR(ID,FK_BRAND,MOTORISATION,TRANSMISSION,DRIVEN,FUEL,TYPE,COLOR,MODEL,PRICE) VALUES(:id,:fk_brand,:motorisation,:transmission,:driven,:fuel,:type,:color,:model,:price)';
		$req = $connect->prepare($sql);
		$req->execute(array(':id'=> NULL, ':fk_brand' => $_POST['brand'],':motorisation' => $_POST['motorisation'],':transmission' => $_POST['transmission'],':driven' => $_POST['driven'],':fuel' => $_POST['fuel'],':type' => $_POST['type'],':color' => $_POST['color'],':model' => $_POST['model'],':price' => $_POST['price'])) or die(print_r($connect->erroInfo()));
		header('Location: ../view/adminShowCar.php');
	}

	// Update car
	public function update($id)
	{
		global $connect;
		$sql = "UPDATE CAR SET FK_BRAND='".$_POST['brand']."' ".", MOTORISATION='".$_POST['motorisation']."' ".", TRANSMISSION='".$_POST['transmission']."' ".", DRIVEN='".$_POST['driven']."' ".", FUEL='".$_POST['fuel']."' ".", TYPE='".$_POST['type']."' ".", COLOR='".$_POST['color']."' ".", MODEL='".$_POST['model']."' ".", PRICE='".$_POST['price']."' "." WHERE ID='".$id."'";
        $req = $connect->prepare($sql);
        $req->execute() or die(print_r($connect->erroInfo()));
        header("Location: adminUpdateCar.php?id=$id");
	}

	// Delete car
	public function delete($id)
	{
		global $connect;
		$sql = "DELETE FROM CAR WHERE ID='".$id."'";
        $req = $connect->prepare($sql);
        $req->execute() or die(print_r($connect->erroInfo()));
      	header('Location: adminShowCar.php');
	}

	// Search car by name, price and year
	public function searchCar($name,$minPrice,$maxPrice,$minYear,$maxYear)
	{
		global $connect;
		$sql = "SELECT * FROM CAR WHERE FK_BRAND='".$name."'"." AND PRICE BETWEEN $minPrice AND $maxPrice AND MODEL BETWEEN $minYear AND $maxYear";
        $req = $connect->prepare($sql);
        $req->execute() or die(print_r($connect->erroInfo()));
        $i = 0;
		while($car = $req->fetch())
		{
			$this->tabCars[$i++] = ['id' => $car['ID'],'brand' => $car['FK_BRAND'],'motorisation' => $car['MOTORISATION'],'transmission' => $car['TRANSMISSION'],'driven' => $car['DRIVEN'],'fuel' =>$car['FUEL'],'type' => $car['TYPE'],'color' => $car['COLOR'],'model' => $car['MODEL'],'price' => $car['PRICE']];
		}
		return $this->tabCars;
      	//header('Location: adminShowCar.php?name=$name&price=$price&year=$year');
	}
}