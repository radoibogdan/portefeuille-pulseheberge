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

// NAV BAR
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
        <h1>Développeur PHP/Symfony</h1>
    </div>
</header>

<section class="services">
    <div class="container">
        <p class="blurb-info-paragraph">
            > Développeur web expérimenté dans le <strong>Framework Symfony</strong>, je suis habitué à livrer des fonctionnalités aux clients finaux.
            <br>
            > Environnement de travail habituel: Linux, Windows, PhpStorm, GitHub, VM, Filezilla, Photoshop, Trello, Slack, Dropbox
            <br>
            > Pendant ma dernière expérience, j'ai appris à travailler aussi bien en équipe qu'en autonomie, de l'intégration d'email au développement spécifique,
            du brief jusqu’à la livraison.
            <br>
            > Mon alternance m'a permis d'approfondir mon apprentissage de l'organisation en ESN et de la recherche de <strong>solutions adaptées</strong> aux projets.
        </p>
        <div class="media-object">
            <div class="icon-left">
                <img class="icon" src="assets/logos/html5.svg" alt="graph chart">
                <img class="icon" src="assets/logos/css3.svg" alt="graph chart">
                <img class="icon" src="assets/logos/javascript.svg" alt="graph chart">
            </div>
            <div class="blurb-wrapper-right">
                <h3 class="blurb-header">Les fondamentaux</h3>
                <div class="blurb-info">
                    <p>Je suis à l'aise avec les fondamentaux du développement web, ainsi qu'avec les modèles de disposition unidimensionnel (Flex).
                        J'ai connaisance de plusieurs type de frameworks HTML/CSS dont <strong>Bootstrap et Bulma</strong>.</p>
                </div>
            </div>
        </div>
        <div class="media-object four_icons">
            <div class="icon-right">
                <img class="icon" src="assets/logos/react.png" alt="graph chart">
                <img class="icon" src="assets/logos/angular.png" alt="graph chart">
                <img class="icon" src="assets/logos/vue.png" alt="graph chart">
            </div>
            <div class="blurb-wrapper-left">
                <h3 class="blurb-header">Les frameworks JS</h3>
                <div class="blurb-info">
                    <p>
                        Pour mes projets en alternance j'ai dû créer des applications web et mobiles en
                        <strong>Angular</strong> et Ionic(mobile),
                        <strong>ReactJs</strong> et React Native(mobile).
                        J'ai aussi des notions dans <strong>VueJs</strong> et <strong>JQuery</strong>.
                    </p>
                </div>
            </div>
        </div>
        <div class="media-object">
            <div class="icon-left">
                <img class="icon" src="assets/logos/java.png" alt="graph chart">
                <img class="icon image100h" src="assets/logos/Csharp.png" alt="graph chart">
                <img class="icon" src="assets/logos/symfony.svg" alt="graph chart">
            </div>
            <div class="blurb-wrapper-right">
                <h3 class="blurb-header">Le backend et les Api</h3>
                <div class="blurb-info">
                    <p>
                        Spécialement à l'aise sur le framework <strong>Php/Symfony</strong> sur lequel j'ai travaillé pendant les 2 dernièrs années.<br>
                        J'ai pu modifier et créer de fonctionnalités à l'aide de services et commandes.<br>
                        En entreprise, j'ai été ammené à travailler sur des requêtes complexes en <strong>SQL et DQL.</strong><br>
                        Par ailleurs, j'ai plusieurs expériences sur des projets en <strong>API</strong> Rest dont un en <strong>C#</strong>
                        et pour mon projet de fin de diplôme en <strong>Java</strong>.
                    </p>
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
                <a href="https://mediationcmfm.eu/" target="_blank"><img src="assets/cmfm2.JPG" class="portfolio-box"></img></a>
                <h4>Projet CMFM</h4>
                <div class="portfolio-text">Pour un client dans les secteur de la médiation automobile, création du site en Wordpress.</div>
            </div>
            <div class="portfolio-object">
                <a href="https://www.truffaut.com/anti-gaspi.html" target="_blank"><img src="assets/truffaut.JPG" class="portfolio-box"></img></a>
                <h4>Intégrations Truffaut</h4>
                <div class="portfolio-text">Pour le client Truffaut, création de multiples page en Html/CSS</div>
            </div>
            <div class="portfolio-object">
                <a href="blog/index.html" target="_blank"><img src="assets/blog_projet.PNG" class="portfolio-box"></img></a>
                <h4>Projet Blog</h4>
                <div class="portfolio-text">Blog clasique en HTML et CSS en responsive design (création GrafikArt)</div>
            </div>
            <div class="portfolio-object">
                <a href="reseau_social/index.html" target="_blank"><img src="assets/reseau_social_projet.PNG" class="portfolio-box"></img></a>
                <h4>Projet Réseau Social</h4>
                <div class="portfolio-text">Esquisse d'un réseau social en HTML + CSS + responsive design (création GrafikArt)</div>
            </div>
            <div class="portfolio-object">
                <a href="http://holovr-prod.com" target="_blank"><img src="assets/holovr.jpg" class="portfolio-box"></img></a>
                <h4>Projet Wordpress - Stage </h4>
                <div class="portfolio-text">Site vitrine dans le domaine de la réalité virtuelle développé de A-Z pendant mon stage </div>
            </div>
        </div>
    </div>
    <!------------------------- BACK ------------------------->
    <div class="container">
        <div class="section-header">
            <h1 class="header">Exemples Back-End</h1>
            <p class="blurb-info-paragraph">
                La majorité des projets back-end sont sur <a class="lien-github" target="_blank" href="https://github.com/radoibogdan">Github</a> : <br>
                - <a class="lien-github" target="_blank" href="https://github.com/radoibogdan/CSharp-Colomb-Rest" target="_blank">Api Rest en C#</a> <br>
                - <a class="lien-github" target="_blank" href="https://github.com/radoibogdan/Java-colomb-api" target="_blank">Api Rest en Java</a> <br>
                - <a class="lien-github" target="_blank" href="https://github.com/radoibogdan/symfony4-assum" target="_blank">Projet diplôme</a> <br>
            </p>
        </div>
        <div class="portfolio-wrapper">
            <div class="portfolio-object">
                <a href="https://github.com/radoibogdan/symfony4-assum" target="_blank"><img src="assets/symfony_projet.png" class="portfolio-box"></img></a>
                <h4>Projet Symfony 4.4</h4>
                <div class="portfolio-text">Projet plateforme produits assurance-vie disponible sur <a class="lien-github" target="_blank" href="https://github.com/radoibogdan/symfony4-assum">Github</a></div>
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

<?php //require 'php/elements/footer.php'?>

<!--#################### SCRIPTS #######################-->
<!--You can download jquery https://code.jquery.com/ or copy the cdn-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>