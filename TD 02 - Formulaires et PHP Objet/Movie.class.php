<?php
class Movie {
  private $id;
  private $title;
  private $releaseDate;
  private $director;
  private $genre;

  public function __construct($array) {
    if(empty($array))
      throw new Exception("Paramètre invalide");
    foreach($array as $key => $val) {
      $this->set($key, $val);
    }
    if(empty($this))
      throw new Exception("Objet construit non rempli");
  }

  public function renderHTML() {
      echo <<<MOVIE
      <h1>{$this->get('title')} ({$this->get('releaseDate')})</h1>
        <ul>
          <li>Genre : <span>{$this->get('genre')}<span></li>
          <li>Director: {$this->get('director')}</li>
        </ul>
MOVIE;
  }

  private function set($att, $val) {
    if($att == "date")
      try {
        new DateTime($val);
      } catch(Exception $e) {
        return;
      }
    if($att == "id" && !is_numeric($val))
    return;
    $this->$att = $val;
  }

  public function get($att) {
    return $this->$att;
  }

}

?>
