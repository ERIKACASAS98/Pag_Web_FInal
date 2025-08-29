<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombres = $_POST['nombres'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];
$comentarios = $_POST['comentarios'];

// Insertar cliente
$sql = "INSERT INTO clientes_cotizacion (nombres, ciudad, direccion, celular, comentarios)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nombres, $ciudad, $direccion, $celular, $comentarios);
$stmt->execute();

$cotizacion_id = $stmt->insert_id;

// Precios de productos
$precios = [
    "iPhone" => 2500000,
    "Samsung Galaxy" => 1800000,
    "MacBook" => 4500000,
    "Dell XPS" => 3500000,
    "Lenovo ThinkPad" => 3000000,
    "ASUS Gaming" => 3200000,
    "PlayStation 5" => 2800000,
    "Xbox Series X" => 2600000,
    "Nintendo Switch" => 1500000,
    "PC Gaming" => 4000000,
    "AirPods" => 800000,
    "Sony WH-1000XM" => 1200000,
    "Bose QuietComfort" => 1100000,
    "Amazon Alexa" => 400000,
    "Google Home" => 350000,
    "Luces Inteligentes" => 150000,
    "Cargadores" => 50000,
    "Cables USB" => 30000,
    "Fundas y Protectores" => 60000,
    "Power Banks" => 120000
];

// Insertar productos
$totalCotizacion = 0;

if (!empty($_POST['products'])) {
    foreach ($_POST['products'] as $producto) {
        $campo = "qty-" . strtolower(str_replace(" ", "_", $producto));
        $cantidad = $_POST[$campo] ?? 1;
        $precio_unitario = $precios[$producto] ?? 0;
        $total = $precio_unitario * $cantidad;
        $totalCotizacion += $total;

        $sqlProd = "INSERT INTO productos_cotizacion (cotizacion_id, producto, cantidad, precio_unitario, total)
                    VALUES (?, ?, ?, ?, ?)";
        $stmtProd = $conn->prepare($sqlProd);
        $stmtProd->bind_param("isidd", $cotizacion_id, $producto, $cantidad, $precio_unitario, $total);
        $stmtProd->execute();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Cotización</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 20px; }
        .resumen { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; }
        .total { font-size: 1.5em; font-weight: bold; color: #27ae60; margin: 15px 0; }
        .botones a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .botones a:hover { background: #2980b9; }
    </style>
</head>
<body>
    <div class="resumen">
        <h2>✅ Cotización realizada con éxito</h2>
        <p>Gracias <strong><?php echo $nombres; ?></strong>, tu cotización ha sido registrada.</p>

        <p class="total">💰 Costo total: 
            <?php echo number_format($totalCotizacion, 0, ',', '.'); ?> COP
        </p>

        <div class="botones">
            <a href="index.php">➕ Nueva Cotización</a>
            <a href="ver_cotizacion.php">📋 Ver Cotizaciones</a>
            <a href="index.php#menu">🏠 Menú Principal</a>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>
