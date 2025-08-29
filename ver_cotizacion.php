<?php
$conn = new mysqli("localhost", "root", "", "techstore");
if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

$sql = "SELECT * FROM clientes_cotizacion ORDER BY fecha DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<h2>Cotización ID {$row['id']} - {$row['nombres']}</h2>";
    echo "<p><strong>Ciudad:</strong> {$row['ciudad']} | <strong>Dirección:</strong> {$row['direccion']} | <strong>Celular:</strong> {$row['celular']}</p>";
    echo "<p><strong>Comentarios:</strong> {$row['comentarios']}</p>";

    $sqlProd = "SELECT * FROM productos_cotizacion WHERE cotizacion_id = " . $row['id'];
    $resultProd = $conn->query($sqlProd);

    echo "<table border='1' cellpadding='5'><tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th><th>Total</th></tr>";
    while ($prod = $resultProd->fetch_assoc()) {
        echo "<tr>
                <td>{$prod['producto']}</td>
                <td>{$prod['cantidad']}</td>
                <td>{$prod['precio_unitario']}</td>
                <td>{$prod['total']}</td>
              </tr>";
    }
    echo "</table><hr>";
}
$conn->close();
?>
