<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
include 'rentpropertyconnect.php';

try {
    $stmt = $pdo->query("SELECT * FROM rentals");
    $rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$rentals) {
        echo json_encode(['error' => 'No rentals found.']);
        exit;
    }

    echo json_encode($rentals);
} catch (Exception $e) {
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
}

//This code is meant to show which table from the database is being used, and if there were to be no rentals in the table, then what would happen is an error would be sent to say that there is no rentals in the table
?>
