<?php

require_once('../functions/verifySession.php');
require_once('../functions/setFooter.php');
require_once('../functions/setHead.php');

setHead("Cadastrar", "Pagina de cadastro de contatos");

require_once('../layout/menu.php');
?>

<div class="Container">
  <div class="Insert">
    <h1>Cadastro</h1>
    <form action=<?php echo PAGES_PATH . '/processAllForms.php' ?> method="post">
      <label for="name"> Nome: </label>
      <input type="text" name="name" id="name">
      <label for="phone"> Telefone: </label>
      <input type="number" name="phone" id="phone" maxlength="20">
      <input type="hidden" name="action" value="POST">
      <input type="submit" value="Enviar">
    </form>
  </div>
</div>


<?php setFooter(); ?>