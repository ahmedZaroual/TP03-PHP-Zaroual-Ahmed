<?php

require 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';
 
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];
$modules = ["PHP", "JavaScript", "Base de données"];
 
echo "<h2>3.1 Modules</h2>";
foreach ($modules as $m) echo "$m<br>";
for ($i = 0; $i < count($modules); $i++) echo "[$i] " . $modules[$i] . "<br>";
 
echo "<h2>3.2 Tableau HTML</h2>";
echo "<table border='1' cellpadding='5'><tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";
foreach ($notes as $nom => $note) {
    $style = ($note < SEUIL) ? " style='color:red'" : "";
    echo "<tr$style><td>$nom</td><td>$note</td><td>" . mention($note) . "</td></tr>";
}
echo "</table>";
 
echo "<h2>3.3 Statistiques</h2>";
$somme = 0; $max = NOTE_MIN; $min = NOTE_MAX; $nb = 0;
foreach ($notes as $n) {
    $somme += $n; $nb++;
    if ($n > $max) $max = $n;
    if ($n < $min) $min = $n;
}
$moyenne = $somme / $nb;
echo "Somme = $somme, Moyenne = " . round($moyenne, 2) . ", Max = $max, Min = $min<br>";
echo "Vérification : " . array_sum($notes) . " / " . round(array_sum($notes) / count($notes), 2)
   . " / " . max($notes) . " / " . min($notes) . "<br>";
 
$effectifs = [];
foreach ($notes as $n) {
    $m = mention($n);
    $effectifs[$m] = ($effectifs[$m] ?? 0) + 1;
}
echo "Effectifs par mention : ";
print_r($effectifs);
 
echo "<h2>3.4 Tris</h2>";
function afficher($tab) {
    foreach ($tab as $nom => $note) echo "$nom : $note<br>";
}
$t = $notes; ksort($t);  echo "<h3>Noms croissants (ksort)</h3>";  afficher($t);
$t = $notes; arsort($t); echo "<h3>Notes décroissantes (arsort)</h3>"; afficher($t);
$t = $notes; krsort($t); echo "<h3>Noms décroissants (krsort)</h3>"; afficher($t);
$t = $notes; asort($t);  echo "<h3>Notes croissantes (asort)</h3>";  afficher($t);
// Tableau indexé comme $modules : sort() (croissant) ou rsort() (décroissant),
// qui réindexent les clés (ksort/asort conserveraient les anciennes clés).
 
echo "<h2>3.5 Opérateurs de tableaux</h2>";
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];
echo "<pre>";
print_r($a + $b);        // ["x"=>1,"y"=>2] : union, les clés de $a sont prioritaires
var_dump($a == $b);      // true  : mêmes paires clé/valeur
var_dump($a === $b);     // false : même paires mais ordre différent (et types identiques)
echo "</pre>";
 
include 'includes/pied_inc.php';