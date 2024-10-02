<?php
include 'db.php';
session_start();

if (isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
    $result = $conn->query($sql);
    $usuario = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $tipo_plan = $_POST['tipo_plan'];

        $sql_update = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', tipo_plan='$tipo_plan' WHERE id='$usuario_id'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Datos actualizados correctamente.";
        } else {
            echo "Error al actualizar los datos: " . $conn->error;
        }
    }
}
?>

<form method="POST" action="edit.php">
    <h2>Editar Perfil</h2>
    <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
    <input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>" required>
    <select name="tipo_plan">
        <option value="normal" <?php echo ($usuario['tipo_plan'] == 'normal') ? 'selected' : ''; ?>>Normal</option>
        <option value="bueno" <?php echo ($usuario['tipo_plan'] == 'bueno') ? 'selected' : ''; ?>>Bueno</option>
        <option value="excelente" <?php echo ($usuario['tipo_plan'] == 'excelente') ? 'selected' : ''; ?>>Excelente</option>
        <option value="oferta de temporada" <?php echo ($usuario['tipo_plan'] == 'oferta de temporada') ? 'selected' : ''; ?>>Oferta de temporada</option>
    </select>
    <input type="submit" value="Actualizar">
</form>
