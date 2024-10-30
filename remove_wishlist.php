<?php
header('Content-Type: application/json');
include 'buypropertyconnect.php';

$data = json_decode(file_get_contents('php://input'), true);

// For debugging to appear in the console in the case that an error occurs, so you can resolve the issue by kowing what is the problem that arised.
error_log(print_r($data, true));

if (isset($data['id'])) {
    $wishlistId = (int)$data['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM wishlists WHERE wishlist_id = :wishlist_id");
        $stmt->bindParam(':wishlist_id', $wishlistId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true, 'message' => 'Wishlist removed.']);
        } else {
            echo json_encode(['error' => 'No wishlist found with that ID.']);
        }
    } catch (Exception $e) {
        echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid input.']);
}
?>
