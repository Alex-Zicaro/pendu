<?php

//projet bonus désoler pour le style :c

session_start();
// appel du fichier fonctions
require_once('include/fonction.php');


// nouvelle partie
if (isset($_POST["reset"])) {
    session_destroy();
    header("location: index.php");
} 

// si la partie n'est pas finis
if (!isset($_SESSION["mot"]) || $_SESSION["nbError"] === 7 ) {
    
// pour gérer l'érreur si on a perdu et on refresh la page
    if(isset($_SESSION["nbError"]) && $_SESSION["nbError"] === 7){
    session_destroy();
    header("location: index.php");
}
// j'ouvre le fihier txt
    $arrayMot = trimTab(file("mots.txt"));
    // debug($arrayMot);
    // je compte le nombre de mot dans mon fichier (array) pour définir le nombre de mot que j'ai
    // -1 car il commence a 1 et on veut commencer a 0 
    $nombreDeMot =  count($arrayMot,) - 1;

    // on rend aléatoire le mot avec la function rand 
    $numrand = rand(0, $nombreDeMot);
// on stock le mot dans une sessions pour pouvoir le garder en mémoire 
    $_SESSION["mot"] = $arrayMot[$numrand];
}


// je définis l'alphabet dans une variable
$alphabet = "abcdefghijklmnopqrstuvwxyz";

// le mot que j'affiche
$_SESSION["motAffiche"] = "";
// je stock les tiret dans cette variables
$_SESSION["tiret"] = "_";
// pour compter le nombre d'erreur
$_SESSION["nbError"] = 0;

// je compte le nombre de lettre
$nombreDeLettre = strlen($_SESSION["mot"]);
// pour incrementé les tirets avec le bon nombre
for ($i = 0; $i < $nombreDeLettre; $i++)
    $_SESSION["motAffiche"][$i] = $_SESSION["tiret"];
    // je l'affiche grâce a cette variable


// si la lettre que l'utilisateur envoie a une valeur si la valeur est 1 lettre et que la lettre est dans l'alphabet
if (isset($_GET["a"]) && strlen($_GET["a"]) == 1 && strpos($alphabet, $_GET["a"]) !== false ) {
    $char = "";
    $char = strip_tags(htmlspecialchars($_GET["a"]));


// je crée une variable history pour avoir tout simplement l'historique des lettres qu'on a envoyé
    if (!isset($_SESSION["history"]) && empty($_SESSION["history"])) {

        $_SESSION["history"]  = $char;
    } else {

        $_SESSION["history"] .= $char;
    }

    $found = false; // si il reste faut y'a une erreur si il passe true c'est que l'utilisateur a trouvé une bonne lettre

    // cette boucle est pour mettre à jour le mot affiche 
    for ($j = 0; $j < strlen($_SESSION["history"]); $j++) {

// cette boucle est pour vérifier si chaque char est bon
        for ($i = 0; $i < strlen($_SESSION['mot']); $i++) {

// on vérifie les correspondance et si on a pas finit la partie 
            if ($_SESSION['mot'][$i] == $_SESSION["history"][$j] && $_SESSION["mot"] !== $_SESSION["motAffiche"]) {

                $_SESSION['motAffiche'][$i] = $_SESSION["history"][$j];

                if ($_SESSION["mot"][$i] == $char) {

                    $found = true; // on passe found true pour dire que y'a pas d'erreur
                    // on vérifie qu'on a pas finit la partie
                    if ($_SESSION["motAffiche"] != $_SESSION["mot"])
                        $msg = "Bravo , '$char' est dans le mot";
                    // sinon il a gagné
                    else {
                        $msg = "Tu as gagné bravo";
                    }
                }
            }
        }
    }

// si il ne trouve pas de caractère
    if (!$found) {
//si error n'a pas de valeur
        if (!isset($_SESSION["error"]) && empty($_SESSION["error"])){
            $_SESSION["error"] = $char;
            $_SESSION["nbError"] = strlen($_SESSION["error"]);
            $msg = "Désolé , '$char' n'est pas dans le mot";
            
        }else{ // sinon

            $_SESSION['error'] .= $char;
            $_SESSION["nbError"] = strlen($_SESSION["error"]);
            

            $msg = "Désolé , '$char' n'est pas dans le mot";
        }
    }
}
// si la partie est finit
if($_SESSION["nbError"] === 7)
$msg = "Vous avez perdu!!! Rejouez ?";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu du pendu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/pendu.css">
</head>

<body>
    <header>

    </header>

    <main>

        <section class="container">
<h1>Bienvenue sûre le jeu du pendu</h1>
            <article>
                <?php if (isset($msg)) {
                    echo $msg;
                    
                } else {
                    echo "Essaye de gagner !";
                }
                ?>
        <h1><?= $_SESSION["motAffiche"] ?></h1>

                <img src="media/75px-Hangman-<?= $_SESSION["nbError"] ?>.png" alt="hangman">

                <div>
                    <?php
                    //Affichage de l'alphabet si la partie n'est pas finis 
                    if ($_SESSION["nbError"] <= 6 && $_SESSION['mot'] !== $_SESSION['motAffiche']) {

                        for ($i = 0; $i < strlen($alphabet); $i++) {

                            if (isset($_SESSION['history']) && strpos($_SESSION['history'], $alphabet[$i]) === false ) {

                                echo " <a class='btn btn-outline-light' href='index.php?a=$alphabet[$i]'>$alphabet[$i]</a> ";

                            } else if (!isset($_SESSION["history"])) {

                                echo " <a class='btn btn-outline-light' href='index.php?a=$alphabet[$i]'>$alphabet[$i]</a> ";
                            }
                        }
                    }
                    ?>
                </div>

                <form action="" method="POST">

                    <input class="btn btn-primary col-6 mt-3" type="submit" name="reset" value="Nouvelle partie">
                </form>

                <a class="btn btn-primary col-6 mt-3" href="admin.php">Ajouter un mot</a>
            </article>
        </section>
    </main>
    <footer>

    </footer>
</body>

</html>