<?php
// Récupérer le numéro du département saisi par l'utilisateur
print "Entrez le nom du parking : ";
$parking = readline();

// Définir le chemin d'accès au fichier CSV
$cheminFichierCSV = 'occupationparking.csv';

// Vérifier si le fichier existe
if (file_exists($cheminFichierCSV)) {
    // Ouvrir le fichier en lecture
    $fichier = fopen($cheminFichierCSV, 'r');

    // Parcourir le fichier ligne par ligne et rechercher le parking correspondant EN remplacent la , (virgule) par le ; (points virgule) dans le fichier CSV
    while (($donnees = fgetcsv($fichier,1000,";")) !== FALSE) {
        // Vérifier si le parking correspond à celui saisi par l'utilisateur
        if (($donnees[0]) == ($parking)) {
            // Afficher les informations du département
            print 'Parking Ouvert ou Fermer : ' . $donnees[4] . PHP_EOL;
            


            break; // Sortir de la boucle dès que le département est trouvé
        }
    }

    // Fermer le fichier après l'avoir lu
    fclose($fichier);

    // Si le département n'est pas trouvé, afficher un message d'erreur
    if (!isset($donnees) || $donnees === FALSE) {
        print 'Parking non trouvé.';
    }
} else {
    print "Le fichier CSV n'existe pas.";
}
