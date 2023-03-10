<?php 
/* LA PARTIE LOGIQUE A METTRE EN AMONT */
$aDeviner = 150;
$erreur = null;
$succes = null;
$value = null;
if (isset($_POST['chiffre'])) {
    $value = (int)$_POST['chiffre'];
    if ($value > $aDeviner) {
        $erreur = "Votre chiffre est trop grand";
    } elseif ($value < $aDeviner) {
        $erreur = "Votre chiffre est trop petit";
    } else {
        $succes = "Bravo ! Vous avez deviné le chiffre <strong> $aDeviner </strong>";
    }
    /* htmlentities to sanitize data from DEVIL USER */
}
require 'elements/header.php';
?>

<!-- si $erreur différent de null -->
<?php if($erreur): ?>
    <div class= "alert alert-danger">
        <?= $erreur ?> 
    </div>
<?php elseif($succes): ?>
    <div class="alert alert-success">
        <?= $succes ?>
    </div>
<?php endif ?>

<form action="./devinez_le_chiffre.php" method="POST">
<div class="form-group">
    <input class="form-control" type="number" name="chiffre" placeholder="Entre 0 et 1000" value="<?= $value ?>">
</div>
    <button class="btn btn-primary" type="submit">Deviner</button>
</form>

<!-- <h2>$_GET</h2>
<pre>
    <?php var_dump($_GET) ?> 
</pre>

<h2>$_POST</h2>
<pre>
    <?php var_dump($_POST) ?>
</pre> -->

<?php require 'elements/footer.php';?>
