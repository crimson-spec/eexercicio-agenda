<?php
require_once('../config/config.php');
require_once('../functions/showAlert.php');
require_once('../functions/login.php');
require_once('../functions/logout.php');
require_once('../dao/AgendaDAO.php');
require_once('../dao/UserDAO.php');

session_start();

if (!isset($_POST['action'])) {
  header('Location:' . PAGES_PATH . '/main.php');
  die();
}

// REGISTER
if (
  $_POST['action'] === "REGISTER"
  && isset($_POST["fullname"]) && isset($_POST["username"])
  && isset($_POST["password"]) && isset($_POST["confirm-password"])
) {

  $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm-password"];

  if ($password !== $confirm_password) {
    showAlert("Senha e confirmação de senha não coincidem!");
    header("refresh:0.1;url=" . PAGES_PATH . '/signUp.php');
    die();
  }

  try {
    $dao = new UserDAO();
    $created = $dao->create($fullname, $username, $password);
    showAlert("Sucesso!");
  } catch (Exception $exception) {
    showAlert($exception->getMessage());
  }
  header("refresh:0.1;url=" . PAGES_PATH . '/signIn.php');
}

// LOGIN
if ($_POST['action'] === "LOGIN" && isset($_POST["username"]) && isset($_POST["password"])) {
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);


  if (empty($username) || empty($password)) {
    showAlert("Verifique os campos!");
    header("refresh:0.1;url=" . PAGES_PATH . '/signIn.php');
    die();
  }

  try {
    $dao = new UserDAO();

    $user = $dao->findByUsername($username);

    if ($user == null || password_verify($password, $user['password']) === false) {
      showAlert("Usuário ou senha inválidos!");
      header("refresh:0.1;url=" . PAGES_PATH . '/signIn.php');
      die();
    }

    login($user);
  } catch (Exception $exception) {
    showAlert($exception->getMessage());
  }

  header("refresh:0.1;url=" . PAGES_PATH . '/main.php');
  die();
}

// LOGOUT
if ($_POST['action'] === "LOGOUT") {
  logout();
  header("refresh:0.1;url=" . PAGES_PATH . '/signIn.php');
}


// STORE
if ($_POST['action'] === "POST" && isset($_POST["name"]) && isset($_POST["phone"])) {

  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);

  if (empty($name) || empty($phone)) {
    showAlert("Verifique os campos!");
    header("refresh:0.1;url=" . PAGES_PATH . '/insert.php');
    die();
  }

  try {
    // $user_id = $_SESSION['user']['id'];
    $dao = new AgendaDAO();
    $created = $dao->create($name, $phone);
    showAlert("Sucesso!");
  } catch (Exception $exception) {
    showAlert($exception->getMessage());
  }
  header("refresh:0.1;url=" . PAGES_PATH . '/list.php');
}


// UPDATE
if (
  $_POST['action'] === "PUT" && isset($_POST["id"])
  && isset($_POST["name"]) && isset($_POST["phone"])
) {

  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);

  try {
    $dao = new AgendaDAO();
    $created = $dao->update($id, $name, $phone);
    showAlert("Sucesso!");
  } catch (Exception $exception) {
    showAlert($exception->getMessage());
  }
  header("refresh:0.1;url=" . PAGES_PATH . '/list.php');
}
