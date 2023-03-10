<?php
/* Pour accéder à la page dashbord il faut passer par la page de login */
$erreur = null;
$password ='$2y$14$RMk6cDFPvrCnPC2QL1IH..8GQfrVNpQZ6.2C6I9qoRIgWwGTsN7pK'; // Doe
if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
    if ($_POST['pseudo'] === 'John' && password_verify($_POST['motdepasse'],$password)) {
        // si les bonnes informations sont introduits on connecte l'utilisateur
        // on active la session et on affecte la valeur "1" à la clé "connecte"s
        session_start();
        $_SESSION['connecte'] = 1;
        // la clé n'a plus la valeur "null" donc la fonction est_connecte() renvoie TRUE et permet de visualiser la page dashbord
        // mais il faut rediriger vers la page dashbord.php pour ré exécuter la fonction
        header('Location: ./dashbord.php');
    } else {
        $erreur = "Identifiants incorrects";
    }
}

// si l'utilisateur essaie de revenir sur la page login.php, il faut le rediriger vers dashbord
require_once 'functions/auth.php';
if (est_connecte()) {
    header ("Location: ./dashbord.php");
    exit();
}

require_once 'elements/header.php' 
?>

<?php if($erreur) : ?>
    <div class="alert alert-danger"><?=$erreur?></div>
<?php endif ?>

<!------------------------------------- FORMULAIRE --------------------------------------->
<!-- Au clic les valeurs de pseudo et motdepasse sont enregistrées dans la variable globale $_POST -->
<h3>Espace admin pour vérifier le nombre de visites sur le site.</h3>
<hr>
<h6>Admin : John</h6>
<h6>Mot de passe : Doe</h6>
<form action="" method="POST">
    <div class="form-group">
        <input class="form-control" type="text" name="pseudo" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="motdepasse" placeholder="Votre mot de passe">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require 'elements/footer.php'?>