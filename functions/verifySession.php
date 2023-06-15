<?php

require_once('../config/config.php');

session_start();

if (!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] == false) {
  header('Location:' . PAGES_PATH . '/signIn.php');
  die();
}
