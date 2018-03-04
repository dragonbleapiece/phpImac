<?php
  require_once("Personne.class.php");
  $personnes[0] = new Personne("michel", "obama", 48, "washington-dici");
  $personnes[1] = new Personne("josé", "bové", 54, "boveland");
  $personnes[2] = new Personne("pierre-henri", "de la bauvière", 21, "boboland");
?>

<!DOCTYPE html>
    <html>
      <head>
        <meta charset= 'utf-8' />
        <title> Personnes </title>
      </head>
      <body>
        <h1>Qui es-tu ?</h1>
        <?php
          foreach($personnes as $personne) {
            $personne->affiche();
            echo "<br>";
          }
        ?>

      </body>
    </html>
