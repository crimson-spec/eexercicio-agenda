<?php

function login($user)
{
  if (!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] == false) {
    $_SESSION["is_logged"] = true;
    $_SESSION["user"] = $user;
    return true;
  }
  return false;
}
