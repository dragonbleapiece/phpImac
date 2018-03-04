<h1>Fiche de film</h1>
<?php
  require_once("Movie.class.php");
  require_once("data.movies.php");

  function findById($movies, $id) {
    $find = null;
    foreach($movies as $movie) {
      if($movie['id'] == $id) {
        $find = $movie;
        break;
      }
    }

    return $find;
  }

  if(isset($_GET['id'])) {
    try {
      $movie = new Movie(findById($movies, $_GET['id']));
      $movie->renderHTML();
    } catch(Exception $e) {
      echo "Id introuvable.";
    }
  }

 ?>
