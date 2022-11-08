<?php

session_start();
session_unset(); //meyakinkan menghapus session
session_destroy();

setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: login.php");
exit;
