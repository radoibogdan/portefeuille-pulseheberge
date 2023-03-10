<?php 
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions.php' ; 
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'auth.php' ; 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <!--  <?php if (isset($title)) {echo $title;} else {echo 'Mon site';} ?>  -->
    <title> 
    <?php if (isset($title)) : ?>
        <?= $title ?>
    <?php else : ?>
          PHP!
    <?php endif ?>
    </title>
  <!-- copied from bootstrap site -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../php/styles/style.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="/index.php">Retour au site principal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <?= nav_menu('nav-link') ?>
          <!-- Non utilisé -->
          <!-- <?= nav_item('/blog.php', 'Blog'); ?> -->
          <!-- Non utilisé -->
        </ul>
        <ul class="navbar-nav">
          <?php if (est_connecte()) : ?>
              <li class="nav-item"> <a class="nav-link" href="./logout.php">Se déconnecter</a></li>
          <?php endif ?>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">