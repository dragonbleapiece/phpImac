<?php
  require_once("searchMovies.php");
  require_once("data.movies.php");

  $find = searchMovies($_GET, $movies);

  if(count($find) > 0)
    render_movie_list($find);
  else
    echo "Aucun film trouvé dans notre magnifique et complète base de donnée.";
?>
