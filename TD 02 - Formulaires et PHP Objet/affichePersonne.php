<?php
  require_once("Personne.class.php");
  if(isset($_POST["submit"]) && !empty($_POST) && is_integer($_POST["age"])) {
    $personne = new Personne($_POST['prenom'], $_POST['nom'], $_POST['age'], $_POST['ville']);

    $personne->affiche();
  } else {
    echo "Erreur";
  }
 ?>
