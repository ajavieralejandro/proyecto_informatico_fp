<?php
//Destruyo lo que tengo en la sesión
session_destroy();
header("Location: login.php");
