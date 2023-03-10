<?php 
session_start();
$_SESSION['role'] = 'administrateur';
// unset($_SESSION['role']);

$_SESSION['user'] = [
  'username' => 'John',
  'password' => '0000'
];
$title = "Page d'accueil";
$nav = "index";
require 'elements/header.php'; ?>
      <div class="starter-template">
        <h1>Exemples de pages en PHP</h1>
        <p class="lead">... dans les onglets</p>
      </div>

<?php require 'elements/footer.php'; ?>


