<?php

function redirect($path) {

  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
      $protocol = 'https';
  } else {
      $protocol = 'http';
  }

  //header("http://localhost:8080//article.php?id=$id");
  header("Location:" . $protocol . "://" . $_SERVER['HTTP_HOST'] . $path);
  exit;
}
