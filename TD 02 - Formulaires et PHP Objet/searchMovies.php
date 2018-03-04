<?php
  function searchMovies($array, $movies) {
    $tab = array();
    $bool = FALSE;
    if(!empty($array['date1'])) $date1 = new DateTime($array['date1']);
    if(!empty($array['date2'])) $date2 = new DateTime($array['date2']);
    foreach($movies as $movie) {
      $bool = FALSE;
      foreach($movie as $key => $val) {
        if($key == "releaseDate") {
          $date = new DateTime($val);
          if((!empty($date1) && empty($date2) && $date1 <= $date)
            || (empty($date1) && !empty($date2) && $date2 >= $date)
            || (!empty($date1) && !empty($date2) && $date1 <= $date && $date2 >= $date)) {
            $bool = TRUE;
          }
        } else
        if($key == "genre" && !empty($array['genres'])) {
          foreach($array['genres'] as $genre) {
            if($genre == $val) {
              $bool = TRUE;
              break;
            }
            $bool = FALSE;
          }
        } else
        if(!empty($array[$key])) {
          $bool = strpos($val, $array[$key]);
        }

      }

      if($bool !== FALSE) {
        $tab[] = $movie;
      }

    }
    return $tab;
  }

  function render_movie_list($movies) {
    echo "<h1>Movie List</h1>";
    echo "<ul>";
    foreach($movies as $movie) {
      $style['genre'] = ($movie['genre'] == "Science Fiction") ? 'font-weight:bold;' : '';
      echo <<<LI
      <li>{$movie['title']} ({$movie['releaseDate']})
        <ul>
          <li>Genre : <span style={$style['genre']}>{$movie['genre']}<span></li>
          <li>Director: {$movie['director']}</li>
        </ul>
      </li>
LI;
    }
    echo "</ul>";
  }
 ?>
