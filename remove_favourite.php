<?php
header('Content-Type: application/json');
include 'rentpropertyconnect.php';

$data = json_decode(file_get_contents('php://input'), true);

// For debugging to appear in the console in the case that an error occurs, so you can resolve the issue by kowing what is the problem that arised.
error_log(print_r($data, true));

if (isset($data['id'])) {
    $favouriteId = (int)$data['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM favourites WHERE favourite_id = :favourite_id");
        $stmt->bindParam(':favourite_id', $favouriteId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true, 'message' => 'Favourite removed.']);
        } else {
            echo json_encode(['error' => 'No favourite found with that ID.']);
        }
    } catch (Exception $e) {
        echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid input.']);
}
?>
