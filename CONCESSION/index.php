<?php
require 'config/session.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/stylesheets/index.css" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand" href="#">Accueil</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
	  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    	<ul class="navbar-nav mr-auto">
	      		<li class="nav-item active">
	        		<a class="nav-link" href="view/buyCar.php">Acheter <span class="sr-only">(current)</span></a>
	      		</li>
				<?php if($session['EMAIL'] == "admin@admin.fr") { ?>
		      	<li class="nav-item">
		        	<a class="nav-link" href='view/admin_manager.php'>Admin</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href='index.php?deconnexion'>Deconnexion</a>
		      	</li>
				<?php } elseif($session_user){ ?>
				<li class="nav-item">
		        	<?php echo "<a class='nav-link' href='view/currentUserCount.php?id=".session_id()."'" ?>>Mon profil</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href='index.php?deconnexion'>Deconnexion</a>
		      	</li>
		      	<?php }?>
		    </ul>
	  	</div>
	  	<?php if($session['EMAIL'] == "admin@amdin.fr") { ?>
	  		<img src="assets/images/admin/avatar.png" alt="Avatar" class="avatar">
	  	<?php } else if(isset($session) && $session != "admin@admin.fr") { ?>
	  		<img src="assets/images/user/avatar.png" alt="Avatar" class="avatar">
	  	<?php }?>
	</nav>
	<div class="jumbotron" style="display: flex;justify-content: center">
		<img src="assets/images/logo.png">
	</div>
	<div class="mt-4">
		<?php
			if(!$session){
				require 'view/signIn.php';
			} else { ?>
						<div class="container">
							<h2>Bonjour, vous êtes connecté</h2>
							<a href="index.php?deconnexion" class="badge badge-dark">Log out</a>
		      			</div>
		<?php
			}
		?>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>