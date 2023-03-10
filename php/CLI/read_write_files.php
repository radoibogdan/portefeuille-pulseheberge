<?php 
// DIRECTORY_SEPARATOR => \\ doesnt exist in MAC so we use this for compatibility on other systems
// $fichier = __DIR__ . DIRECTORY_SEPARATOR .'demo.txt';
// var_dump(__DIR__); 
// var_dump(dirname(__DIR__));
// in PHP 7 this 
// var_dump(dirname(dirname(dirname(__DIR__))));
// is equivant to this
// var_dump(dirname(__DIR__,3));
// create file $fichier and write text inside, FILE_APPEND = add to file (DO NOT OVERIDE)
// @ in front of function (this example = file_put_contents) => Hides error/warning messages
// file_put_contents => return nb on octets written to file if SUCCESS and FALSE if FAILED TO WRITE
// $size = @file_put_contents($fichier, 'Commment ca va ???', FILE_APPEND);
// if ($size === false) {
//     echo 'Impossible d\'ecrire dans le fichier';
// } else {
//     echo 'Ecriture reussie';
// }


// echo file_get_contents($fichier); // a ne pas utiliser pour le links sur internet, mais uniquement pour les fichiers qui sont sur le serveur

//------------------- POUR LES FICHIERS CSV TRES GROS------------------- 

// pour les octets, pour les symboles (plus grands qu'un octet) c'est pas indiqué
// fopen, fseek, fstat, fread, fgets
// $fichier = __DIR__ . DIRECTORY_SEPARATOR .'demo.csv';
// $ressource = fopen($fichier, 'r');
// echo fread($ressource, 2);  // fichier + nombre de octets a lire ( 2 = 2 lettres/chiffres)

// ------------------- FGETS ------------------- 
// $fichier = __DIR__ . DIRECTORY_SEPARATOR .'demo.csv';
// $ressource = fopen($fichier, 'r'); // r = read only // r+ = read and write
// $k = 0;

// while ($line = fgets($ressource)) {
//     $k++;
//     if ($k == 1230) {
//         echo $line;
//         break;
//     }
// }
// fclose($ressource); 

// ------------------- WRITE TO FILE -------------------
$fichier = __DIR__ . DIRECTORY_SEPARATOR .'demo.csv';
$ressource = fopen($fichier, 'r+'); // r = read only // r+ = read and write
$k = 0;

while ($line = fgets($ressource)) {
    $k++;
    if ($k == 1) {
        fwrite($ressource, 'Salut les gens');
        break;
    }
}
fclose($ressource); 

/* Cap 15 - min 22 */