<?php
require 'layout.php';
require '../config/connec_db.php';
require '../controller/AdminBrandController.php';

        global $connect;

        // we save the id in order to have in memory
        $idBrand = $_GET['id'];

        $brand = new AdminBrandController();

        // We show the brand which have been selectionned
        $currentBrand = $brand->getBrandById($idBrand);

        // We save the caracteristic of current brand in variables
        foreach ($currentBrand as $key => $value){
          $mark = $currentBrand['name'];
          $image = $currentBrand['image'];
        }

        // test if modification is asked
        if(isset($_POST['modify'])){
          $brand->update($idBrand);
        }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>admin</title>
</head>
<body>
	<div class="container">
        <h1 style="text-align: center">Marque sélectionnée</h1>
        <table class="table table-striped table-responsive">
              <thead>
                <tr>
                  <th scope="col">Marque</th>
                  <th scope="col">URL_Image</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><?php echo $mark; ?></th>
                  <td><?php echo $image; ?></td>
                </tr>
              </tbody>
        </table>
        <hr>
        <h1 style="text-align: center">Modifier la marque</h1>
        <hr>
        <div class="form-group">
            <form <?php echo "action='adminUpdateBrand.php?id=".$idBrand."'" ?> method="post">
                <div class="row">
                    <div class="col-6">
                        <label for="brand">Marque :</label>
                        <input class="form-control" type="text" id="brand" name="brand" <?php echo "value='".$mark."'" ?> >
                    </div>
                    <div class="col-6">
                        <label for="image">Image:</label>
                        <input class="form-control" type="text" id="image" name="image" <?php echo "value='".$image."'" ?> >
                    </div>
                </div>
                <div class="mt-2">
                    <input class="btn btn-primary" type="submit" name="modify" value="Modifier"/>
                </div>
                <div class="mt-2">
                    <a href="adminShowBrand.php" style="text-decoration: none; color: black;"><button type="button" class="btn btn-outline-secondary" >Retour</button></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>