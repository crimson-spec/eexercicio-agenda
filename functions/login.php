<?php

function login($user)
{
  if (!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] == false) {
    $_SESSION["is_logged"] = true;
    $_SESSION["user"] = $user;
    date_default_timezone_set('America/Sao_Paulo');

    if (isset($_COOKIE[$user['id']])) {
      $user_cookie = json_decode($_COOKIE[$user['id']], true);
      $user_cookie['last_login'] = date("d/m/Y h:i:sa");
      setcookie($user['id'], json_encode($user_cookie));
    } else {
      $user_cookie = [
        'last_login' => date("d/m/Y h:i:sa")
      ];
      setcookie($user['id'], json_encode($user_cookie));
    }

    return true;
  }
  return false;
}
