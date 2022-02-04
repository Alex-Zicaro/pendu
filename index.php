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
}
// Le joueur peut choisir, une lettre parmi les 26 qui composent l’alphabet (latin) et la renseigner
//dans un “input” (ou assimilé).
//Si le mot secret contient une ou plusieurs occurrences de la lettre renseignée par l’utilisateur,
//celles-ci sont découvertes et affichées à leur position correspondante.

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
var_dump($_SESSION["mot"]);


// debug($motChoisis);

$nombreDeLettre = strlen($_SESSION["mot"]);
// echo $nombreDeLettre;

for ($i = 0; $i < $nombreDeLettre; $i++) {
    // a page affiche alors autant d’éléments (espaces vides, tirets, étoiles, images…) qu’il y a de
    //lettres dans le mot secret choisi.
    

    if (isset($_POST["envoyer"])) {
        if (isset($_POST["a"])) {
            $char = $_POST["a"];
        }

        $charResult = match ($char) {
            'a' => 'a',
            'b' => 'b',
            'c' => 'c',
            'd' => 'd',
            'e' => 'e',
            'f' => 'f',
            'g' => 'g',
            'h' => 'h',
            'i' => 'i',
            'j' => 'j',
            'k' => 'k',
            'l' => 'l',
            'm' => 'm',
            'n' => 'n',
            'o' => 'o',
            'p' => 'p',
            'q' => 'q',
            'r' => 'r',
            's' => 's',
            't' => 't',
            'u' => 'u',
            'v' => 'v',
            'w' => 'w',
            'x' => 'x',
            'y' => 'y',
            'z' => 'z',
        };

        $positionChar = strpos($_SESSION["mot"], $charResult);

        if ($positionChar === false) {


            $msg = " Désolé , '$char' n'est pas dans le mot";
        } else if ($positionChar !== false) {

            $msg = "oui";
        }} 

            echo "_";
        
    
}

// debug($arrayMot);


// si j'envoie le form
if (isset($_POST["envoyer"])) {













    var_dump($_POST);
    var_dump($char);
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