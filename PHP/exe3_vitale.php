<?php
// Prise d'information
print "Entrez votre numero de Sécurité Sociale comme ceci : ";
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
            ((substr($carte, 5, 2) >= "01" && substr($carte, 5, 2) <= "97") && substr($carte, 5, 2) != "00") ||
            ((substr($carte, 5, 2) == "2a" || substr($carte, 5, 2) == "2b"))
        ) &&
        (substr($carte, 13, 2) >= "01" && substr($carte, 13, 2) <= "97")
    ) {
        // 
        if ($carte[5] != "2" && in_array($carte[6], ["b", "B"])) {
            print "pas ok";
        } else {
        print "ok";
        }
    } else {
        print "pas ok";
    }
}
