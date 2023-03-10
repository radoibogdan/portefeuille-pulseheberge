<?php
class Form {

    public static $class = "form-control";

    /* checkbox('supplement', $supplement, $_GET) */
    public static function checkbox(string $name, string $value = null, array $data = []) : string 
    {
        $attributes = '';
        // est-ce que la clé "name" existe dans DATA  ET est-ce que VALUE est dans DATA avec la clé NAME
        // est-ce que la clé "parfum" existe dans _GET  ET est-ce que CHOCOLAT est dans ce tableau
        if (isset($data[$name]) && in_array($value, $data[$name])) {
            $attributes .= 'checked';
        }
        /*
        On met le [] devant la variable pour ajouter toutes les sélections de l'utilisateur a un array 
        ça fonctionne comme un push
        pour récupérer la variable 
        echo $_POST["name"][index de la sélection];
        */
        $attributes .= 'class="' . self::$class . '"';
        return <<<HTML
        <input type="checkbox" name="${name}[]" value="$value" $attributes>
HTML;
    }

    public static function radio(string $name, string $value, array $data) : string 
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
    public static function select(string $name, $value, array $options) : string {
        $html_options = [];
        foreach ($options as $k => $option) {
            $attributes = $k == $value ? 'selected' : '';
            $html_options[] = "<option value='$k' $attributes >$option</option>";
        }
        return "<select class='form-control' name='$name'>" . implode($html_options) . "</select>";
    }

}