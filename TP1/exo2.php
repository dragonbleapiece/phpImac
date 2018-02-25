<!DOCTYPE html>
<html>
  <head>
    <meta charset= "utf-8" />
    <title> Hello World en PHP </title>
  </head>
  <body>
    <?php
      $prenom = "José";
      $nom = "Bové";
      $ville = "Une Ville";
      $age = "0.5";
      $s = ($age > 1) ? "s" : "";
      echo "<p> Alors bonjour je m'appelle $prenom $nom. Tout en sachant que $nom c'est mon nom. J'habite sur $ville et j'ai $age an$s !</p>";

      $personne = array('prenom' => 'Ryker', 'nom' => 'Mickael', 'age' => 21, 'ville' => 'Ravin-Sur-Rive');

      var_dump($personne);

      $prenom = $personne['prenom'];
      $nom = $personne['nom'];
      $ville = $personne['ville'];
      $age = $personne['age'];
      $s = ($age > 1) ? "s" : "";

      echo "<p> Alors bonjour je m'appelle $prenom $nom. Tout en sachant que $nom c'est mon nom. J'habite sur $ville et j'ai $age an$s !</p>";

      $week = ["Lundi" , "Mardi" , "Mercredi" , "Jeudimac" , "Vendredi" , "Samedi" , "Dimanche" ];

      for($i = 0; $i < count($week); ++$i) {
        echo "{$week[$i]} ";
      }

      $personnes = array(
        array(
          'prenom' => 'Riri',
          'nom' => 'Duck',
          'age' => 10,
          'ville' => 'Ravin-Sur-Rive'
        ),
        array(
          'prenom' => 'Fifi',
          'nom' => 'Duck',
          'age' => 10,
          'ville' => 'Ravin-Sur-Rive'
        ),
        array(
          'prenom' => 'Loulou',
          'nom' => 'Duck',
          'age' => 10,
          'ville' => 'Ravin-Sur-Rive'
        )
      );

      if(count($personnes) > 0) {
        echo "<ul>";
        foreach($personnes as $personne) {
          $prenom = $personne['prenom'];
          $nom = $personne['nom'];
          $ville = $personne['ville'];
          $age = $personne['age'];
          $s = ($age > 1) ? "s" : "";

          echo "<li> Prenom, nom : $prenom $nom. Tout en sachant que $nom c'est le nom. Habite sur $ville. A $age an$s. Recherché pour un vol de bonbon.</li>";
        }
        echo "</ul>";
      } else {
        echo "Aucune personne recherchée...<br>";
      }

    ?>
  </body>
</html>
