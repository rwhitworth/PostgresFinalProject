<?php

setcookie('logged_in', 0);
setcookie('id', 0);
setcookie('username', 'notavaliduser');

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
