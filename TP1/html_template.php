<?php
function generate_html_page($texte, $titre) {
  echo <<<HTML
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset= 'utf-8' />
        <title> $titre en PHP </title>
      </head>
      <body>
        <h1>$texte</h1>

      </body>
    </html>
HTML;
}
?>
