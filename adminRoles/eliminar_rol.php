<?php
include '../conexion.php';

$id = $_GET['id'];
if ($id != 4) {
    $sql = "DELETE FROM roles WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: roles_admin.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error eliminando registro: " . $conn->error . "</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Estas tratando de eliminar el admin " . "</div>";
}
