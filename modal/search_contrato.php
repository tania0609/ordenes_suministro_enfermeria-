<?php
$servername = "localhost"; // Cambia esto por tu configuración
$username = "root";
$password = "";
$dbname = "medicamentos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$term = $_GET['term'];

$sql = "SELECT contrato FROM contratos WHERE contrato LIKE ? LIMIT 10";
$stmt = $conn->prepare($sql);
$term = "%".$term."%";
$stmt->bind_param("s", $term);
$stmt->execute();
$result = $stmt->get_result();

$contratos = array();
while($row = $result->fetch_assoc()) {
    $contratos[] = $row['contrato'];
}

$stmt->close();
$conn->close();

echo json_encode($contratos);
?>
