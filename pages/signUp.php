<?php

require_once('../config/config.php');
require_once('../functions/setFooter.php');
require_once('../functions/setHead.php');

setHead("Registrar", "Pagina para criar uma conta de usuário");
?>

<div class="Container">
    <div class="SignUp">
        <h1>Criar conta</h1>
        <form action=<?php echo PAGES_PATH . '/processAllForms.php' ?> method="post">
            <label for="fullname"> Nome completo: </label>
            <input type="text" name="fullname" id="fullname" required>
            <label for="username"> Nome de usuário: </label>
            <input type="text" name="username" id="username" required>
            <label for="password"> Senha: </label>
            <input type="password" name="password" id="password" minlength="4" required>
            <label for="confirm-password"> Confirmar senha: </label>
            <input type="password" name="confirm-password" id="confirm-password" minlength="4" required>
            <input type="hidden" name="action" value="REGISTER">
            <input type="submit" value="Enviar">
        </form>
    </div>
</div>


<?php setFooter(); ?>