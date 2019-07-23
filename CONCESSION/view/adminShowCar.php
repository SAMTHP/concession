<?php
require 'layout.php';
require '../config/connec_db.php';
require '../controller/AdminCarController.php';

        // Instanciation of the car controller
        $car = new AdminCarController();

        // Initialization of the all cars in a table
        $tableCars = $car->getCars();

        // Delete of the car which have been selectionned whith her id
        if(isset($_GET['id'])){
          $car->delete($_GET['id']);
        }

        // Creation of new car
        if(isset($_POST['create'])){
          $car->create();
        }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>admin</title>
</head>
<body>
	<div class="container">
        <h1 style="text-align: center">Liste des voitures</h1>
        <table class="table table-striped table-responsive">
              <thead>
                <tr>
                  <th scope="col">Marque</th>
                  <th scope="col">Motorisation</th>
                  <th scope="col">Transmission</th>
                  <th scope="col">Kilométrage</th>
                  <th scope="col">Carburant</th>
                  <th scope="col">Type</th>
                  <th scope="col">Couleur</th>
                  <th scope="col">Année</th>
                  <th scope="col">Prix</th>
                  <th scope="col" colspan="2" style="text-align: center;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($tableCars as $index) {
                ?>
                <tr>
                  <th scope="row"><?php echo $index['brand']; ?></th>
                  <td><?php echo $index['motorisation']; ?></td>
                  <td><?php echo $index['transmission']; ?></td>
                  <td><?php echo $index['driven']; ?></td>
                  <td><?php echo $index['fuel']; ?></td>
                  <td><?php echo $index['type']; ?></td>
                  <td><?php echo $index['color']; ?></td>
                  <td><?php echo $index['model']; ?></td>
                  <td><?php echo $index['price']; ?> €</td>
                  <td><?php echo "<a href='adminUpdateCar.php?id=".$index['id']."'" ?>><i class="fas fa-edit"></i></a></td>
                  <td><?php echo "<a href='adminShowCar.php?id=".$index['id'].">'" ?><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php }?>
              </tbody>
        </table>
        <hr>
        <h1 style="text-align: center">Ajouter une voiture</h1>
        <div class="form-group">
            <form action="adminShowCar.php" method="post">
                <div class="row">
                    <div class="col-4">
                        <label for="brand">Marque :</label>
                        <input class="form-control" type="text" id="brand" name="brand">
                    </div>
                    <div class="col-4">
                        <label for="motorisation">Motorisation :</label>
                        <input class="form-control" type="text" id="motorisation" name="motorisation">
                    </div>
                    <div class="col-4">
                        <label for="transmission">Transmission :</label>
                        <input class="form-control" type="text" id="transmission" name="transmission">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="driven">Kilométrage :</label>
                        <input class="form-control" type="text" id="driven" name="driven">
                    </div>
                    <div class="col-4">
                        <label for="fuel">Carburant :</label>
                        <input class="form-control" type="text" id="fuel" name="fuel">
                    </div>
                    <div class="col-4">
                        <label for="type">Type :</label>
                        <input class="form-control" type="text" id="type" name="type">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="color">Color :</label>
                        <input class="form-control" type="text" id="color" name="color">
                    </div>
                    <div class="col-4">
                        <label for="model">Model :</label>
                        <input class="form-control" type="text" id="model" name="model">
                    </div>
                    <div class="col-4">
                        <label for="price">Price :</label>
                        <input class="form-control" type="text" id="price" name="price">
                    </div>
                    <br>
                </div>
                <div class="mt-2">
                    <input class="btn btn-primary" type="submit" name="create"/>
                </div>
                <div class="mt-2">
                    <a href="admin_manager.php" style="text-decoration: none; color: black;"><button type="button" class="btn btn-outline-secondary" >Retour</button></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>