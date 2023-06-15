<?php
require_once('../functions/verifySession.php');
require_once('../config/config.php');
require_once('../functions/setFooter.php');
require_once('../functions/setHead.php');
require_once('../functions/showAlert.php');
require_once("../dao/AgendaDAO.php");

setHead("Consultar", "Pagina de consulta de contatos");

require_once('../layout/menu.php');

$data = [];
if (isset($_GET["id"])) {
  $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

  try {
    $dao = new AgendaDAO();
    $contact = $dao->find($id);

    if ($contact == null) {
      showAlert("Nenhum resultado encontrado!");
    } else {
      $data = $contact;
    }
  } catch (Exception $exception) {
    showAlert($exception->getMessage());
  }
}

// $data = [
//   ['id' => '1', 'name' => 'Matheus', 'phone' => '123456'],
//   ['id' => '2', 'name' => 'Lucas', 'phone' => '123456'],
//   ['id' => '3', 'name' => 'Carlos', 'phone' => '123456']
// ];
?>

<div class="Container">
  <div class="Find">
    <h1>Consultar</h1>
    <div class="Search">
      <form method="get">
        <label for="id"> ID: </label>
        <input type="number" name="id" id="id" min="1">
        <input type="submit" value="Consultar">
      </form>
    </div>
    <h1>Resultado</h1>
    <div class="Result">
      <?php
      if (count($data) > 0) {
        $html = "<table>\n";
        $html .= "<tr>\n";
        $html .= "<th>ID</th>\n";
        $html .= "<th>Nome</th>\n";
        $html .= "<th>Telefone</th>\n";
        $html .= "</tr>\n";

        // foreach ($data as $key => $value) {
        //   $html .= "<tr>\n";
        //   $html .= "<td>{$value['id']}</td>\n";
        //   $html .= "<td>{$value['name']}</td>\n";
        //   $html .= "<td>{$value['phone']}</td>\n";
        //   $html .= "</tr>\n";
        // }

        $html .= "<tr>\n";
        $html .= "<td>{$data['id']}</td>\n";
        $html .= "<td>{$data['name']}</td>\n";
        $html .= "<td>{$data['phone']}</td>\n";
        $html .= "</tr>\n";

        $html .= "</table>\n";
        echo $html;
      }
      ?>
    </div>
  </div>
</div>


<?php setFooter(); ?>