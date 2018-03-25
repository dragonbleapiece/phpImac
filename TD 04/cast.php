<h1>Cast</h1>
<?php
  require_once "Cast.class.php";
  require_once "Movie.class.php";

  if(isset($_GET['id'])) {
    try {
      $cast = Cast::createFromId($_GET['id']);
      $cast->renderHTML();
      echo "<h2>Movies as Director</h2>";
      $movies = Movie::getFromDirectorId($_GET['id']);
      foreach($movies as $movie) {
        echo "<p><a href='movie.php?id={$movie->getId()}'>{$movie->getTitle()} ({$movie->getReleaseDate()})</a></p>";
      }

      echo "<h2>Movies as Actor</h2>";
      $movies = Movie::getFromActorId($_GET['id']);
      foreach($movies as $movie) {
        echo "<p><a href='movie.php?id={$movie->getId()}'>{$movie->getTitle()} ({$movie->getReleaseDate()})</a></p>";
      }

    } catch(Exception $e) {
      echo $e->getMessage();
    }
  } else {
    try {
      $casts = Cast::getAll();
      $ul = "<ul>";
      foreach($casts as $cast) {
        $ul .= "<li><a href='cast.php?id={$cast->getId()}'>{$cast->getFirstname()} {$cast->getLastname()}</a></li>";
      }
      $ul .= "</ul>";

      echo $ul;
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }

 ?>
