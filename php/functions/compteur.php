<?php
function ajouter_vue():void {
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier = $fichier . '-' . date('Y-m-d');
    incrementer_compteur($fichier);
    incrementer_compteur($fichier_journalier);
} 

function incrementer_compteur (string $fichier) : void {
        //verifier si le fichier compteur existe
        $compteur = 1; // écrasé avec la vraie valeur si le fichier existe
    if (file_exists($fichier)) {
        //si le fichier existe on incremente la variable $compteur
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    } 
        //si le fichier existe on stocke la valeur,
        //si le fichier n'existe pas cette fonction crée le fichier
        file_put_contents($fichier, $compteur);
}

function nombre_vues():string {
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier); // file_get_contents returns string ;
}

function nombre_vues_mois(int $annee, int $mois): int {
    $mois = str_pad($mois, 2,'0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $total = 0;
    foreach($fichiers as $fichier) {
        $total += (int)file_get_contents($fichier);
    }
    return $total;
}

function nombre_vues_detail_mois(int $annee, int $mois): array {
    $mois = str_pad($mois, 2,'0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $visites = [];
    foreach($fichiers as $fichier) {
        $parties = explode('-', basename($fichier));
        $visites[] = [
            'annee' => $parties[1],
            'mois'  => $parties[2],
            'jour'  => $parties[3],
            'visites' => file_get_contents($fichier)
        ];
    }
    return $visites;
}