<?php 
/* phpinfo();
die(); */
require_once 'class/Message.php';
require_once 'class/GuestBook.php';
$errors = null;
$success = null;
$guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages');
if (isset($_POST['username'], $_POST['message'])) {
    $message = new Message($_POST['username'],$_POST['message']);
    if ($message->isValid()) {
        $guestbook -> addMessage($message);
        $success = true;
        $_POST = []; // vider les informations dans le formulaire si le formulaire est valide
    } else {
        $errors = $message -> getErrors();
    }
}
$messages = $guestbook->getMessages();
$title = "Livre d'or";
require '../php/elements/header.php'
?>

<div class="container">
    <h1>Livre d'or</h1>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            Formulaire invalid!
        </div>
    <?php endif ?>

    <?php if ($success) :?>
        <div class="alert alert-success">
            Merci pour votre message!
        </div>
    <?php endif ?>

    <form action="" method="POST">
        <div class="form-group">
            <input value="<?= htmlentities($_POST['username'] ?? '')?>" type="text" name="username" placeholder="Votre pseudo" class="form-control <?= isset($errors['username']) ? 'is-invalid' : ''?>">
            <?php if (isset($errors['username'])) : ?>
            <div class="invalid-feedback"><?= $errors['username'] ?></div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <textarea name="message" placeholder="Votre message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : ''?>"><?= htmlentities($_POST['message'] ?? '')?></textarea>
            <?php if (isset($errors['message'])) : ?>
            <div class="invalid-feedback"><?= $errors['message'] ?></div>
            <?php endif ?>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>

    <!-------------------- AFFICHER LES MESSAGES -------------------->

    <?php if (!empty($messages)) : ?>
        <h1 class="mt-4">Vos messages </h1>
        <?php foreach($messages as $message) : ?>
            <?= $message->toHTML() ?>
        <?php endforeach ?>
    <?php endif ?>
    
</div>


<?php require '../php/elements/footer.php' ?>