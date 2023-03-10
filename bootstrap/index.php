<?php

$error = null;
$success = null;
$email = null;
$name = null;
$message = null;

/* var_dump(empty($_POST['name']));
var_dump(empty($_POST['message']));
var_dump(isset($_POST['name']));
var_dump(isset($_POST['message'])); */

// Quand le site est chargé isset renvoie false
// si les champs ne sont par renseignés isset renvoie true
if (isset($_POST['name'], $_POST['message'])) {
    if (strlen($_POST['name']) < 1) {
        $error = 'Attention! Le nom enregistré dans le formulaire est trop court <br>';
    }
    if (strlen($_POST['name']) > 100) {
        $error = 'Attention! Le nom enregistré dans le formulaire est trop long <br>';
    }
    if (strlen($_POST['message']) < 1) {
        $error .= 'Merci de renseigner un message plus détaillé.';
    }
    if (strlen($_POST['message']) > 500) {
        $error .= 'Merci de renseigner un message plus court.';
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error .= 'L\'email renseigné semble invalide!';
    }
}

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $email   = $_POST['email'];
    $name    = $_POST['name'];
    $message = $_POST['message'];
    if (!$error) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'contact' . DIRECTORY_SEPARATOR . 'contacts';
        $encoded_message = json_encode ([
            'email'     => $email,
            'name'      => $name,
            'message'   => $message
        ]);
        file_put_contents($file, $encoded_message . PHP_EOL, FILE_APPEND);
        $success = "Votre message a bien été envoyé !";
        $email = null;
        $name = null;
        $message = null;
        $_POST = [];
    }
}

require 'elements/nav.php' ?>

<header>
    <!-- SHOW ERROR MESSAGE IF EMAIL INVALID -->
    <?php if ($error) : ?>
        <!-- if error different than null, if email is invalid in filter_var-->
        <div class="alert-danger">
            <?= $error ?>
        </div>
    <?php endif ?>

    <!-- SHOW MESSAGE IF EMAIL VALID  -->
    <?php if ($success) : ?>
        <!-- if error different than null, if email is invalid in filter_var-->
        <div class="alert-success">
            <?= $success ?>
        </div>
    <?php endif ?>

    <div class="headshot-wrapper">
        <img class="headshot" src="assets/petite%20photo%20v2.png" alt="profile image">
        <h1>Développeur Junior Full Stack</h1>
    </div>
</header>

