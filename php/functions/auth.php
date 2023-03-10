<?php

function est_connecte() : bool {
    // pour ne pas mettre une session_start a chaque fois dans le dashbord
    // si aucune session active => commence la session
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // renvoie false si l'utilisateur n'est pas connecté
    // empty($_SESSION['connecte']) => false = utilisateur connecté => !empty = true
    return !empty($_SESSION['connecte']);
}

function forcer_utilisateur_connecte ():void {
    if(!est_connecte()) {
        // si l'utilisateur n'est pas connecté => redirigez vers login.php
        header('Location: ./login.php'); 
        exit();
    }
}
