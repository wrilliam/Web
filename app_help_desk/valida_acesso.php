<?php
  session_start();

  if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado'] != 'TRUE')) {
    header('Location: index.php?login=logout');
  }
?>