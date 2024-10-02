<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $tipo_plan = $_POST['tipo_plan'];

    $sql = "INSERT INTO usuarios (nombre_usuario, email, password, nombre, telefono, tipo_plan)
            VALUES ('$nombre_usuario', '$email', '$password', '$nombre', '$telefono', '$tipo_plan')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST" action="register.php">
    <h2>Registro</h2>
    <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="text" name="nombre" placeholder="Nombre completo" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <select name="tipo_plan">
        <option value="normal">Normal</option>
        <option value="bueno">Bueno</option>
        <option value="excelente">Excelente</option>
        <option value="oferta de temporada">Oferta de temporada</option>
    </select>
    <input type="submit" value="Registrar">
</form>
