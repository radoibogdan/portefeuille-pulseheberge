<?php

/* NON UTILISE POUR LA CREATION DU MENU*/
/* Functions.php, fonction nav-menu utlisée pour ceci */
if(!function_exists('nav_item')) {
    function nav_item(string $lien, string $titre, string $linkClass = ''): string 
    {
    $classe = 'nav-item';
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe .= ' .active';
    }

    return <<<HTML
    <li class="$classe">
        <a class="$linkClass" href="$lien">$titre</a>
    </li>
HTML;
    }
}

?>


<!--  <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === "/index.php"): ?> active <?php endif ?> ">
            <a class="nav-link" href="/index.php">Accueil</a>
      </li> -->

<?= nav_item('/index.php', 'Accueil', $class); ?>
<?= nav_item('/contact.php', 'Contact', $class); ?>
