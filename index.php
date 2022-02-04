<?php
session_start();
function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}
// nouvelle partie
if (isset($_POST["reset"])) {
    session_destroy();
    header("location: index.php");
}


if (!isset($_SESSION["mot"])) {
    // j'ouvre le fihier txt
    $arrayMot = file("mots.txt");
    // je compte le nombre de mot dans mon fichier (array) pour définir le nombre de mot que j'ai
    // -1 car il commence a 1 et on veut commencer a 0 
    $nombreDeMot =  count($arrayMot,) - 1;

    // on rend aléatoire le mot avec la function rand 
    $numrand = rand(0, $nombreDeMot);

    $_SESSION["mot"] = trim($arrayMot[$numrand]);
}
debug($_SESSION["mot"]);


// debug($motChoisis);

$nombreDeLettre = strlen($_SESSION["mot"]);
// echo $nombreDeLettre;
$i = 0;
$mot_affiche = "";
$tiret = "_";


for ($i = 0; $i < $nombreDeLettre; $i++)
    $mot_affiche .= $tiret;
echo $mot_affiche;


if (isset($_POST["envoyer"]) && isset($_POST["a"])) {

    $char = $_POST["a"];

    // gérer plusieurs position pour une seule lettre
    // prendre tout les char dans l'history
    // une nouvelle variable de session qui permet d'afficher à l'utilisateur les underscore et les chars

    $positionChar = strpos($_SESSION["mot"], $char);

    if (!$positionChar) {
        $msg = " Désolé , '$char' n'est pas dans le mot";
    } else {

        if (!isset($_SESSION["history"]) && empty($_SESSION["history"])) {

            $_SESSION["history"]  = $char;
        } else {

            $_SESSION["history"] .= $char;
        }
    }


    $mot_affiche = str_replace($tiret,  $_SESSION["history"], $positionChar, $nombreDeLettre);
    if (isset($_SESSION["char"])) {
        print_r($_SESSION["char"]);
        // print_r($replacement); // il faut réussir a remplacer au bon endroit le char a la place du tiret
        // debug($positionChar);
        // debug($replacement);

    }

    debug($char);
}





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
                <form action="" method="post" role="alphabet">

                    <fieldset>

                        <label for="A">a</label>
                        <input type="radio" value="a" id="A" name="a">

                        <label for="B">b</label>
                        <input type="radio" value="b" id="B" name="a">

                        <label for="C">c</label>
                        <input type="radio" value="c" id="C" name="a">

                        <label for="D">d</label>
                        <input type="radio" value="d" id="D" name="a">

                        <label for="E">e</label>
                        <input type="radio" value="e" id="E" name="a">

                        <label for="F">f</label>
                        <input type="radio" value="f" id="F" name="a">

                        <label for="G">g</label>
                        <input type="radio" value="g" id="G" name="a">

                        <label for="H">h</label>
                        <input type="radio" value="h" id="H" name="a">

                        <label for="I">i</label>
                        <input type="radio" value="i" id="I" name="a">

                        <label for="J">j</label>
                        <input type="radio" value="j" id="J" name="a">

                        <label for="K">k</label>
                        <input type="radio" value="k" id="K" name="a">

                        <label for="L">l</label>
                        <input type="radio" value="l" id="L" name="a">

                        <label for="M">m</label>
                        <input type="radio" value="m" id="M" name="a">

                        <label for="N">n</label>
                        <input type="radio" value="n" id="N" name="a">

                        <label for="O">o</label>
                        <input type="radio" value="o" id="O" name="a">

                        <label for="P">p</label>
                        <input type="radio" value="p" id="P" name="a">

                        <label for="Q">q</label>
                        <input type="radio" value="q" id="Q" name="a">

                        <label for="R">r</label>
                        <input type="radio" value="r" id="R" name="a">

                        <label for="S">s</label>
                        <input type="radio" value="s" id="S" name="a">

                        <label for="T">t</label>
                        <input type="radio" value="t" id="T" name="a">

                        <label for="U">u</label>
                        <input type="radio" value="u" id="U" name="a">

                        <label for="V">v</label>
                        <input type="radio" value="v" id="V" name="a">

                        <label for="W">w</label>
                        <input type="radio" value="w" id="W" name="a">

                        <label for="X">x</label>
                        <input type="radio" value="x" id="X" name="a">

                        <label for="Y">y</label>
                        <input type="radio" value="y" id="Y" name="a">

                        <label for="Z">z</label>
                        <input type="radio" value="z" id="Z" name="a">

                    </fieldset>

                    <input type="submit" name="envoyer" value="envoyer">

                    <input type="submit" name="reset" value="Nouvelle partie">


                </form>
            </article>
        </section>
    </main>
    <footer>

    </footer>
</body>

</html>