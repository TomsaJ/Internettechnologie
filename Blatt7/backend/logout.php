<?php
include 'loginandlogout.php';
logout();
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>