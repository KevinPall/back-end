<?php
// Récupérer le numéro du département saisi par l'utilisateur
print "Entrez le numéro du département : ";
$numeroDepartement = readline();

// Définir le chemin d'accès au fichier CSV
$cheminFichierCSV = 'villes_france.csv';

// Vérifier si le fichier existe
if (file_exists($cheminFichierCSV)) {
    // Ouvrir le fichier en lecture
    $fichier = fopen($cheminFichierCSV, 'r');

    $villesTrouvees = array(); // Tableau pour stocker les villes trouvées

    // Parcourir le fichier ligne par ligne et rechercher les villes du département correspondant
    while (($ligne = fgets($fichier)) !== FALSE) {
        // Convertir la ligne en tableau en utilisant les virgules comme séparateurs
        $donnees = str_getcsv($ligne, ',');

        // Vérifier si le numéro du département correspond à celui saisi par l'utilisateur
        if ($donnees[1] == $numeroDepartement) {
            // Stocker le nom de la ville dans le tableau
            $villesTrouvees[] = $donnees[2];
        }
    }

    // Fermer le fichier après l'avoir lu
    fclose($fichier);

    // Si des villes ont été trouvées, les trier par ordre alphabétique
    if (!empty($villesTrouvees)) {
        sort($villesTrouvees);

        echo "Villes associées au département $numeroDepartement : \n";
        print_r($villesTrouvees);
    } else {
        echo 'Aucune ville trouvée pour ce département.';
    }
} else {
    echo "Le fichier CSV n'existe pas.";
}
