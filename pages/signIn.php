<?php

require_once('../config/config.php');
require_once('../functions/setFooter.php');
require_once('../functions/setHead.php');

session_start();

if (isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] == true) {
  header('Location:' . PAGES_PATH . '/main.php');
  die();
}

setHead("Autenticação", "Pagina para o usuário se autenticar");
?>

<div class="Container">
  <div class="SignIn">
    <h1>Autenticação</h1>
    <form action="<?php echo PAGES_PATH . '/processAllForms.php' ?>" method="post">
      <label for="username"> Usuário: </label>
      <input type="text" name="username" id="username">
      <label for="password"> Senha: </label>
      <input type="password" name="password" id="password">
      <input type="hidden" name="action" value="LOGIN">
      <input type="submit" value="Enviar">
    </form>
    <a href="<?php echo PAGES_PATH . '/signUp.php' ?>">Criar conta</a>
  </div>
</div>


<?php setFooter(); ?>