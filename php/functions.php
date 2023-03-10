<?php
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

function nav_menu (string $linkClass = ''): string
{
    return 
        nav_item('../php/index.php', 'Accueil', $linkClass) .
        nav_item('../php/menu.php', 'Menu', $linkClass) .
        nav_item('../php/horraire_magasin.php', 'Contact', $linkClass) .  
        nav_item('../php_livre_d_or/index.php', 'Livre d\'or', $linkClass) .  
        nav_item('../php_livre_d_or/meteo.php', 'Prévisions méteo', $linkClass) .  
        nav_item('../php/cookie_check_age_18.php', '+18', $linkClass) . 
        nav_item('../php/devinez_le_chiffre.php', 'Devinez le chiffre!', $linkClass) . 
        nav_item('../php/creez_votre_glace.php', 'Créez votre glace', $linkClass) . 
        nav_item('../php/newsletter.php', 'Newsletter', $linkClass) . 
        nav_item('../php/dashbord.php', 'Dashbord Admin', $linkClass); 
}

// CREER UN CHECKBOX
function checkbox(string $name, string $value, array $data) : string 
{
    $attributes = '';
    // est-ce qu'on a (elle existe) dans DATA la clé NAME ET est-ce que VALUE est dans DATA avec la clé NAME
    // est-ce qu'on a dans _GET la clé parfum             ET est-ce que CHOCOLAT est dans ce tableau
    if (isset($data[$name]) && in_array($value, $data[$name])) {
        $attributes .= 'checked';
    }
    return <<<HTML
    <input type="checkbox" name="${name}[]" value="$value" $attributes>
HTML;
}

// CREER UN RADIO
// radio('cornet', $cornet, $_GET)
function radio(string $name, string $value, array $data) : string 
{
    $attributes = '';
    // est-ce qu'on a dans DATA la clé NAME (elle existe??)   ET est-ce que VALUE est dans DATA avec la clé NAME
    // est-ce qu'on a dans _GET la clé parfum                 ET est-ce que CHOCOLAT est dans ce tableau
    if (isset($data[$name]) && $value === $data[$name]) {
        $attributes .= 'checked';
    }
    return <<<HTML
    <input type="radio" name="${name}" value="$value" $attributes>
HTML;
}
/* select('jour', $jour, JOURS)  */
function select(string $name, $value, array $options) : string {
    $html_options = [];
    foreach ($options as $k => $option) {
        $attributes = $k == $value ? 'selected' : '';
        $html_options[] = "<option value='$k' $attributes >$option</option>";
    }
    return "<select class='form-control' name='$name'>" . implode($html_options) . "</select>";
}

function dump($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

function creneaux_html(array $creneaux) {
    //construire le tableau intermediaire
    //si creneaux vide => magasin fermé,  sortir de la boucle
    if (empty($creneaux)) {
        return 'Fermé';
    }
    $phrases = [];
    foreach($creneaux as $creneau) {
        $phrases[] = "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>" ;
        /* $phrases[] = "de $creneau[0] h à $creneau[1]h" ; */ 
        /* $phrases2[] = 'de ' . $creneau[0] . 'h à '. $creneau[1] . 'h' ; */
    }
    return 'Ouvert ' . implode (' et ', $phrases);
}

function in_creneaux (int $heure, array $creneaux) : bool 
{
foreach($creneaux as $creneau) {
    $debut = $creneau[0];
    $fin =  $creneau[1];
    if ($heure >= $debut && $heure < $fin) {
        return true;
    }
}
return false;
}

?>