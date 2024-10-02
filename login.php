<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['rol'] = $row['rol'];
            echo "Bienvenido " . $row['nombre'];
        } else {
            echo "Contrasena incorrecta.";
        }
    } else {
        echo "No existe el usuario.";
    }
}
?>

<form method="POST" action="login.php">
    <h2>Iniciar Sesion</h2>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Contrasena" required>
    <input type="submit" value="Iniciar Sesion">
</form>
