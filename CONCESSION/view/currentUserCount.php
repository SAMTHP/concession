<?php
require 'layout.php';


        // we save the id in order to have in memory
        $idUserSession = $_GET['id'];

        // Instanciation of the session controller
        $user_session = new AdminSessionController();

        // Get email of current user
        $email = $user_session->getCurrentUserEmail($idUserSession);

        // We ask the current user informations
        $currentUser = $user_session->getUserAccount($email);

        // Informations initialization of the current user
        foreach ($currentUser as $key => $value){
          $firstname = $currentUser['firstname'];
          $lastname = $currentUser['lastname'];
          $city = $currentUser['city'];
          $address = $currentUser['address'];
          $postalcode = $currentUser['postalcode'];
          $country = $currentUser['country'];
          $email = $currentUser['email'];
          $birth = $currentUser['birth'];
        }


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>User</title>
</head>
<body>
	<div class="container">
        <h1 style="text-align: center">Mon compte</h1>
        <div class="row">
          <div class="col-md-8">
            <img src="../assets/images/user/avatar.png" class="img-fluid" alt="Responsive image" width="400px" >
          </div>
          <div class="col-md-4">
            <h1><?php echo $firstname." - ".$lastname; ?></h1>
            <h2><?php echo "Ville : ".$city; ?></h2>
            <h2><?php echo "Pays - ".$country; ?></h2>
            <div class="text-primary" style="font-size: 4rem;font-weight: bold;"><?php echo $email; ?></div>
          </div>
        </div>
        <table class="table table-striped table-responsive">
              <thead>
                <tr>
                  <th scope="col">Prénom</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Ville</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">Code postal</th>
                  <th scope="col">Pays</th>
                  <th scope="col">Email</th>
                  <th scope="col">Date de naissance</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <th scope="row"><?php echo $firstname; ?></th>
                  <td><?php echo $lastname; ?></td>
                  <td><?php echo $city; ?></td>
                  <td><?php echo $address; ?></td>
                  <td><?php echo $postalcode; ?></td>
                  <td><?php echo $country; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $birth; ?></td>
                </tr>

              </tbody>
        </table>

        <div class="mt-2">
          <a href="../index.php" style="text-decoration: none; color: black;"><button type="button" class="btn btn-outline-secondary" >Retour</button></a>
        </div>
        <br><br><br>
  </div>
  <script type="text/javascript" src="../assets/javascripts/buyShowCar.js"></script>
</body>
</html>