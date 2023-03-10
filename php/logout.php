<?php
/* Pour se déconnecter du dashbord, il faut passer par la page de logout */
session_start(); // pour démarrer ou continuer la session
unset($_SESSION['connecte']);
// Envoi vers la page de login.php
header("Location: ./login.php");
// pas besoin de exit() car pas de code derière