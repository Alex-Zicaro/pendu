
<?php

require_once('include/fonction.php');




if (isset($_POST["newMot"])) {

    $msg = false;

    $Nouveaumot = $_POST["newMot"];

    $newMot = deleteSpecialChar(strtolower($Nouveaumot));

    if (!isset($arrayMot))
        $arrayMot = trimTab(file("mots.txt"));

    foreach ($arrayMot as $mot){
        if($newMot === $mot){
            $msg = "Le mot n'est pas disponible";
        }
    }
        if(!$msg){
            
            $fichierMot = fopen('mots.txt', 'a+');
            fputs($fichierMot, $newMot . "\n");
            $msg = "J'ai taper votre mot à la main pour le rentrer dans le jeu";
            
        }
    
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
                <h2>
                    <?php 
                    if(isset($msg)){
                        echo $msg;
                    }
                    ?>
                </h2>
                <form action="" method="POST">
                    <label for="newMot">Voulez vous ajouter un nouveau mot ? (<i>caractère spéciaux interdit</i>)</label>
                    <input type="text" id="newMot" name="newMot">
                    <input type="submit" name="enoyer" value="envoyer">
                </form>
            </article>
        </section>
    </main>
    <footer>

    </footer>
</body>

</html>