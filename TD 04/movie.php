<h1>Movie</h1>
<?php
  require_once "Movie.class.php";
  require_once "Cast.class.php";

  if(isset($_GET['id'])) {
    try {
      $movie = Movie::createFromId($_GET['id']);
      $movie->renderHTML();

      echo "<h2>Directors</h2>";
        $casts = Cast::getDirectorsFromMovieId($_GET['id']);
        foreach($casts as $cast) {
          echo "<p><a href='cast.php?id={$cast->getId()}'>{$cast->getFirstname()} {$cast->getLastname()}</a></p>";
        }

        echo "<h2>Actors</h2>";
          $casts = Cast::getActorsFromMovieId($_GET['id']);
          foreach($casts as $cast) {
            echo "<p><a href='cast.php?id={$cast->getId()}'>{$cast->getFirstname()} {$cast->getLastname()}</a> : {$cast->name}</p>";
          }

    } catch(Exception $e) {
      echo $e->getMessage();
    }
  } else if(isset($_POST)) {

    try {
      $movies = Movie::getFromPost($_POST);

      $ul = "<ul>";
      foreach($movies as $movie) {
        $ul .= "<li><a href='movie.php?id={$movie->getId()}'>{$movie->getTitle()}</a></li>";
      }
      $ul .= "</ul>";

      echo $ul;
    } catch(Exception $e) {
      echo $e->getMessage();
    }


  } else {
    try {
      $movies = Movie::getAll();
      $ul = "<ul>";
      foreach($movies as $movie) {
        $ul .= "<li><a href='movie.php?id={$movie->getId()}'>{$movie->getTitle()}</a></li>";
      }
      $ul .= "</ul>";

      echo $ul;
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }

 ?>
