<?php

require 'config.php';   // contient mention()
 
echo "<h2>2.1 mention()</h2>";
foreach ([18, 15, 12, 10, 9] as $n) echo "$n : " . mention($n) . "<br>";
 
echo "<h2>2.2 switch</h2>";
$mois = date("m");
switch ($mois) {
    case "01": $nom = "Janvier"; break;
    case "02": $nom = "Février"; break;
    case "03": $nom = "Mars"; break;
    case "04": $nom = "Avril"; break;
    case "05": $nom = "Mai"; break;
    case "06": $nom = "Juin"; break;
    case "07": $nom = "Juillet"; break;
    case "08": $nom = "Août"; break;
    case "09": $nom = "Septembre"; break;
    case "10": $nom = "Octobre"; break;
    case "11": $nom = "Novembre"; break;
    case "12": $nom = "Décembre"; break;
    default:   $nom = "Mois inconnu";
}
echo "Nous sommes en $nom<br>";
// Sans break : l'exécution "tombe" dans le case suivant (fall-through)
// jusqu'au prochain break ou la fin du switch.
 
echo "<h2>2.3 Boucles</h2>";
echo "<pre>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) echo "*";
    echo "\n";
}
echo "</pre>";
 
$i = 0;
while ($i <= 20) {
    echo ($i == 10) ? "<b>$i</b> " : "$i ";
    $i += 2;
}
echo "<br>";
 
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) continue;
    echo "$i ";
}
echo "<br>";
 
$i = 1;
while (true) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;               // sort uniquement du switch
        case 10:
            echo "At 10; quitting<br>";
            break 2;             // sort du switch ET de la boucle
    }
    $i++;
}
 
$i = 0;
do {
    echo ($i == 10) ? "<b>$i</b> " : "$i ";
    $i += 2;
} while ($i <= 20);
echo "<br>";
// Différence : do-while exécute le corps AU MOINS UNE FOIS (condition testée
// après), while peut ne jamais s'exécuter (condition testée avant).
 
echo "<h2>6.3 (3) checkdate()</h2>";
$jour = 31; $m = 2; $annee = 2026;
echo "$jour/$m/$annee : " . (checkdate($m, $jour, $annee) ? "date valide" : "date invalide") . "<br>";
 