<?
include 'includes.php';
$username = $_POST['username'];
$password = $_POST['password'];

  $q = "SELECT id FROM Users WHERE lower(username) = '" . strtolower($username) . "' AND password='" . $password . "'";
  $res = pg_query($conn, $q);
  if (pg_numrows($res) == 1)
  {
    $obj = pg_fetch_object($res, 0);
    setcookie("id", $obj->id);
    setcookie("logged_in", 1);
    setcookie("username", $username);
  }
  else
  {
    setcookie("logged_in", 0);
    setcookie("id", 0);
    setcookie("username", "usernamenotinsystemnofoolingmehacker!");
  }

header('Location: ' . $_SERVER['HTTP_REFERER']);




?>
