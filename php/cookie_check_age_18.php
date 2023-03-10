<?php
/* COOKIE EXAMPLE 3 */
$age = null;

if(!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
    // => crée un cookie ($_COOKIE['birthday'] = valeur du $_POST['birthday']) pour la prochaine connexion, donc la paire clé-valeur entrée dans le formulaire ne sera disponible qu'à la suite de la deuxième fois qu'on utilise le formulaire
    $_COOKIE['birthday'] = $_POST['birthday'];  
    // => met à disposition tout de suite la valeur du cookie définie dans le setcookie, dès la première utilisation du formulaire
}

// Calculer l'âge
if(!empty($_COOKIE['birthday'])) {
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}

require 'elements/header.php';
?>
<h4>Cet exemple permet de sauvegarder dans un cookie l'âge sélectionné et afficher ou pas du contenu.</h4>
<?php if($age >=18) : ?>
    <h1>Le contenu réservé aux adultes est affiché</h1>
<?php elseif($age !== null) : ?>
    <div class="alert alert-danger">Vous n'avez pas l'âge requis pour voir le contenu!</div>
<?php else : ?> 
<!-- NULL => c'est la première connexion -->
<form action="" method="POST">
    <div class="form-group">
        <label for="birthday" id="birthday">Section réservée pour les adultes, entrez votre année de naissance </label>
        <select name="birthday" class="form-control">
            <?php for ($i = 2010; $i > 1919; $i--): ?>
            <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Envoyer</button>
    <!-- $_POST['birthday'] -->
</form>
<?php endif ?>

<?php require 'elements/footer.php'; ?>
 