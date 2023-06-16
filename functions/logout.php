<?php

function logout()
{
  if (isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] == true) {
    date_default_timezone_set('America/Sao_Paulo');
    $user = $_SESSION["user"];
    $user_cookie = json_decode($_COOKIE[$user['id']], true);
    $user_cookie['last_logout'] =  date("d/m/Y h:i:sa");
    setcookie($user['id'], json_encode($user_cookie));
    session_destroy();
  }
}
