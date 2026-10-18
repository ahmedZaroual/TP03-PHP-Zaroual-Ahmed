<?php 
// ---------- Partie 0 ----------
echo 'Hello PHP<br>';
// commentaire avec //
# commentaire avec #
/* commentaire
   sur plusieurs lignes */
 
echo "<h2>1.1 Noms de variables</h2>";
// $x      : valide (commence par une lettre)
// $_x     : valide (commence par underscore)
// $2x     : INVALIDE (ne peut pas commencer par un chiffre)
// $x-y    : INVALIDE (le tiret est l'opérateur moins)
// $Prix_HT: valide (lettres, chiffres, underscore)
// $prix ht: INVALIDE (espace interdit)
// $état   : valide (les octets 0x80-0xFF sont acceptés), mais déconseillé
$x = 1; $_x = 2; $Prix_HT = 100; $état = "ok";
$a = 1; $A = 2;   // PHP est sensible à la casse pour les variables
echo "\$a = $a et \$A = $A : deux variables distinctes<br>";
 
echo "<h2>1.2 Constantes</h2>";
require 'config.php';
echo ETABLISSEMENT . "<br>" . NOTE_MIN . "<br>" . NOTE_MAX . "<br>" . SEUIL . "<br>";
var_dump(defined('SEUIL'));    // true
var_dump(defined('INCONNUE')); // false
// Constante non définie : PHP 8 lève une Error (fatale) "Undefined constant"
//   (en PHP 7 : Warning et affiche le nom en texte).
// const vs define() : const est résolu à la compilation, doit être au niveau
//   global (pas dans un if/boucle), nom fixe. define() est exécuté à l'exécution,
//   peut être dans une condition et accepte un nom calculé.
 
echo "<h2>1.3 Calcul</h2>";
$prix_ht = 60; $tva = 20;
$prix_ttc = $prix_ht * (1 + $tva / 100);
echo "Le prix TTC du produit est de $prix_ttc €.<br>";
 
echo "<h2>1.4 Types et conversions</h2>";
$test = 42;
$test = (string) $test;
var_dump($test);                                   // string(2) "42"
echo "<pre>";
// Prédictions : false, false, false, false, true, false, false
foreach ([0, 0.0, "0", "", "abc", [], null] as $v) var_dump((bool) $v);
// Prédictions : 3, 12, 1500.0, 1
var_dump((int) 3.9, (int) "12abc", (float) "1.5e3", (int) true);
echo "</pre>";
$dec = 255; $hex = 0xFF; $oct = 0377; $bin = 0b11111111;
echo "$dec $hex $oct $bin<br>";   // les 4 valent 255
 
echo "<h2>1.5 Chaînes</h2>";
$traitees = "égales à"; $ici = 2;
echo 'Ahmed a dit : "J\'ai réussi"<br>';
echo 'Voulez-vous supprimer C:\*.*?<br>';
echo 'Ceci n\'affichera pas \n de nouvelle ligne<br>';
echo 'Les variables ne seront pas $traitees $ici<br>';
echo "Les variables seront $traitees $ici<br>";
 
$s = trim("*Bonjour les développeurs*", "*");
echo $s . "<br>";
// strlen() compte des octets : "é" casserait l'affichage -> mb_strlen/mb_substr pour l'UTF-8
for ($i = 0; $i < mb_strlen($s); $i++) {
    echo mb_substr($s, $i, 1) . "<br>";
}
 