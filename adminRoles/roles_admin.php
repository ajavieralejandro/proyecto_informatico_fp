<?php
include '../conexion.php';
session_start();
if (!isset($_SESSION['username'])) {

    header("Location: ../login.php");
    exit;
} else {
    $rol_id = $_SESSION['rol_id'];
    if (!$rol_id == 4) {
        //Si no sos admin te llevo al login    
        header("Location: ../login.php");
        exit;
    }
}
$id = $_SESSION['id'];
$sql = "SELECT * FROM roles WHERE NOT nombre='admin' ";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>


                </ul>
                <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>

            </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="my-4">Bienvenido, <?php echo $_SESSION['username']; ?></h2>
        <div class="container text-left">
            <div class="row">
                <div class=" col-sm-12 col-md-4">
                    <div class="list-group">
                        <a href="dashboard_admin.php" class="list-group-item list-group-item-action ">
                            Principal
                        </a>
                        <a href="#" class="list-group-item list-group-item-action ">Noticias</a>
                        <a href="#" class="list-group-item list-group-item-action">Usuarios</a>
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Roles</a>
                        <a class="list-group-item list-group-item-action disabled" aria-disabled="true">Categorias</a>
                    </div>
                </div>
                <div class="col">
                </div>

            </div>
        </div>
        <?php
        if ($result->num_rows == 0) {
            echo '<h6>No hay roles para mostrar</h6>';
        } else {
            echo '
                <table class="table mt-5">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">nombre</th>
                            <th scope="col">acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                        ';
            while ($rol = $result->fetch_assoc()) {
                echo "
                <tr>
                        <th >{$rol['id']}</th>
                        <td>{$rol['nombre']}</td>
                       
                        <td>
                            <a href=\"eliminar_rol.php?id={$rol['id']}\">
                            <i class=\"fa fa-trash\" aria-hidden=\"true\"></i>
                            </a>


                        </td>
                </tr>
                ";
            }

            echo '</tbody></table>';
        }
        ?>
        <a href="agregar_rol.php" class="btn btn-primary" role="button" aria-disabled="true">Agregar Rol</a>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>