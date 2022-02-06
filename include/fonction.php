<?php

function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function trimTab($tab)
{
    $t = [];
    foreach ($tab as $item) {
        array_push($t, trim($item));
    }
    return $t;
}

function deleteSpecialChar($str)
{

    // remplacer tous les caractères spéciaux par une chaîne vide
    $res = str_replace(array(' ', '%', '@', '\'', ';', '<', '>', '+', '*', '[', ']', ',', '?', '|', '$', '§', '!', '&', '_',
    '`', '=', '^', '(', ')', '{', '}', '#', "~", ':', ';', '/',), '', $str);

    return $res;
}