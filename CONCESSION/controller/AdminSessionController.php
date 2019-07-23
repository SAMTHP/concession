<?php
require __DIR__.'/../config/connec_db.php';

class AdminSessionController
{

	private $admin;
	private $tabCurrentUser;

	function __construct()
	{
		$this->admin = "";
		$this->tabCurrentUser = [];
	}

	// Admin authentification
	function adminAuthentification($email, $pass)
	{
		global $connect;
		$sql = "SELECT * FROM ADMIN WHERE EMAIL='".$email."' AND PASSWORD='".md5($pass)."'";
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		$this->admin = $req->fetch();

		return $this->admin;
	}

	// User authentification
	function userAuthentification($email, $pass)
	{
		global $connect;
		$sql = "SELECT * FROM USER WHERE EMAIL='".$email."' AND PASSWORD='".md5($pass)."'";
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		$this->admin = $req->fetch();

		return $this->admin;
	}

	// Save of the id_session and the email of the current user
	function createSession($email, $id_session)
	{
		global $connect;
		$sql = "INSERT INTO SESSION(EMAIL,ID_SESSION) VALUES ('".$email."','".$id_session."')";
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
	}

	// Control if the session have been saved in the session table
	function controlSession($id_session)
	{
		global $connect;
		$sql = "SELECT * FROM SESSION WHERE ID_SESSION='".$id_session."'";
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		$session = $req->fetch();
		while($session){
			return $session;
		}
	}

	// Search the current user email whith id session
	function getCurrentUserEmail($id_session)
	{
		global $connect;
		$sql = "SELECT EMAIL FROM SESSION WHERE ID_SESSION='".$id_session."'";
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		while ($current_user = $req->fetch()) {
			return $current_user['EMAIL'];
		}
	}

	// Show the informations of the current user
	function getUserAccount($email)
	{
		global $connect;
		$sql = "SELECT * FROM USER WHERE EMAIL='".$email."'";
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
		while ($User = $req->fetch()) {
			$this->tabCurrentUser = ['id' => $User['ID'],'firstname' => $User['FIRSTNAME'],'lastname' => $User['LASTNAME'],'city' => $User['CITY'],'address' => $User['ADDRESS'],'postalcode' => $User['POSTALCODE'],'country' => $User['COUNTRY'],'email' => $User['EMAIL'],'password' => $User['PASSWORD'],'birth' => $User['BIRTH']];
		}
		return $this->tabCurrentUser;
	}

	// Delete the session of the current user
	function deleteSession($id_session)
	{
		global $connect;
		$sql = "DELETE FROM SESSION WHERE ID_SESSION='".$id_session."'";
		$req = $connect->prepare($sql);
		$req->execute() or die(print_r($connect->erroInfo()));
	}
}

?>