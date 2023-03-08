<?php
session_start();
session_destroy();
header('Location: /TODO/index.php');

?>