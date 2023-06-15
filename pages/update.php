<?php

require_once('../functions/verifySession.php');
require_once('../functions/setFooter.php');
require_once('../functions/setHead.php');
require_once('../functions/showAlert.php');

require_once("../dao/AgendaDAO.php");

setHead("Atualizar", "Pagina para atualização de contatos");

require_once('../layout/menu.php');

$user = null;

try {
  if (!isset($_GET['id']) || empty($_GET['id'])) {
    throw new Exception("ID do contato é inválido!");
  }

  $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

  $dao = new AgendaDAO();
  $contact = $dao->findById($id);

  if ($contact == null) {
    throw new Exception("ID do contato não encontrado!");
  }

  $user = $contact;
} catch (Exception $exception) {
  showAlert($exception->getMessage());
  header("refresh:0.1;url=" . PAGES_PATH . '/list.php');
  die();
}

?>

<div class="Container">
  <div class="Update">
    <h1>Atualizar</h1>
    <form action="<?php echo PAGES_PATH . '/processAllForms.php' ?>" method="post">
      <label for="id"> ID: </label>
      <input type="text" name="id" id="id" value="<?php echo $user['id'] ?>" readonly>
      <label for="name"> Nome: </label>
      <input type="text" name="name" id="name" value="<?php echo $user['name'] ?>" required>
      <label for="phone"> Telefone: </label>
      <input type="number" name="phone" id="phone" maxlength="20" value="<?php echo $user['phone'] ?>" required>
      <input type="hidden" name="action" value="PUT">
      <input type="submit" value="Enviar">
    </form>
  </div>
</div>


<?php setFooter(); ?>