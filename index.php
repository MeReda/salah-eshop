<?php

require("config/commandes.php");

$Produits = afficher();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.80.0">
  <title>Album example · Bootstrap v5.0</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <script src="js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


</head>

<body>




  <header class="d-flex flex-wrap justify-content-center py-3 px-5 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
        <circle cx="12" cy="13" r="4" />
      </svg>
      <span class="fs-4">WildGear</span>
    </a>

    <ul class="nav nav-pills align-items-center">

      <li class="nav-item"><a href="login.php">Se connecter</a></li>
      <!-- Cart button  -->
      <li class="nav-item ms-4">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fa-solid fa-cart-shopping btn btn-primary rounded-pill p-2"></i>
        </button>
      </li>
    </ul>
  </header>

  <main>

    <!-- Cart modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">My Cart </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="cartItem">...</div>
            <div class="foot d-flex gap-3 align-items-center justify-content-end">
              <h3>Total</h3>
              <h2 id="total">€ 0.00</h2>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Pay</button>
          </div>
        </div>
      </div>
    </div>

    <div class="px-4 py-5 my-5 text-center">
      <img class="d-block mx-auto mb-4" src="images/logo.png" alt="" width="72" height="57">
      <h1 class="display-5 fw-bold text-body-emphasis">Centered hero</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>

      </div>
    </div>

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row g-3">

          <?php foreach ($Produits as $produit) : ?>
            <div class="col-3">
              <div class="card h-100 shadow-sm">
                <img src="<?= $produit->image ?>" class="card-img-top" alt="<?= $produit->nom ?>">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title"><?= $produit->nom ?></h5>
                  <p class="card-text flex-grow-1"><?= substr($produit->description, 0, 160); ?>...</p>
                  <div class="d-flex justify-content-between align-items-end">
                    <a href="produit.php?pdt=<?= $produit->id ?>" class="btn btn-sm btn-success">Voir plus</a>
                    <small class="text-muted" style="font-weight: bold;"><?= $produit->prix ?> €</small>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>




        </div>
      </div>
    </div>

  </main>


  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024 Company, Inc</p>

      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
          <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
          <circle cx="12" cy="13" r="4" />
        </svg>
      </a>

      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
      </ul>
    </footer>
  </div>

  <script src="js/AddToCart.js"></script>
</body>

</html>