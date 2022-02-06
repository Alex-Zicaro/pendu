<?php
session_start();

require_once('include/fonction.php');


// nouvelle partie
if (isset($_POST["reset"])) {
    session_destroy();
    header("location: index.php");
}

// $image = match ($_SESSION['error']) {

//     1 => null, //image 1
//     2 => null, //image 2
//     3 => null, //image 3
//     4 => null, //image 4
//     5 => null, //image 5
//     6 => null,
// };


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


if (isset($_GET["a"]) ) {
    $char = "";
    $char = $_GET["a"];
    

    $positionChar = strpos($_SESSION["mot"], $char);


    if (!isset($_SESSION["history"]) && empty($_SESSION["history"])) 

        $_SESSION["history"]  = $char;

    else {

        $_SESSION["history"] .= $char;
    }
    debug($_SESSION["history"]);

    $found = false; //variable pour compter lettre erronée 
    for ($i = 0; $i < strlen($_SESSION['mot']); $i++) {
        
        if ($_SESSION['mot'][$i] == $char) {
            
            $_SESSION['motAffiche'][$i] = $char;
            
            $_SESSION["bonChar"] = $_SESSION['motAffiche'];

            // $_SESSION["motAffiche"] = str_replace($_SESSION["mot"],$_SESSION["bonChar"],$_SESSION["motAffiche"]);
            
            $msg = " Bravo , '$char' est dans le mot";
            $found = true;
            
        }
    }

    if (!$found) {
        $_SESSION['error']++;
        $msg = " Désolé , '$char' n'est pas dans le mot";
    }

    
    // debug($positionChar);

        //Mettre cette lettre dans le mot a afficher
        // debug($_SESSION["bonChar"]);
        //Incrementer le nombre de lettres trouvees en général à 1

        //Incrémenter le nombre de la lettre actuelle trouve dans le mot a 1


    // gérer plusieurs position pour une seule lettre
    // prendre tout les char dans l'history
    // une nouvelle variable de session qui permet d'afficher à l'utilisateur les underscore et les chars
}

// print_r($_SESSION["tiret"]);
// var_dump($_SESSION["history"]);



// if (isset($_SESSION["history"])) {
//     print_r($_SESSION["motAffiche"]);
// print_r($replacement); // il faut réussir a remplacer au bon endroit le char a la place du _SESSION["tiret"]
// debug($positionChar);
// debug($replacement);

// }
echo $_SESSION['motAffiche'];


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
                }
                ?>


                <div class="alphabet">
                    <?php
                    //Affichage du mot + alphabet
                    if ($_SESSION['error'] < 10 && $_SESSION['mot'] !== $_SESSION['motAffiche']) {
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