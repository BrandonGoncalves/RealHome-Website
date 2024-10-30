<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
include 'buypropertyconnect.php'; // Your existing DB connection file

try {
    $stmt = $pdo->query("SELECT p.* FROM wishlists w JOIN properties p ON w.wishlist_id = p.id");
    $wishlists = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$wishlists) {
        echo json_encode(['error' => 'No wishlists found.']);
        exit;
    }

    echo json_encode($wishlists);
} catch (Exception $e) {
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
}
?>
