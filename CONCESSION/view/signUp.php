<?php
require 'layout.php';
require '../controller/AdminUserController.php';

// Instanciation of user controller
$new_user = new AdminUserController();

// Creation of a new user
if (isset($_POST['signUp'])){
	if($_POST['password'] == $_POST['password_confirm']){
		$new_user->createUser();
	}
}

?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="assets/stylesheets/signIn.css" crossorigin="anonymous">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<div class="container">
    <div class="omb_login">
    	<h3 class="omb_authTitle">S'enregistrer</a></h3>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">
			    <form class="omb_loginForm" action="../index.php" autocomplete="off" method="POST">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control" name="firstname" placeholder="Prénom">
					</div>
					<span class="help-block"></span>

					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control" name="lastname" placeholder="Nom">
					</div>
					<span class="help-block"></span>

					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="date" class="form-control" name="birth" placeholder="YYYY/MM/JJ">
					</div>
					<span class="help-block"></span>

					<div class="input-group">
						<span class="input-group-addon"><i class="fas fa-city"></i></span>
						<input type="text" class="form-control" name="city" placeholder="Ville">
					</div>
					<span class="help-block"></span>

					<div class="input-group">
						<span class="input-group-addon"><i class="fas fa-address-book"></i></span>
						<input type="text" class="form-control" name="address" placeholder="Adresse">
					</div>
					<span class="help-block"></span>

					<div class="input-group">
						<span class="input-group-addon"><i class="fas fa-address-book"></i></span>
						<input type="text" class="form-control" name="postalcode" placeholder="Code postal">
					</div>
					<span class="help-block"></span>

					<div class="input-group">
						<span class="input-group-addon"><i class="fas fa-globe-europe"></i></span>
						<input type="text" class="form-control" name="country" placeholder="Pays">
					</div>
					<span class="help-block"></span>

					<div class="input-group">
						<span class="input-group-addon"><i class="fas fa-at"></i></span>
						<input type="email" class="form-control" name="email" placeholder="Adresse mail">
					</div>
					<span class="help-block"></span>

					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input type="password" class="form-control" name="password" placeholder="Mot de passe">
					</div>
					<span class="help-block"></span>


					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password_confirm" placeholder="Mot de passe de confirmation">
					</div>

					<input class="btn btn-lg btn-primary btn-block mt-4" type="submit" name="signUp" value="Créer" />
				</form>
			</div>
    	</div>
    	<div class="mt-2">
                    <a href="../index.php" style="text-decoration: none; color: black;"><button type="button" class="btn btn-outline-secondary" >Retour</button></a>
                </div>
	</div>
	<br><br><br>
</div>