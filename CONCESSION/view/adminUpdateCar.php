<?php
require 'layout.php';
require '../config/connec_db.php';
require '../controller/AdminCarController.php';

        global $connect;

        // We save the id in a variable
        $idCar = $_GET['id'];

        // Instanciation of car controller
        $car = new AdminCarController();;

        // We show the current car
        $currentCar = $car->getCarById($idCar);

        // We save the caracteristic of current car in variables
        foreach ($currentCar as $key => $value){
          $brand = $currentCar['brand'];
          $motorisation = $currentCar['motorisation'];
          $transmission = $currentCar['transmission'];
          $driven = $currentCar['driven'];
          $fuel = $currentCar['fuel'];
          $type = $currentCar['type'];
          $color = $currentCar['color'];
          $model = $currentCar['model'];
          $price = $currentCar['price'];
        }

        // Test if modification is asked
        if(isset($_POST['modify']) ){
          $car->update($idCar);
        }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>admin</title>
</head>
<body>
	<div class="container">
        <h1 style="text-align: center">Voiture sélectionnée</h1>
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
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><?php echo $brand; ?></th>
                  <td><?php echo $motorisation; ?></td>
                  <td><?php echo $transmission; ?></td>
                  <td><?php echo $driven; ?></td>
                  <td><?php echo $fuel; ?></td>
                  <td><?php echo $type; ?></td>
                  <td><?php echo $color; ?></td>
                  <td><?php echo $model; ?></td>
                  <td><?php echo $price; ?> €</td>
                </tr>
              </tbody>
        </table>
        <hr>
        <h1 style="text-align: center">Modifier la voiture</h1>
        <hr>
        <div class="form-group">
            <form <?php echo "action='adminUpdateCar.php?id=".$idCar."'" ?> method="post">
                <div class="row">
                    <div class="col-4">
                        <label for="brand">Marque :</label>
                        <input class="form-control" type="text" id="brand" name="brand" <?php echo "value='".$brand."'" ?> >
                    </div>
                    <div class="col-4">
                        <label for="motorisation">Motorisation :</label>
                        <input class="form-control" type="text" id="motorisation" name="motorisation" <?php echo "value='".$motorisation."'" ?> >
                    </div>
                    <div class="col-4">
                        <label for="transmission">Transmission :</label>
                        <input class="form-control" type="text" id="transmission" name="transmission" <?php echo "value='".$transmission."'" ?> >
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="driven">Kilométrage :</label>
                        <input class="form-control" type="text" id="driven" name="driven" <?php echo "value='".$driven."'" ?> >
                    </div>
                    <div class="col-4">
                        <label for="fuel">Carburant :</label>
                        <input class="form-control" type="text" id="fuel" name="fuel" <?php echo "value='".$fuel."'" ?> >
                    </div>
                    <div class="col-4">
                        <label for="type">Type :</label>
                        <input class="form-control" type="text" id="type" name="type" <?php echo "value='".$type."'" ?> >
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="color">Color :</label>
                        <input class="form-control" type="text" id="color" name="color" <?php echo "value='".$color."'" ?> >
                    </div>
                    <div class="col-4">
                        <label for="model">Model :</label>
                        <input class="form-control" type="text" id="model" name="model" <?php echo "value='".$model."'" ?> >
                    </div>
                    <div class="col-4">
                        <label for="price">Price :</label>
                        <input class="form-control" type="text" id="price" name="price" <?php echo "value='".$price."'" ?> >
                    </div>
                    <br>
                </div>
                <div class="mt-2">
                    <input class="btn btn-primary" type="submit" name="modify" value="Modifier"/>
                </div>
                <div class="mt-2">
                    <a href="adminShowCar.php" style="text-decoration: none; color: black;"><button type="button" class="btn btn-outline-secondary" >Retour</button></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>