<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
include 'rentpropertyconnect.php'; // Your existing DB connection file

try {
    $stmt = $pdo->query("SELECT r.* FROM favourites f JOIN rentals r ON f.favourite_id = r.id");
    $favourites = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$favourites) {
        echo json_encode(['error' => 'No favourites found.']);
        exit;
    }

    echo json_encode($favourites);
} catch (Exception $e) {
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
}
?>
