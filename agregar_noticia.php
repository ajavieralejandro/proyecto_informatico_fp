<?php
include 'conexion.php';

$sql = "SELECT * FROM categorias";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Usuarios</title>
</head>

<body>
    <div>
        <div class="container">
            <h2 class="my-4">Registro</h2>
            <form method="POST" action="registrar_noticia.php">
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">imagen</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>
                <div class="form-floating">
                    <input name="descripcion" class="form-control form-control-lg" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example">
                    <label for="floatingTextarea">Descripcion</label>
                </div>

                <div class"mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select id="categoria" name="categoria" class="form-select" aria-label="Default select example">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value={$row['id']}>{$row['nombre']}</option>
";
                            }
                        }
                        ?>

                    </select>
                </div>

                <button type="submit" class="btn mt-5 btn-primary">Registrar Noticia</button>
            </form>
        </div>
    </div>

</body>

</html>

<?php
$conn->close();
?>