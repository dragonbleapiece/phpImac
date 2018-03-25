<?php
  require_once 'Genre.class.php';
  require_once 'Country.class.php';
 ?>
<!DOCTYPE html>
    <html>
      <head>
        <meta charset= 'utf-8' />
        <title> Recherche </title>
      </head>
      <body>
        <h1>Rechercher un film</h1>
        <form action="movie.php" method="POST">
          <label for="title">Titre :</label><input id="title" name="title" type="text" /><br/>
          <label for="genre">Genre :
            <ul>
              <?php
              $genres = Genre::getAll();
              foreach($genres as $genre) {
                echo "<li><input type='checkbox' name='genres[]' value={$genre->getName()}>{$genre->getName()}</li>";
              }
               ?>
            </ul></label>
            <label for="country">Country :
              <select name="country" id="country">
                <?php
                $countries = Country::getAll();
                echo "<option value=0>None</option>";
                foreach($countries as $country) {
                  echo "<option value={$country->getCode()}>{$country->getName()}</option>";
                }
                 ?>
              </select></label>
          <label for="date1">De :</label><input id="date1" name="date1" type="date" />
          <label for="date2">À :</label><input id="date2" name="date2" type="date" /><br/>
          <label for="cast">Cast :</label><input id="cast" name="cast" type="text" /><br/>
          <input type="submit" name="submit" value="Rechercher"/>
        </form>

      </body>
    </html>
