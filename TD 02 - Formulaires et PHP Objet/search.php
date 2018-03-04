<?php
  require_once("data.movies.php");
?>
<!DOCTYPE html>
    <html>
      <head>
        <meta charset= 'utf-8' />
        <title> Fruits </title>
      </head>
      <body>
        <h1>Regardez 5 films et légumes par jour !</h1>
        <form action="movies.php" method="GET">
          <label for="title">Titre :</label><input id="title" name="title" type="text" /><br/>
          <label for="genre">Genre :
            <ul>
              <?php
              foreach($genres as $genre) {
                echo "<li><input type='checkbox' name='genres[]' value=$genre>$genre</li>";
              }
               ?>
            </ul></label>
          <label for="date1">De :</label><input id="date1" name="date1" type="date" />
          <label for="date2">À :</label><input id="date2" name="date2" type="date" /><br/>
          <label for="director">Réalisateur :</label><input id="director" name="director" type="text" /><br/>
          <input type="submit" name="submit" value="Rechercher"/>
        </form>

      </body>
    </html>
