<?php 
/* HERITAGE */

// Changez dans le footer, lors de la création de la classe, le Compteur en DoubleCompteur pour une augmentation par une valeur constant INCREMENT
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Compteur.php';

    class DoubleCompteur extends Compteur {

        const INCREMENT = 10;



        /* public function recuperer(): int
        {
           return 2 * parent::recuperer();
        } */
    }
?>
