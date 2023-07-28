<?php
// Prise d'information
print "Entrez votre numéro de Sécurité Sociale comme ceci : ";
$carte = readline();
// Supprimer les espaces de la saisie
$carte = str_replace(' ', '', $carte);

// Vérifier si la saisie contient plus de 15 caractères
if (strlen($carte) != 15) {
    print "pas ok";
} else {
    // Vérification des conditions
    if (
        $carte[0] > "0" && $carte[0] < "3" &&
        substr($carte, 1, 2) >= "01" && substr($carte, 1, 2) <= "99" &&
        substr($carte, 3, 2) >= "01" && substr($carte, 3, 2) <= "12" &&
        (
            (substr($carte, 5, 2) >= "01" && substr($carte, 5, 2) <= "99") &&
            substr($carte, 5, 2) != "00" // Exclure 00 pour les caractères 5 et 6
        ) &&
        (substr($carte, 13, 2) >= "01" && substr($carte, 13, 2) <= "97")
    ) {
        // Vérifier le caractère 6
        if (
            is_numeric($carte[5]) &&
            (is_numeric($carte[6]) || (strtoupper($carte[5] . $carte[6]) === "2A" || strtoupper($carte[5] . $carte[6]) === "2B"))
        ) {
            print "ok";
        } else {
            print "pas ok";
        }
    } else {
        print "pas ok";
    }
}