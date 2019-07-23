<?php
require '../config/connec_db.php';

class AdminUserController
{

	private $tabUsers;
	private $tabUser;

	public function __construct()
	{
		$this->tabUser = array();
		$this->tabUsers = array();
	}

	// Generate many users automatically
	function generateUsers()
	{
		global $connect;
		for($i=0;$i<25;$i++){
		$sql = 'INSERT INTO USER(ID,FIRSTNAME,LASTNAME,CITY,ADDRESS,POSTALCODE,COUNTRY,EMAIL,PASSWORD,BIRTH) VALUES(NULL,:firstname,:lastname,:city,:address,:postalcode,:country,:email,:password,:birth)';
		$req = $connect->prepare($sql);
		$req->execute(array(':firstname' => "firstname_".$i,':lastname' => "lastname_".$i ,':city' => "ville_".$i,':address' => "address_".$i,':postalcode' => $i.$i.$i.$i.$i,':country' => "country_".$i,':email' => "email_".$i."@test.fr",':password' => md5("test"),':birth' => $i.$i.$i.$i."/01/".$i.$i)) or die(print_r($connect->erroInfo()));
		}
		header('Location: adminShowUser.php');
	}

	// Delete all users
	function deleteAllUsers()
	{
		global $connect;
		$sql = 'DELETE FROM USER';
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		header('Location: adminShowUser.php');
	}

	// Delete the user who have heen clicked
	function delete($id)
	{
		global $connect;
		$sql = "DELETE FROM USER WHERE ID='".$id."'";
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		header('Location: adminShowUser.php');
	}

	// show User
	function getUsers(){
		global $connect;
		$sql = 'SELECT * FROM USER';
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		$i = 0;
		while($User = $req->fetch()){
			$this->tabUsers[$i++] = ['id' => $User['ID'],'firstname' => $User['FIRSTNAME'],'lastname' => $User['LASTNAME'],'city' => $User['CITY'],'address' => $User['ADDRESS'],'postalcode' => $User['POSTALCODE'],'country' => $User['COUNTRY'],'email' => $User['EMAIL'],'password' => $User['PASSWORD'],'birth' => $User['BIRTH']];
		}
		return $this->tabUsers;
	}

	// Add User
	function createUser()
	{
		global $connect;
		$sql = 'INSERT INTO USER(ID,FIRSTNAME,LASTNAME,CITY,ADDRESS,POSTALCODE,COUNTRY,EMAIL,PASSWORD,BIRTH) VALUES(NULL,:firstname,:lastname,:city,:address,:postalcode,:country,:email,:password,:birth)';
		$req = $connect->prepare($sql);
		$req->execute(array(':firstname' => $_POST['firstname'],':lastname' =>  $_POST['lastname'],':city' =>  $_POST['city'],':address' =>  $_POST['address'],':postalcode' =>  $_POST['postalcode'],':country' =>  $_POST['country'],':email' =>  $_POST['email'],':password' =>  md5($_POST['password']),':birth' =>  $_POST['birth'])) or die(print_r($connect->erroInfo()));

		header('Location: ../index.php');
	}
}
