<div class="Nav">
  <div class="Pages">
    <a href="<?php echo PAGES_PATH . '/main.php'; ?>">HOME</a>
    <a href="<?php echo PAGES_PATH . '/insert.php'; ?>">CADASTRO</a>
    <a href="<?php echo PAGES_PATH . '/list.php'; ?>">LISTA</a>
    <!-- <a href="<?php echo PAGES_PATH . '/updateAndDelete.php'; ?>"></a> -->
  </div>
  <div class="Logout">
    <form action=<?php echo PAGES_PATH . '/processAllForms.php' ?> method="post">
      <input type="hidden" name="action" value="LOGOUT">
      <button>SAIR</button>
    </form>
  </div>
</div>