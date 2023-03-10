<?php
// initialiser une session cURL. renvoie une ressource qui pointe vers la session cURL
$curl = curl_init('http://api.openweathermap.org/data/2.5/weather?q=Montpellier,fr&APPID=94c6cf0868fa5cb930a5e2d71baf0dbf&units=metric&lang=fr');
// working key : 94c6cf0868fa5cb930a5e2d71baf0dbf
// my ky :       ecb77cb817d74319be2a586bd8bdc8bf
// test : https://samples.openweathermap.org/data/2.5/weather?q=London,uk&appid=439d4b804bc8187953eb36d2a8c26a02
// execute une session cURL, renvoie true si OK

// -------- Paramétrage de la sessions cURL + SSL --------- //
// NON CONSEILLE : désactiver l'authentification ssl
// curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);

// CONSEILLE: télécharger le SSL depuis le site et le mettre dans notre projet (voir doc) 
// curl_setopt($curl, CURLOPT_CAINFO, __DIR__ . DIRECTORY_SEPARATOR . 'cert.cer');

// CURLOPT_RETURNTRANSFER = true => au lieu d'afficher le resultat via curl_exec, cette option renvoie(RETURN) le résultat

curl_setopt_array($curl, [
    CURLOPT_CAINFO => __DIR__ . DIRECTORY_SEPARATOR . 'cert.cer',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT         => 1 // attente de la réponse / du serveur
]);

// Exécute la requête / session cURL fournie
// Returns TRUE on success or FALSE on failure. However, if the CURLOPT_RETURNTRANSFER option is set, it will return the result on success, FALSE on failure. 
$data = curl_exec($curl);
if ($data === false) {
    var_dump(curl_error($curl));
} else {
    // récupérer des inforsmations sur la résolutions de l'url (400 si erreur dans l'url)
    if (curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200){
    $data = json_decode($data, true); // true => je veux un tableau associatif
    echo 'Il fait ' . $data['main']['temp'] . '°C';
    // var_dump($data['main']['temp']);
    }
    
}

curl_close($curl);

