<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'rentpropertyconnect.php'; // Connection to the rent property connect, because it is meant to connect the favourites to the rent property as favourites can only be gotten from the rent page

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $favourites = json_decode(file_get_contents('php://input'), true);

    foreach ($favourites as $favourite) {
        $favourite_id = $favourite['id'];

        // Check if the property is already favorited
        $stmt = $pdo->prepare("SELECT * FROM favourites WHERE favourite_id = ?");
        $stmt->execute([$favourite_id]);

        if ($stmt->rowCount() === 0) {
            // Insert favorite if not already present
            $stmt = $pdo->prepare("INSERT INTO favourites (favourite_id) VALUES (?)");
            $stmt->execute([$favourite_id]);
        }
    }
}
?>
