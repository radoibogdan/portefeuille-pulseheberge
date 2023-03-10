<?php
require_once 'class/OpenWeather.php';
$weather  = new OpenWeather('94c6cf0868fa5cb930a5e2d71baf0dbf');
$error = null;
try {
$forecast = $weather -> getForecast('Paris,fr');
$today    = $weather -> getToday('Paris,fr');
} catch (Exception $e) {
    $error = $e->getMessage();
    // $error = $e->getCode() . ' : '. $e->getMessage();
} catch (Error $e) { // pour les erreur PHP
    $error = $e->getMessage();
}
/* var_dump($forecast); */

require '../php/elements/header.php';
?>

<?php if ($error) : ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php else : ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2> Intéragir avec l'API OpenWeather</h2>
            <div class="alert alert-success" role="alert">Les prévisions pour Montpellier</div>
        </div>
    </div>
    <ul>
        <li> En ce moment <?= $today['date']->format('d/m/Y') ?> <?= $today['description'] ?> <?= $today['temp'] ?>°C</li>
        <?php foreach($forecast as $day) : ?>
        <li> <?= $day['date']->format('d/m/Y') ?> <?= $day['description'] ?> <?= $day['temp'] ?>°C</li>
        <?php endforeach ?>
    </ul>
</div>
<?php endif ?>
<?php require '../php/elements/footer.php'; ?>
