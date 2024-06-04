<?php
// session_start();

include "config/commandes.php";

// if(isset($_SESSION['userxXJppk45hPGu']))
// {
//     if(!empty($_SESSION['userxXJppk45hPGu']))
//     {
//         header("Location: client/");
//     }
// }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Login - MonoShop</title>
</head>

<body>
    <br>
    <br>
    <br>
    <br>

    <div class="container" style="display: flex; justify-content: start-end">
        <div class="row">
            <div class="col-md-10">

                <form method="post">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="name" name="nom" class="form-control" style="width: 350%;">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="name" name="prenom" class="form-control" style="width: 350%;">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" style="width: 350%;">
                    </div>
                    <div class="mb-3">
                        <label for="motdepasse" class="form-label">Mot de passe</label>
                        <input type="password" name="motdepasse" class="form-control" style="width: 350%;">
                    </div>
                    <br>
                    <input type="submit" name="envoyer" class="btn btn-info" value="Envoyer">
                </form>

            </div>
        </div>
    </div>

</body>

</html>

<?php

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['email']) and !empty($_POST['motdepasse']) and !empty($_POST['nom']) and !empty($_POST['prenom'])) {
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));
        $nom = htmlspecialchars(strip_tags($_POST['nom']));
        $prenom = htmlspecialchars(strip_tags($_POST['prenom']));

        $user = ajouterUser($nom, $prenom, $email, $motdepasse);

        if ($user) {
            // $_SESSION['userxXJppk45hPGu'] = $user;
            header('Location: index.php');
        } else {
            echo "Compte non créer !";
        }
    }
}

?>