<?php
require '../config/connec_db.php';

class AdminBrandController
{
	// Declaration of properties which will return the brand informations
	private $tabBrands;
	private $tabBrand;

	// Initialization of properties in the constructor
	function __construct()
	{
		$this->tabBrands = array();
		$this->tabBrand = array();
	}

	// show all brands
	public function getBrands()
	{
		global $connect;
		$sql = 'SELECT * FROM BRAND';
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		$i = 0;
		while($brand = $req->fetch()){
			$this->tabBrands[$i++] = ['id' => $brand['ID'],'name' => $brand['NAME'], 'image' => $brand['URL_IMAGE']];
		}
		return $this->tabBrands;
	}

	// show the current brand
	public function getBrandById($id)
	{
		global $connect;
        // we request the brand which have the name find in URL
        $sql = "SELECT * FROM BRAND WHERE ID='".$id."'";
        $req = $connect->prepare($sql);
        $req->execute() or die(print_r($connect->erroInfo()));
        $i = 0;
        while($brand = $req->fetch()){
          $this->tabBrand = ['name' => $brand['NAME'], 'image' => $brand['URL_IMAGE']];
        }
        return $this->tabBrand;
	}

	// Add brand
	public function create()
	{
		global $connect;
		$sql = 'INSERT INTO BRAND(NAME,URL_IMAGE) VALUES(:name,:image)';
		$req = $connect->prepare($sql);
		$req->execute(array(':name'=> $_POST['brand'],':image' => $_POST['image'])) or die(print_r($connect->erroInfo()));
		header('Location: ../view/adminShowBrand.php');
	}

	// Update brand
	public function update($id)
	{
		global $connect;
		$sql = "UPDATE BRAND SET NAME='".$_POST['brand']."' ".", URL_IMAGE='".$_POST['image']."' "." WHERE ID='".$id."'";
        $req = $connect->prepare($sql);
        $req->execute() or die(print_r($connect->erroInfo()));
        header("Location: adminUpdateBrand.php?id=$id");

	}

	// Delete brand
	public function delete($name)
	{
		global $connect;
		$sql = "DELETE FROM BRAND WHERE NAME='".$name."'";
        $req = $connect->prepare($sql);
        $req->execute() or die(print_r($connect->erroInfo()));
      	header('Location: adminShowBrand.php');
	}
}

