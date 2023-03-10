<?php

require 'Creneau.php';

$creneau = new Creneau(9, 12);
$creneau2 = new Creneau(14, 16);
$creneau->intersect($creneau2);
var_dump(
    $creneau->intersect($creneau2)
);
echo $creneau->toHTML();

/* Ch 25 statique */