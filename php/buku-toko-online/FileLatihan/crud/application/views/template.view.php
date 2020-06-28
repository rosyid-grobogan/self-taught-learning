<!doctype html>
<html>
   <head>
      <title>Contoh CRUD</title>
      <link rel="stylesheet" type="text/css" href="<?= BASE_PATH ?>/public/bootstrap/css/bootstrap.min.css"> 
   </head>
   <body>
      <div class="container">

<?php
   $view = new View($viewName);
   $view->bind('data', $data);
   $view->render();
?>

      </div>
   </body>
</html>
