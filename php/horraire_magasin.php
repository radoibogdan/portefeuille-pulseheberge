<?php 
session_start(); 
$title = "Nous contacter";
$nav = "contact";
require_once 'data/constants.php';
require_once 'functions.php';
date_default_timezone_set('Europe/Paris');
// Récupérer l'heure et le jour d'aujourd'hui ou les infos introduites par l'utilisateur
$heure = (int)($_GET['heure'] ?? date('G'));  // G = heure
$jour  = (int)($_GET['jour'] ?? date('N')-1); // N = jour
// Récupérer le créneaux d'aujourd'hui ou celui désiré par l'utilisateur
$creneaux = CRENEAUX[$jour];
// Récupérer l'état d'ouverture du magasin
$ouvert = in_creneaux($heure, $creneaux);
$color = $ouvert ? 'green' : 'red';
$color = 'green';

if (!$ouvert) {
    $color = 'red';
}
require 'elements/header.php'; ?>

<div class="row">
    <div class="col-md-8">
        <h2>Nous contacter</h2>
        <p>Une page destinée à vérifier les horaires d'ouverture d'un magasin.</p>
    </div>
    <div class="col-md-4">
        <h4>Horaires d'ouverture</h4>

        <?php if($ouvert): ?>
            <div class="alert alert-success">
                Le magasin sera ouvert.
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Le magasin sera fermé.
            </div>
        <?php endif ?>

        <form action="" method="GET">
            <div class="form-group">
                <?= select('jour', $jour, JOURS) ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="heure" value="<?= $heure ?>">
            </div>
            <button class="btn btn-primary" type="submit">Voir si le magasin est ouvert</button>
        </form>

        <ul>
            <?php foreach(JOURS as $k => $jour): ?>
                <!-- à l'intérieur du LI on rajoute du style pour aujourd'hui -->
                <!-- inside LI <?php if ($k + 1 === (int)date('N')): ?> style="color:<?= $color ?>"; <?php endif ?> -->
                <li  >
                    
                    <strong> <?= $jour ?> </strong> :
                    <?= creneaux_html(CRENEAUX[$k]) ?> 
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>


<?php require 'elements/footer.php'; ?>
