<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
include 'buypropertyconnect.php';

try {
    $stmt = $pdo->query("SELECT * FROM properties");
    $properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$properties) {
        echo json_encode(['error' => 'No properties found.']);
        exit;
    }

    echo json_encode($properties);
} catch (Exception $e) {
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
}
?>
