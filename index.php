<?php
error_reporting(E_ALL); 

require 'classes/controller.class.php'; // database configuration load
$controller = new Controller;

?><!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <title>BS23 E-commerce</title>
  </head>
  <body>

    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BS23 E-commerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] ?>?page=task_1">Task 1 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] ?>?page=task_2">Task 2 </a>
            </li> 
          </ul> 
        </div>
      </nav>

 
        <?php 
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'task_1':
                        require './pages/task_1.php';
                        break;
                    case 'task_2':
                        require './pages/task_2.php';
                        break;  

                    default: 
                        require './pages/task_1.php';
                    break;
                } 
            } else {
              require './pages/task_1.php';
            }
        ?> 
    </div>


    <!-- Optional JavaScript -->
    <script src="assets/js/jquery-3.4.1.min.js" ></script>
    <script src="assets/js/bootstrap.min.js" ></script> 
  </body>
</html>