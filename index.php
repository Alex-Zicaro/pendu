<?php
session_start();

require_once('include/fonction.php');


// nouvelle partie
if (isset($_POST["reset"])) {
    session_destroy();
    header("location: index.php");
}



if (!isset($_SESSION["mot"])) {
    // j'ouvre le fihier txt
    $arrayMot = trimTab(file("mots.txt"));
    // debug($arrayMot);
    // je compte le nombre de mot dans mon fichier (array) pour définir le nombre de mot que j'ai
    // -1 car il commence a 1 et on veut commencer a 0 
    $nombreDeMot =  count($arrayMot,) - 1;

    // on rend aléatoire le mot avec la function rand 
    $numrand = rand(0, $nombreDeMot);

    $_SESSION["mot"] = $arrayMot[$numrand];
}

debug($_SESSION["mot"]);
$alphabet = "abcdefghijklmnopqrstuvwxyz";
$_SESSION["error"] = 0;
$_SESSION['motActuelle'] = "";
$_SESSION["motAffiche"] = "";
$_SESSION["tiret"] = "_";
$_SESSION["bonChar"] = "";
$i = 0;





$nombreDeLettre = strlen($_SESSION["mot"]);
for ($i = 0; $i < $nombreDeLettre; $i++)
    $_SESSION["motAffiche"][$i] = $_SESSION["tiret"];


// echo $nombreDeLettre;


// for($i = 1 ; $i <= 6 ; $i++)
// {
//     $_SESSION['lettresJouees'][] = 0;
// }


if (isset($_GET["a"]) && strlen($_GET["a"]) == 1 && strpos($alphabet, $_GET["a"]) !== false && $_SESSION["error"] <= 9) {
    $char = "";
    $char = $_GET["a"];



    if (!isset($_SESSION["history"]) && empty($_SESSION["history"])) {

        $_SESSION["history"]  = $char;
    } else {

        $_SESSION["history"] .= $char;
    }

    debug($_SESSION["history"]);

    $found = false; //variable pour compter lettre erronée 

    for ($j = 0; $j < strlen($_SESSION["history"]); $j++) {


        for ($i = 0; $i < strlen($_SESSION['mot']); $i++) {

            if ($_SESSION["mot"][$i] == $char) {

                $found = true;
                $msg = "Bravo , '$char' est dans le mot";
            } else {
                $found = false;
            }
            if ($_SESSION['mot'][$i] == $_SESSION["history"][$j]) {

                $_SESSION['motAffiche'][$i] = $_SESSION["history"][$j];
            }
        }
    }


    if (!$found && isset($_SESSION["error"])) {

        $_SESSION['error']++;

        $msg = "Désolé , '$char' n'est pas dans le mot";
    }
}


debug($_SESSION["error"]);

echo $_SESSION["motAffiche"];


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>

    </header>

    <main>

        <section>

            <article>
                <?php if (isset($msg)) {
                    echo $msg;
                } else if ($_SESSION["motAffiche"] == $_SESSION["mot"]) {
                    echo "Vous avez découvert le mot bravo , Voulez-vous rejouer ?";
                }
                ?>

                <img src="media/75px-Hangman-<?= $_SESSION['error'] ?>.png" alt="hangman">

                <div class="alphabet">
                    <?php
                    //Affichage du mot + alphabet
                    if ($_SESSION['error'] <= 9 && $_SESSION['mot'] !== $_SESSION['motAffiche']) {
                        for ($i = 0; $i < strlen($alphabet); $i++) {
                            if (isset($_SESSION['history']) && strpos($_SESSION['history'], $alphabet[$i]) === false) {
                                echo " <a href='index.php?a=$alphabet[$i]'>$alphabet[$i]</a> ";
                            } else if (!isset($_SESSION["history"])) {
                                echo " <a href='index.php?a=$alphabet[$i]'>$alphabet[$i]</a> ";
                            }
                        }
                    }
                    ?>
                </div>

                <form action="" method="POST">

                    <input type="submit" name="reset" value="Nouvelle partie">
                </form>
                <a href="admin.php">Ajouter un mot</a>
            </article>
        </section>
    </main>
    <footer>

    </footer>
</body>

</html>