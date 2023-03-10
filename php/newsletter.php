<?php 
$error = null;
$success = null;
$email = null;
if(!empty($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        // if condition different than false => do next
        // filter_var returns the filtered data or false
        $success = "Votre email a bien été enregistré !";
        $email = null;
    } else {
        $error = "Email invalide!" ;
    }
}

require 'elements/header.php'; 
?>

<h1>S'inscrire à la newsletter</h1>
<p>
    Une exemple de newsletter avec enregistrement dans la base de données <br><hr>
</p>

<!-- SHOW ERROR MESSAGE IF EMAIL INVALID -->
<?php if ($error) : ?>
<!-- if error different than null, if email is invalid in filter_var-->
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif; ?>

<!-- SHOW MESSAGE IF EMAIL VALID  -->
<?php if ($success) : ?>
<!-- if error different than null, if email is invalid in filter_var-->
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif; ?>

<form action="./newsletter.php" class="form-inline" method="POST">
    <div class="form-group">
        <input type="email" name="email" placeholder="Entrez votre email" required class="form-control" value="<?= htmlentities($email) ?>">
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

<?php require 'elements/footer.php'; ?>