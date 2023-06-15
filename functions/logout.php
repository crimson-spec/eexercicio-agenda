<?php

function logout()
{
  if (isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] == true) {
    session_destroy();
  }
}
