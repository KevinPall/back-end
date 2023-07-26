<?php
// Liste des jours fériés en France
$joursFeries = [
    '01/01', // Jour de l'an
    '17/04', // Lundi de Pâques
    '01/05', // Fête du Travail
    '08/05', // Victoire 1945
    '14/07', // Fête nationale
    '15/08', // Assomption
    '01/11', // Toussaint
    '11/11', // Armistice 1918
    '25/12', // Noël
];

// Prend les infos sur la date jour/mois/année
$date = readline("Entrez une date au format jour/mois/année : ");

// Séparer les parties de la date en utilisant le séparateur "/"
$parties = explode("/", $date);

// Vérifier si le format de la date est correct (jour/mois/année)
if (count($parties) === 3) {
    $jour = (int)$parties[0];
    $mois = (int)$parties[1];
    $annee = (int)$parties[2];

    // Vérifier si les valeurs sont valides
    if (checkdate($mois, $jour, $annee)) {
        $date_formatee = sprintf("%02d/%02d", $jour, $mois);
        $estFerie = in_array($date_formatee, $joursFeries);

        if ($estFerie) {
            print "vrai";
        } else {
            print "faux";
        }

    } else {
        print "Date invalide : Veuillez saisir une date valide au format jour/mois/année." . PHP_EOL;
    }
} else {
    print "Format de date invalide : Veuillez saisir la date au format jour/mois/année." . PHP_EOL;
}
// Pour afficher le tableau
print PHP_EOL.implode(PHP_EOL,$joursFeries) ;
?>

