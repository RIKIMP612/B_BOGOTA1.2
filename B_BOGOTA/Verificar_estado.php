<?php
include 'Conexion.php';

header('Content-Type: application/json');

$id_usuario = isset($_GET['id_usuario']) ? intval($_GET['id_usuario']) : 0;

$query = "SELECT estado FROM usuarios WHERE id_usuario = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(["estado" => $row["estado"]]);
} else {
    echo json_encode(["estado" => "pendiente"]);
}

$stmt->close();
$conexion->close();
?>
