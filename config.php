<?php
 
const ETABLISSEMENT = "ISTA Marrakech";   // const : défini à la compilation
define('NOTE_MIN', 0);                    // define() : défini à l'exécution
define('NOTE_MAX', 20);
define('SEUIL', 10);
 
// Fonction réutilisée dans exo2, exo3 et liste.php
function mention($note) {
    if ($note >= 16)        return "Très bien";
    elseif ($note >= 14)    return "Bien";
    elseif ($note >= 12)    return "Assez bien";
    elseif ($note >= SEUIL) return "Passable";
    else                    return "Ajourné";
}