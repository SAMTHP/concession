<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="assets/stylesheets/signIn.css" crossorigin="anonymous">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<div class="container">
    <div class="omb_login">
    	<h3 class="omb_authTitle"><a href="view/signUp.php">S'enregistrer</a></h3>

		<div class="row omb_row-sm-offset-3 omb_loginOr mt-0">
			<div class="col-xs-12 col-sm-6">
				<hr class="omb_hrOr">
				<span class="omb_spanOr">ou</span>
			</div>
		</div>
		<h3 class="omb_authTitle">Se connecter</a></h3>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">
			    <form class="omb_loginForm" action="index.php" autocomplete="off" method="POST">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="email" class="form-control" name="email" placeholder="Adresse mail">
					</div>
					<span class="help-block"></span>

					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password" placeholder="Mot de passe">
					</div>

					<input class="btn btn-lg btn-primary btn-block mt-2" type="submit" name="login" value="Se connecter" />
				</form>
			</div>
    	</div>
		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-3">
				<label class="checkbox">
					<input type="checkbox" value="remember-me">Remember Me
				</label>
			</div>
			<div class="col-xs-12 col-sm-3">
				<p class="omb_forgotPwd">
					<a href="#">Forgot password?</a>
				</p>
			</div>
		</div>
	</div>
</div>