<!DOCTYPE html>
    <html>
      <head>
        <meta charset= 'utf-8' />
        <title> Table </title>
      </head>
      <body>
        <h1>Inscrire nombre pour table</h1>
        <form action="table.php" method="GET">
          <input type="number" name="number" min=0 />
          <input type="submit" name="submit" value="Afficher"/>
        </form>

      </body>
    </html>

<?php

  function afficherTable($n, $ligne) {
    echo "<table>";
    for($i = 1; $i <= $ligne; ++$i) {
      echo "<tr><td>$n * $i</td><td>" . $n * $i . "</td></tr>";
    }
    echo "</table>";
  }

  if(isset($_GET["submit"]) && !empty($_GET["number"])) {
    afficherTable($_GET["number"], 10);
  }


 ?>
