<?php
session_start();
session_destroy();
header("Location: /WebTechnologies/php/login.php");

exit();
?>