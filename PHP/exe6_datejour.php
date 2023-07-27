<?php
// Prend les infos sur la date jour/mois/année
$date = readline("Entrez une date au format jour/mois/année : ");
// Séparer les parties de la date en utilisant le séparateur "/"
$parties = explode("/", $date);

// Vérifier si le format de la date est correct (jour/mois/année)
if (count($parties) === 3) {
    $jour = (int)$parties[0];
    $mois = (int)$parties[1];
    $annee = (int)$parties[2];

 // Vérification des valeurs des composants de la date
 if ($jour < 1 || $jour > 31 || $mois < 1 || $mois > 12 || $annee < 1000 || $annee > 9999) {
    echo "Date invalide. Assurez-vous que le jour est entre 1 et 31, le mois entre 1 et 12, et l'année est une valeur à quatre chiffres.\n";
    exit; // Arrêter le script en cas de date invalide
}
// Créer un timestamp Unix pour la date donnée
$timestamp = mktime(0, 0, 0, $mois, $jour, $annee);

// Obtenir les informations détaillées de la date
$infosDate = getdate($timestamp);

// Récupérer le jour de la semaine (en français)
$jourDeSemaine = $infosDate['weekday'];

// Afficher le résultat
echo "Le jour de la semaine correspondant à la date $date est : $jourDeSemaine\n";
} else {
echo "Format de date incorrect. Veuillez utiliser le format jour/mois/année (par exemple : 27/07/2023).\n";
}
?>