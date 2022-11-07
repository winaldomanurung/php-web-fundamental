<?php

session_start();
session_unset(); //meyakinkan menghapus session
session_destroy();

header("Location: login.php");
exit;
