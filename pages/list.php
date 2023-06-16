<?php
require_once('../functions/verifySession.php');
require_once('../functions/setFooter.php');
require_once('../functions/setHead.php');
require_once('../functions/showAlert.php');

require_once("../dao/AgendaDAO.php");

setHead("Contatos", "Pagina para listar todos os contatos");

require_once('../layout/menu.php');

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  try {
    $dao = new AgendaDAO();
    $rowsAffected = $dao->delete($id);
    if ($rowsAffected === 0) throw new Exception('Erro ao deletar esse registro!');
    showAlert("[$id] Deletado com sucesso");
  } catch (Exception $exception) {
    showAlert($exception->getMessage());
  }
}

try {
  $data = [];
  $dao = new AgendaDAO();
  $contact = null;

  if (isset($_GET["key"]) && isset($_GET["value"])) {
    if (empty($_GET["key"]) || empty($_GET["value"])) {
      header("refresh:0.1;url=" . PAGES_PATH . '/list.php');
      die();
    }

    $key = filter_input(INPUT_GET, "key", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $value = filter_input(INPUT_GET, "value", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $contact = $dao->find($key, $value);
  } else {
    $contact = $dao->getAll();
  }

  if ($contact == null) {
    showAlert("Nenhum resultado encontrado!");
  } else {
    $data = $contact;
  }
} catch (Exception $exception) {
  showAlert($exception->getMessage());
}
?>

<div class="Container Contacts">
    <div class="Content">
        <h1>Contatos</h1>
        <div class="Actions">
            <div class="Search">
                <form method="get">
                    <select id="key" name="key">
                        <option value=""></option>
                        <option value="name">Nome</option>
                        <option value="phone">Telefone</option>
                    </select>
                    <input type="text" name="value" id="value">
                    <!-- <input type="submit" value="Consultar"> -->
                    <button class="IconButton">
                        <span class='material-icons'>
                            search
                        </span>
                    </button>
                </form>
            </div>
            <div class="Create">
                <form action="<?php echo PAGES_PATH . '/insert.php' ?>" method="post">
                    <button class="IconButton tooltip">
                        <span class="material-icons">
                            add_circle_outline
                        </span>
                        <p class="tooltiptext">Criar contato</p>
                    </button>
                </form>
            </div>
        </div>
        <div class="List">
            <?php
      $html = "<table>\n";
      $html .= "<tr>\n";
      $html .= "<th>ID</th>\n";
      $html .= "<th>Nome</th>\n";
      $html .= "<th>Telefone</th>\n";
      $html .= "<th>Ações</th>\n";
      $html .= "</tr>\n";

      foreach ($data as $key => $value) {
        $html .= "<tr>\n";
        $html .= "<td>{$value['id']}</td>\n";
        $html .= "<td>{$value['name']}</td>\n";
        $html .= "<td>{$value['phone']}</td>\n";
        $html .= "<td>
                    <div>
                      <form action='" . PAGES_PATH . '/update.php' . "' method='get'>
                        <input type='hidden' name='id' value='" . $value['id'] . "'>
                        <button>
                          <span class='material-icons BtnEdit'>
                            edit
                          </span>
                        </button>
                      </form>
                      <form method='post'>
                        <input type='hidden' name='id' value='" . $value['id'] . "'>
                        <button>
                          <span class='material-icons BtnDelete'>
                          delete
                          </span>
                        </button>
                      </form>
                    </div>
                  </td>\n";
        $html .= "</tr>\n";
      }

      $html .= "</table>\n";
      echo $html;
      ?>
        </div>
    </div>
</div>


<?php setFooter(); ?>