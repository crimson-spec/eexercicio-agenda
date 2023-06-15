<?php

require_once('../functions/verifySession.php');
require_once('../functions/setFooter.php');
require_once('../functions/setHead.php');

setHead("Pagina Principal", "Pagina inicial do usuário");

require_once('../layout/menu.php');
?>

<div class="Main">
  <div class="Greeting">
    <p class="Title">Bem-Vindo</p>
    <p class="Subtitle"><?php echo $_SESSION["user"]['full_name']; ?></p>
  </div>
</div>


<?php setFooter(); ?>