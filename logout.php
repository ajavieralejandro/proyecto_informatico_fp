<?php
//Destruyo lo que tengo en la sesión
session_start();
session_destroy();
header("Location: welcome.php");
exit;
