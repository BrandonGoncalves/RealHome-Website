<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'buypropertyconnect.php'; // Connection to the rent property connect, because it is meant to connect the favourites to the rent property as favourites can only be gotten from the rent page

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wishlists = json_decode(file_get_contents('php://input'), true);

    foreach ($wishlists as $wishlist) {
        $wishlist_id = $wishlist['id'];

        // Check if the property is already favorited
        $stmt = $pdo->prepare("SELECT * FROM wishlists WHERE wishlist_id = ?");
        $stmt->execute([$wishlist_id]);

        if ($stmt->rowCount() === 0) {
            // Insert favorite if not already present
            $stmt = $pdo->prepare("INSERT INTO wishlists (wishlist_id) VALUES (?)");
            $stmt->execute([$wishlist_id]);
        }
    }
}
?>
