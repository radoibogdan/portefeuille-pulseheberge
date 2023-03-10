<?php 
require_once 'functions.php';
//Checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];

//Radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];

//Checkbox
$supplements = [
    'Pepites de chocolat' => 1,
    'Chantilly' => 0.5 
];

$title = 'Composer votre glace';
$ingredients = [];
$total = 0;

foreach(['parfum', 'supplement', 'cornet'] as $name) {
    if (isset($_GET[$name])) {
        $liste = $name . 's';
        $choix = $_GET[$name];
        if(is_array($choix)) { // vérifier que le $_GET ramène un tableau (parfum ou supp) ou ramène une valeur (cornet)
            foreach($choix as $value) {        
                if(isset($$liste[$value])) {   // pour que l'utilisateur ne rajoute un ingredient qui n'existe pas dans l'url
                    $ingredients[] = $value ;  // le nom du produit
                    $total += $$liste[$value]; // le prix du produit
                }
            }
        } else {
            if(isset($$liste[$choix])) { // variable dynamique $$liste ($ + valeur de $liste => $parfums, $supplements, $cornets)
                $ingredients[] = $choix;
                $total += $$liste[$choix];
            }
        }
    }
}

require 'elements/header.php';
?>

<h1>Composer votre glace</h1>

<div class="row">

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre glace</h5>
                <ul>
                    <?php foreach($ingredients as $ingredient) : ?>
                        <li> <?= $ingredient?> </li>
                    <?php endforeach ?>
                </ul>
                <p>
                    <strong> Prix: <?= $total ?>€  </strong> 
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
    <form action="./creez_votre_glace.php" method="GET">
    <h2>Choisissez vos parfums</h2>
    <?php foreach($parfums as $parfum => $prix): ?>
        <div class="checkbox">
            <label>
                <?= checkbox('parfum', $parfum, $_GET) ?>
                <?= $parfum ?> - <?= $prix ?> €
            </label>
        </div>
    <?php endforeach; ?>

    <h2>Choisissez votre cornet</h2>
    <?php foreach($cornets as $cornet => $prix): ?>
        <div class="checkbox">
            <label>
                <?= radio('cornet', $cornet, $_GET) ?>
                <?= $cornet ?> - <?= $prix ?> €
            </label>
        </div>
    <?php endforeach; ?>

    <h2>Choisissez vos suppléments</h2>
    <?php foreach($supplements as $supplement => $prix): ?>
        <div class="checkbox">
            <label>
                <?= checkbox('supplement', $supplement, $_GET) ?>
                <?= $supplement ?> - <?= $prix ?> €
            </label>
        </div>
    <?php endforeach ?>

    <button class="btn btn-primary" type="submit">Composer ma glace</button>
</form>
    </div>
</div>

<!-- <h2>$_GET</h2>
<pre>
    <?php var_dump($_GET) ?> 
</pre>

<h2>$_POST</h2>
<pre>
    <?php var_dump($_POST) ?>
</pre> -->

<?php require 'elements/footer.php';?>


