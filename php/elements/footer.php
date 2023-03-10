</main><!-- /.container -->
<!-- SAME LOGIC AS FOOTER.PHP BUT USING CLASSES -->
<footer>
<hr>
<div class="row">
     <div class="col-md-4">
          <?php
          require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Compteur.php';
          $compteur = new Compteur(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur');
          $compteur -> incrementer();
          $vues = $compteur->recuperer();
          ?>
          Il y a <?= $vues ?> visite<?php if($vues > 1): ?>s<?php endif ?> sur le site;
     </div>
     <div class="col-md-4">
     <form action="./newsletter.php" class="form-inline" method="POST">
          <div class="form-group">
               <input type="email" name="email" placeholder="Entrez votre email" required class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">S'inscrire</button>
     </form>
     </div>
     <div class="col-md-4">
          <h5>Navigation</h5>
          <ul class="list-unstyled text-small ">
               <?= nav_menu(); ?>
          </ul>
     </div>
</div>
</footer>

<!-- Bootstrap core JavaScript copied from bootstrap site -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- POPPER.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- JAVASCRIPT PLUGIN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>