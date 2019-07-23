<?php
require 'connec_db.php';
require __DIR__.'/../controller/AdminSessionController.php';


session_start();

$id_session = session_id();

// Instanciation of AdminSessionController
$allUser = new AdminSessionController();
$admin_session = new AdminSessionController();
$user_session = new AdminSessionController();

// Test if login is asked
if(isset($_POST['login'])){
	// Save of email and password of current user
	$email = $_POST['email'];
	$pass = $_POST['password'];

	// Test if the user is an admin or not
	if($email == "admin@admin.fr"){
		// Administrator authentification
		$admin_authentification = $admin_session->adminAuthentification($email, $pass);
		if($admin_authentification){
			// Save of id_session and email in the session table
			$admin_session->createSession($email, $id_session);
		}
	} else {
		// Current user authentification
		$user_authentification = $user_session->userAuthentification($email, $pass);
		if($user_authentification){
			// Save of id_session and email in the session table and get the email of current user
			$user_session->createSession($email, $id_session);
			$emailCurrentUser = $user_session->getCurrentUserEmail($id_session);
		}
	}
}

// Initialization of variables which will control if the session have been created
$session = $admin_session->controlSession($id_session);
$session_user = $user_session->controlSession($id_session);

// Delete of the session if logout have been asked
if(isset($_GET['deconnexion'])){
	$allUser->deleteSession($id_session);
	header('Location: index.php');
}

?>