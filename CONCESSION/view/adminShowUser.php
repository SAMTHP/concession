<?php
require 'layout.php';
require '../config/connec_db.php';
require '../controller/AdminUserController.php';

        // Instanciation of the user controller
        $user = new AdminUserController();

        // Initialization of the all users in a table
        $tableUsers = $user->getUsers();

        // Delete of the user which have been selectionned whith her id
        if(isset($_GET['id'])){
          $user->delete($_GET['id']);
        }

        // Generation of many users
        if(isset($_POST['generate'])){
          $user->generateUsers();
        }

        // Delete all users
        if(isset($_POST['delete'])){
          $user->deleteAllUsers();
        }

        // Creation of a new user
        if(isset($_POST['create'])){
          $user->create();
        }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>admin</title>
</head>
<body>
	<div class="container">
        <h1 style="text-align: center">Liste des Utilisateurs</h1>
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
                  <th scope="col" style="text-align: center;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($tableUsers as $index) {
                ?>
                <tr>
                  <th scope="row"><?php echo $index['firstname']; ?></th>
                  <td><?php echo $index['lastname']; ?></td>
                  <td><?php echo $index['city']; ?></td>
                  <td><?php echo $index['address']; ?></td>
                  <td><?php echo $index['postalcode']; ?></td>
                  <td><?php echo $index['country']; ?></td>
                  <td><?php echo $index['email']; ?></td>
                  <td><?php echo $index['birth']; ?></td>
                  <td><?php echo "<a href='adminShowUser.php?id=".$index['id'].">'" ?><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php }?>
              </tbody>
        </table>
        <hr>
        <h1 style="text-align: center">Gestions des utilisateurs test</h1>
        <div class="form-group">
          <div class="row">
            <form action="adminShowUser.php" method="POST">
              <div class="col-6">
                <input class="btn btn-primary" type="submit" name="generate" value="Générer" />
              </div>
            </form>
            <form action="adminShowUser.php" method="POST">
              <div class="col-6">
                <input class="btn btn-primary" type="submit" onsubmit="true" name="delete" value="Supprimer" />
              </div>
            </form>
          </div>
        </div>
        <hr>
        <div class="mt-2">
          <a href="admin_manager.php" style="text-decoration: none; color: black;"><button type="button" class="btn btn-outline-secondary" >Retour</button></a>
        </div>
        <br><br><br>
    </div>
</body>
</html>