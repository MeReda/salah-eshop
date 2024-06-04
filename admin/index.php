<?php
session_start();

require("../config/commandes.php");

if (!isset($_SESSION['xRttpHo0greL39'])) {
  header("Location: ../login.php");
}

if (empty($_SESSION['xRttpHo0greL39'])) {
  header("Location: ../login.php");
}


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
            <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="../admin/">Nouveau</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="supprimer.php">Suppression</a>
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

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


        <form method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">L'image du produit</label>
            <input type="name" class="form-control" name="image" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" name="nom" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea class="form-control" name="desc" required></textarea>
          </div>

          <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
        </form>

      </div>
    </div>
  </div>


</body>

</html>

<?php

if (isset($_POST['valider'])) {
  if (isset($_POST['image']) and isset($_POST['nom']) and isset($_POST['prix']) and isset($_POST['desc'])) {
    if (!empty($_POST['image']) and !empty($_POST['nom']) and !empty($_POST['prix']) and !empty($_POST['desc'])) {
      $image = htmlspecialchars(strip_tags($_POST['image']));
      $nom = htmlspecialchars(strip_tags($_POST['nom']));
      $prix = htmlspecialchars(strip_tags($_POST['prix']));
      $desc = htmlspecialchars(strip_tags($_POST['desc']));

      try {
        ajouter($image, $nom, $prix, $desc);
        header('Location: afficher.php');
      } catch (Exception $e) {
        $e->getMessage();
      }
    }
  }
}

?>