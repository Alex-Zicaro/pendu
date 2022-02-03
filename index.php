<?php
function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}
function switchAlphabet($var){
    switch($var){
        case'a':

    }
}

// Le joueur peut choisir, une lettre parmi les 26 qui composent l’alphabet (latin) et la renseigner
//dans un “input” (ou assimilé).
//Si le mot secret contient une ou plusieurs occurrences de la lettre renseignée par l’utilisateur,
//celles-ci sont découvertes et affichées à leur position correspondante.


// j'ouvre le fihier txt
$arrayMot = file("mots.txt");
// je compte le nombre de mot dans mon fichier (array) pour définir le nombre de mot que j'ai
// -1 car il commence a 1 et on veut commencer a 0 
$nombreDeMot =  count($arrayMot,) - 1;

// on rend aléatoire le mot avec la function rand 
$numrand = rand(0, $nombreDeMot);

$motChoisis = trim($arrayMot[$numrand]);

// debug($motChoisis);

$nombreDeLettre = strlen($motChoisis);
// echo $nombreDeLettre;

for($i = 0 ; $i < $nombreDeLettre ; $i++){
    // a page affiche alors autant d’éléments (espaces vides, tirets, étoiles, images…) qu’il y a de
//lettres dans le mot secret choisi.
    //https://www.php.net/strpos
    echo"_";
}

// debug($arrayMot);


// si j'envoie le form
if (isset($_POST["envoyer"])) {

    var_dump($_POST);
    var_dump($lettre);
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
                <form action="" method="post" role="alphabet">
    <fieldset>
                    <label for="A">a</label>
                    <input type="radio" value="a" id="A" name="a">

                    <label for="B">b</label>
                    <input type="radio" value="b" id="B" name="b">

                    <label for="C">c</label>
                    <input type="radio" value="c" id="C" name="c">

                    <label for="D">d</label>
                    <input type="radio" value="d" id="D" name="d">

                    <label for="E">e</label>
                    <input type="radio" value="e" id="E" name="e">

                    <label for="F">f</label>
                    <input type="radio" value="f" id="F" name="f">

                    <label for="G">g</label>
                    <input type="radio" value="g" id="G" name="g">

                    <label for="H">h</label>
                    <input type="radio" value="h" id="H" name="h">

                    <label for="I">i</label>
                    <input type="radio" value="i" id="I" name="i">

                    <label for="J">j</label>
                    <input type="radio" value="j" id="J" name="j">

                    <label for="K">k</label>
                    <input type="radio" value="k" id="K" name="k">

                    <label for="L">l</label>
                    <input type="radio" value="l" id="L" name="l">

                    <label for="M">a</label>
                    <input type="radio" value="m" id="M" name="m">

                    <label for="N">n</label>
                    <input type="radio" value="n" id="N" name="n">

                    <label for="O">o</label>
                    <input type="radio" value="o" id="O" name="o">

                    <label for="P">p</label>
                    <input type="radio" value="p" id="P" name="p">

                    <label for="Q">a</label>
                    <input type="radio" value="q" id="Q" name="q">

                    <label for="R">r</label>
                    <input type="radio" value="r" id="R" name="r">

                    <label for="S">s</label>
                    <input type="radio" value="s" id="S" name="s">

                    <label for="U">u</label>
                    <input type="radio" value="u" id="U" name="u">

                    <label for="V">v</label>
                    <input type="radio" value="v" id="V" name="v">

                    <label for="W">w</label>
                    <input type="radio" value="w" id="W" name="w">

                    <label for="X">x</label>
                    <input type="radio" value="x" id="X" name="x">

                    <label for="Y">y</label>
                    <input type="radio" value="y" id="Y" name="y">

                    <label for="Z">z</label>
                    <input type="radio" value="z" id="Z" name="z">

                    </fieldset>

                    <input type="submit" name="envoyer">


                </form>
            </article>
        </section>
    </main>
    <footer>

    </footer>
</body>

</html>