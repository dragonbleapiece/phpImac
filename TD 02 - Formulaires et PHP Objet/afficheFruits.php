<?php
  if(isset($_POST["submit"]) && !empty($_POST["fruits"])) {
    echo "J'adore ";
    $fruits = $_POST["fruits"];
    for($i = 0; $i < count($fruits); ++$i) {
      if($i < count($fruits) - 2 ) {
        echo "les {$fruits[$i]}, ";
      } else if($i < count($fruits) - 1 ) {
        echo "les {$fruits[$i]} et ";
      } else {
        echo "les {$fruits[$i]}.";
      }
    }
  } else {
    echo "Je n'aime pas les fruits ! \(èoé)/";
  }
?>
