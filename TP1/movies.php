<?php

  require_once("data.movies.php");

  function render_movie_list($movies) {
    echo "<h1>Movie List</h1>";
    echo "<ul>";
    foreach($movies as $movie) {
      $style['li'] = ($movie['year'] + 10 < date("Y")) ? 'color:red;' : '';
      $style['genre'] = ($movie['genre'] == "Science Fiction") ? 'font-weight:bold;' : '';
      echo <<<LI
      <li style={$style['li']}>{$movie['title']} ({$movie['year']})
        <ul>
          <li>Genre : <span style={$style['genre']}>{$movie['genre']}<span></li>
          <li>Director: {$movie['director']}</li>
        </ul>
      </li>
LI;
    }
    echo "</ul>";
  }

  render_movie_list($movies);
 ?>
