<?php
require 'layout.php';
require '../config/connec_db.php';
require '../controller/AdminCarController.php';

        // We save the id in a variable
        $idCar = $_GET['id'];

        // Instanciation of car controller
        $cars = new AdminCarController();

        // Initialization of the car which have been asked whith her id
        $currentCar = $cars->getCarById($idCar);

        // Initialization of current car informations
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

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>admin</title>
</head>
<body>
	<div class="container">
        <h1 style="text-align: center">Voiture sélectionnée</h1>
        <div class="row">
          <div class="col-md-8">
            <img src="../assets/images/car.jpg" class="img-fluid" alt="Responsive image" width="400px" >
          </div>
          <div class="col-md-4">
            <h1><?php echo $brand." - ".$motorisation; ?></h1>
            <h2><?php echo "Année : ".$model; ?></h2>
            <h2><?php echo $driven."KM - ".$fuel; ?></h2>
            <div class="text-primary" style="font-size: 4rem;font-weight: bold;"><?php echo $price; ?> €</div>
            <button type="button" class="btn btn-primary" id="showForm">Contacter la concession</button>
            <div id="contactForm" class="mt-2">
              <div class="form-group">
                <form action="#" method="post">
                  <div class="row">
                      <div>
                          <label for="firstname">Prénom :</label>
                          <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Votré prénom" >
                      </div>
                  </div>
                  <div class="row">
                      <div>
                          <label for="email">Email:</label>
                          <input class="form-control" type="email" id="email" name="email" placeholder="Votre email" >
                      </div>
                  </div>
                  <div class="row">
                      <div>
                          <label for="phone">Numéro de téléphonne :</label>
                          <input class="form-control" type="text" id="phone" name="phone" placeholder="00 00 00 00 00" >
                      </div>
                  </div>
                  <div class="row">
                      <div>
                          <label for="message">Votre message :</label>
                          <textarea class="form-control" id="message" name="message" placeholder="Votre message..." ></textarea>
                      </div>
                  </div>
                  <div class="mt-2">
                    <input class="btn btn-success" type="submit" name="" value="Envoyer"/>
                  </div>
                </form>
                <button type="button" class="btn btn-secondary mt-2" id="hideForm">Masquer</button>
              </div>
            </div>
          </div>
        </div>
        <p class="mt-2"><strong>Description :</strong><br> Voiture haut de gamme, très bien entretenue.<br>Première main.</p>
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

        <div class="mt-2">
          <a href="buyCar.php" style="text-decoration: none; color: black;"><button type="button" class="btn btn-outline-secondary" >Retour</button></a>
        </div>
        <br><br><br>
  </div>
  <script type="text/javascript" src="../assets/javascripts/buyShowCar.js"></script>
</body>
</html>