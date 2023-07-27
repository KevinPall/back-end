<?php
// Récupérer le numéro du département saisi par l'utilisateur
print "Entrez le numéro du département : ";
$numeroDepartement = readline();

// Définir le chemin d'accès au fichier CSV
$cheminFichierCSV = 'departement.csv';

// Vérifier si le fichier existe
if (file_exists($cheminFichierCSV)) {
    // Ouvrir le fichier en lecture
    $fichier = fopen($cheminFichierCSV, 'r');

    // Parcourir le fichier ligne par ligne et rechercher le département correspondant
    while (($donnees = fgetcsv($fichier)) !== FALSE) {
        // Vérifier si le numéro du département correspond à celui saisi par l'utilisateur
        if (($donnees[1]) == ($numeroDepartement)) {
            // Afficher les informations du département
            print 'Numéro du département : ' . $donnees[1] . PHP_EOL;
            print 'Département : ' . $donnees[2];


            break; // Sortir de la boucle dès que le département est trouvé
        }
    }

    // Fermer le fichier après l'avoir lu
    fclose($fichier);

    // Si le département n'est pas trouvé, afficher un message d'erreur
    if (!isset($donnees) || $donnees === FALSE) {
        echo 'Département non trouvé.';
    }
} else {
    echo "Le fichier CSV n'existe pas.";
}
