<?php
session_start();

require("../config/commandes.php");

if (!isset($_SESSION['xRttpHo0greL39'])) {
  header("Location: ../login.php");
}

if (empty($_SESSION['xRttpHo0greL39'])) {
  header("Location: ../login.php");
}

$produits = afficher();

foreach ($_SESSION['xRttpHo0greL39'] as $i) {
  $nom = $i->pseudo;
  $email = $i->email;
}
?>

<!DOCTYPE html>
<html>

<head>
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <script src="../js/bootstrap.bundle.min.js"></script>
  <title></title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../">MonoShop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../admin/afficher.php">Produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../admin/">Nouveau</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="font-weight: bold;" href="supprimer.php">Suppression</a>
          </li>

        </ul>

        <div style="margin-right: 500px">
          <h5 style="color: #545659; opacity: 0.5;">Connecté en tant que: <?= $nom ?></h5>
        </div>

        <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="destroy.php">Se deconnecter</a>

      </div>
    </div>
  </nav>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row  g-3">

        <form method="post">
          <div class="row mb-3 d-flex justify-content-center w-100  ">

            <div class="col-2"><label for="exampleInputPassword1" class="form-label">Identifiant du produit</label></div>

            <div class="col"><input type="number" class="form-control" name="idproduit" required></div>

            <div class="col"><button type="submit" name="valider" class="btn btn-primary">Supprimer le produit</button></div>
        </form>

      </div>


      <div class="row w-100">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">image</th>
              <th scope="col">nom</th>
              <th scope="col">prix</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($produits as $produit) : ?>
              <tr>
                <th scope="row"><?= $produit->id ?></th>
                <td>
                  <img src="<?= $produit->image ?>" style="width: 15%">
                </td>
                <td><?= $produit->nom ?></td>
                <td style="font-weight: bold; color: green;"><?= $produit->prix ?>€</td>
                <td><?= substr($produit->description, 0, 100); ?>...</td>

              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>

      </div>

    </div>
  </div>


</body>

</html>

<?php

if (isset($_POST['valider'])) {
  if (isset($_POST['idproduit'])) {
    if (!empty($_POST['idproduit']) and is_numeric($_POST['idproduit'])) {
      $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));

      try {
        supprimer($idproduit);
      } catch (Exception $e) {
        $e->getMessage();
      }
    }
  }
}

?>