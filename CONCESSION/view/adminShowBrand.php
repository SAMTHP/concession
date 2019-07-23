<?php
require 'layout.php';
require '../config/connec_db.php';
require '../controller/AdminBrandController.php';

        // Instanciation of the brand controller
        $brand = new AdminBrandController();

        // Initialization of the all brands in a table
        $tableBrands = $brand->getBrands();

        // Delete of the brand which have been selectionned whith her name
        if(isset($_GET['name'])){
          $brand->delete($_GET['name']);
        }

        // Creation of new brand
        if(isset($_POST['create'])){
          $brand->create();
        }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>admin</title>
</head>
<body>
	<div class="container">
        <h1 style="text-align: center">Liste des marques</h1>
        <table class="table table-striped table-responsive">
              <thead>
                <tr>
                  <th scope="col">Marque</th>
                  <th scope="col">URL_Image</th>
                  <th scope="col" colspan="2" style="text-align: center;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($tableBrands as $index) {
                ?>
                <tr>
                  <th scope="row"><?php echo $index['name']; ?></th>
                  <td><?php echo $index['image']; ?></td>
                  <td><?php echo "<a href='adminUpdateBrand.php?id=".$index['id']."'" ?>><i class="fas fa-edit"></i></a></td>
                  <td><?php echo "<a href='adminShowBrand.php?name=".$index['name']."'" ?>><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php }?>
              </tbody>
        </table>
        <hr>
        <h1 style="text-align: center">Ajouter une marque</h1>
        <div class="form-group">
            <form action="adminShowBrand.php" method="post">
                <div class="row">
                    <div class="col-6">
                        <label for="brand">Marque :</label>
                        <input class="form-control" type="text" id="brand" name="brand">
                    </div>
                    <div class="col-6">
                        <label for="image">Image:</label>
                        <input class="form-control" type="text" id="image" name="image">
                    </div>
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