<section class="services">
    <div class="container">
        <div class="media-object">
            <div class="icon-left">
                <img class="icon" src="assets/logos/html5.svg" alt="graph chart">
                <img class="icon" src="assets/logos/css3.svg" alt="graph chart">
                <img class="icon" src="assets/logos/javascript.svg" alt="graph chart">
            </div>
            <div class="blurb-wrapper-right">
                <h3 class="blurb-header">Les fondamentaux</h3>
                <div class="blurb-info">
                    <p>Je suis à l'aise avec les fondamentaux du développement web, ainsi qu'avec les modèles de disposition unidimensionnel (FLEXBOX) et bidimensionnel (GRID).</p>
                </div>
            </div>
        </div>
        <div class="media-object four_icons">
            <div class="icon-right">
                <img class="icon" src="assets/logos/bootstrap.svg" alt="graph chart">
                <img class="icon" src="assets/logos/sass.svg" alt="graph chart">
                <img class="icon" src="assets/logos/jquery.svg" alt="graph chart">
                <img class="icon" src="assets/logos/wordpress.svg" alt="graph chart">
            </div>
            <div class="blurb-wrapper-left">
                <h3 class="blurb-header">Les pratiques</h3>
                <div class="blurb-info">
                    <p>Frameworks, librairies et préprocesseurs, tellement d'outils pour simplifier la vie dure d'un développeur. Il y en a énormément, mais je préfère pour le moment ces trois champions, avec une envie d'apprendre bientôt le PUG (moteur de templates).</p>
                </div>
            </div>
        </div>
        <div class="media-object">
            <div class="icon-left">
                <img class="icon" src="assets/logos/php.svg" alt="graph chart">
                <img class="icon" src="assets/logos/mysql.png" alt="graph chart">
                <img class="icon" src="assets/logos/symfony.svg" alt="graph chart">
            </div>
            <div class="blurb-wrapper-right">
                <h3 class="blurb-header">Le backend </h3>
                <div class="blurb-info">
                    <p>PHP et le framework Symfony sont particulièrement adaptés pour la création des sites web en Back-End et comme SGBD j'ai choisi à me spécialiser en MySQL.</p>
                </div>
            </div>
        </div>
        <div class="media-object">
            <div class="icon-right">
                <div class="icon icon-subcontainer">
                    <img class="icon icon-adjust" src="assets/logos/GitHub.svg" alt="graph chart">
                    <img class="icon icon-adjust" src="assets/logos/seo.png" alt="graph chart">
                </div>
                <img class="icon" src="assets/logos/Photoshop.png" alt="graph chart">
                <img class="icon" src="assets/logos/scrum.jpg" alt="graph chart">
            </div>
            <div class="blurb-wrapper-left">
                <h3 class="blurb-header">Autres outils</h3>
                <div class="blurb-info">
                    <p>Sans ceux-là on ne peut être complets. </p>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="portfolio">
    <!------------------------- FRONT ------------------------->
    <div class="container">
        <div class="section-header" id="front_end">
            <h1 class="header">Exemples Front-End</h1>
        </div>
        <div class="portfolio-wrapper">
            <div class="portfolio-object">
                <a href="bootstrap/index.html"><img src="assets/bootstrap_projet.PNG" class="portfolio-box"></img></a>
                <h4>Projet Bootstrap</h4>
                <div class="portfolio-text">Responsive design avec le framework Bootstrap</div>
            </div>
            <div class="portfolio-object">
                <a href="sass/index.html"><img src="assets/sass_projet.PNG" class="portfolio-box"></img></a>
                <h4>Projet SASS</h4>
                <div class="portfolio-text"></div>
            </div>
            <div class="portfolio-object">
                <a href="blog/index.html"><img src="assets/blog_projet.PNG" class="portfolio-box"></img></a>
                <h4>Projet Blog</h4>
                <div class="portfolio-text">Blog clasique en HTML et CSS en responsive design (création GrafikArt)</div>
            </div>
            <div class="portfolio-object">
                <a href="reseau_social/index.html"><img src="assets/reseau_social_projet.PNG" class="portfolio-box"></img></a>
                <h4>Projet Réseau Social</h4>
                <div class="portfolio-text">Esquisse d'un réseau social en HTML + CSS + responsive design (création GrafikArt)</div>
            </div>
        </div>
    </div>
    <!------------------------- BACK ------------------------->
    <div class="container">
        <div class="section-header">
            <h1 class="header">Exemples Back-End</h1>
        </div>
        <div class="portfolio-wrapper">
            <div class="portfolio-object">
                <a href="https://expert-assum.fr"><img src="assets/symfony_projet.png" class="portfolio-box"></img></a>
                <h4>Projet Symfony 4.4</h4>
                <div class="portfolio-text">Projet plateforme produits assurance-vie  </div>
            </div>
            <div class="portfolio-object">
                <a href="http://holovr-prod.com"><img src="assets/holovr.png" class="portfolio-box"></img></a>
                <h4>Projet Wordpress - Stage </h4>
                <div class="portfolio-text">Site vitrine dans le domaine de la réalité virtuelle développé de A-Z pendant mon stage </div>
            </div>
        </div>
    </div>
</section>

<!--------- FORMULAIRE DE CONTACT --------->
<!-- <section class="contact-container">

        <div class="container">
            <div class="section-header">
                <h1>Contact</h1>
            </div>
            <form action="./index.php" method="POST">
                <label for="email">Email</label>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" id="email" required value="<?=htmlentities($_POST['email'] ?? '') ?>">
                </div>
                <label for="name">Nom prénom</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="name" id="name" value="<?=htmlentities($_POST['name'] ?? '') ?>">
                </div>
                 <label for="message">Message</label>
                <div class="form-group">
                    <textarea class="form-control" id="message" name="message" rows="6"><?=htmlentities($_POST['message'] ?? '') ?></textarea>
                </div>
                <div class="quote-btn-wrapper">
                    <button type="submit" class="quote-btn">Envoyer</button>
                </div>
            </form>
        </div>
    </section> -->

<!-------------------- FOOOTER -------------------->

<?php require 'elements/footer.php'?>

<!--#################### SCRIPTS #######################-->
<!--You can download jquery https://code.jquery.com/ or copy the cdn-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>