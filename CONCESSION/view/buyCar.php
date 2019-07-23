<?php
require 'layout.php';
require '../config/connec_db.php';
require '../controller/AdminCarController.php';
require '../controller/AdminBrandController.php';


        // Instanciation of car controller
        $cars = new AdminCarController();

        // Instanciation of brand controller
        $brand = new AdminBrandController();

        // Initialization of the all brands in a table
        $tableBrands = $brand->getBrands();

        // Research car
        if (isset($_GET['search'])) {

          $name = $_GET['brand'];
          $minPrice = $_GET['minPrice'];
          $maxPrice = $_GET['maxPrice'];
          $minYear = $_GET['minYear'];
          $maxYear = $_GET['maxYear'];
          $tableCars = $cars->searchCar($name,$minPrice,$maxPrice,$minYear,$maxYear);
        } else {
          $tableCars = $cars->getCars();
        }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>admin</title>
</head>
<body>
	<div class="container">
    <button type="submit" class="btn btn-primary mb-2" id="searchCar" name="search">Rechercher voiture</button>

    <form action="buyCar.php?name=$name&minPrice=$minPrice&maxPrice=$maxPrice&minYear=$minYear&maxYear=$maxYear" method="GET" id="searchForm">

      <div class="row">

          <div class="col-4">
            <select class="custom-select custom-select-lg mb-1" style="height: 37.6667px" name="brand" required="true">
              <?php
                foreach ($tableBrands as $index) {
              ?>
              <option selected <?php "value='".$index['name']."'" ?> ><?php echo $index['name'] ?></option>
              <?php }?>
            </select>
          </div>

          <div class="col-4">
            <div class="form-group">
              <input type="text" class="form-control" id="minYear" name="minYear" placeholder="Année min" required="true">
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
              <input type="text" class="form-control" id="maxYear" name="maxYear" placeholder="Année max" required="true">
            </div>
          </div>

      </div>

      <div class="row">

          <div class="col-3">
            <div class="form-group">
              <input type="text" class="form-control" id="minPrice" name="minPrice" placeholder="Prix min" required="true">
            </div>
          </div>

          <div class="col-3">
            <div class="form-group">
              <input type="text" class="form-control" id="maxPrice" name="maxPrice" placeholder="Prix max" required="true">
            </div>
          </div>

          <div class="col-2">
              <button type="submit" class="btn btn-primary mb-2" name="search">Rechercher</button>
          </div>

          <div class="col-2">
              <button type="button" class="btn btn-secondary" id="hideSearch">Masquer</button>
          </div>

          </form>

          <div class="col-2">
              <a href="buyCar.php"><button type="button" class="btn btn-warning mb-2" name="reinitialize">Réinitialiser</button></a>
          </div>

      </div>

    <hr>
    <h2 style="text-align: center">Liste des voitures</h2>

      <div class="row flex" style="display: flex; flex-direction: row;flex-wrap: wrap;">
        <?php
        foreach ($tableCars as $index) {
        ?>
          <div class="col-3">
            <div class="card" style="width: 18rem;">
              <img src="../assets/images/car.jpg" class="card-img-top" alt="card-img-top">
              <div class="card-body">
                <h5 class="card-title"><?php echo $index['brand']." - ".$index['motorisation']." - ".$index['model']; ?></h5>
                <div class="text-primary" style="font-size: 4rem;font-weight: bold;"><?php echo $index['price']; ?> €</div>
                <a <?php echo "href='buyShowCar.php?id=".$index['id']."'" ?> class="btn btn-primary">Afficher</a>
              </div>
            </div>
          </div>
        <?php }?>
    </div>
  </div>
  <script type="text/javascript" src="../assets/javascripts/buyCar.js"></script>
</body>
</html>