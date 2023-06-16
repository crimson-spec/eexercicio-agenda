<?php

require_once('../functions/verifySession.php');
require_once('../functions/setFooter.php');
require_once('../functions/setHead.php');

setHead("Pagina Principal", "Pagina inicial do usuário");

require_once('../layout/menu.php');

$last_login = "";
$last_logout = "";

if (isset($_COOKIE[$_SESSION['user']['id']])) {
  $user_cookie = json_decode($_COOKIE[$_SESSION['user']['id']], true);
  $last_login = $user_cookie['last_login'];
  $last_logout = $user_cookie['last_logout'];
}
?>

<div class="Main">
  <div class="Greeting">
    <p class="Title">Bem-Vindo</p>
    <p class="Subtitle"><?php echo $_SESSION["user"]['full_name']; ?></p>
    <p class="LastLogin">Último login realizado em: <?php echo $last_login; ?></p>
    <p class="LastLogout">Último logout realizado em: <?php echo $last_logout; ?></p>

  </div>
</div>


<?php setFooter(); ?>