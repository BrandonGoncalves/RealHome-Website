<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "realhome_buyrentproperties";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// This creates the path to the folder where the uplaoded images will go
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// This section creates the tables if they do not exist, and I started this code without creating the database, so that when the user inputs their property, it will automatically create the database without me having to manually go to XAMPP and create the database
$createSellTable = "
CREATE TABLE IF NOT EXISTS sell_properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    address VARCHAR(255) NOT NULL,
    location VARCHAR(100) NOT NULL,
    images TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$createRentTable = "
CREATE TABLE IF NOT EXISTS rent_properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    address VARCHAR(255) NOT NULL,
    location VARCHAR(100) NOT NULL,
    images TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($createSellTable);
$conn->query($createRentTable);

if (isset($_POST['sellName'])) {
    $sellName = $conn->real_escape_string($_POST['sellName']);
    $sellPrice = $conn->real_escape_string($_POST['sellPrice']);
    $sellAddress = $conn->real_escape_string($_POST['sellAddress']);
    $sellLocation = $conn->real_escape_string($_POST['sellLocation']);

    $sellImages = [];
    if (isset($_FILES['sellImages']) && is_array($_FILES['sellImages']['name'])) {
        foreach ($_FILES['sellImages']['name'] as $key => $name) {
            $tmpName = $_FILES['sellImages']['tmp_name'][$key];
            $filePath = $uploadDir . basename($name);
            if (move_uploaded_file($tmpName, $filePath)) {
                $sellImages[] = $filePath;
            }
        }
    }
    $sellImagesString = implode(',', $sellImages);

    // Insert the information that the user inputted into sell_properties table that was created in the realhome_buyrentproperties database
    $sql = "INSERT INTO sell_properties (name, price, address, location, images)
            VALUES ('$sellName', '$sellPrice', '$sellAddress', '$sellLocation', '$sellImagesString')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => "New record created successfully for Sell Property"]);
    } else {
        echo json_encode(['error' => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

if (isset($_POST['rentName'])) { //This part takes all the inputted details of the property and assigns them their own variable
    $rentName = $conn->real_escape_string($_POST['rentName']);
    $rentPrice = $conn->real_escape_string($_POST['rentPrice']);
    $rentAddress = $conn->real_escape_string($_POST['rentAddress']);
    $rentLocation = $conn->real_escape_string($_POST['rentLocation']);

    $rentImages = []; // This part is an array and it will send all the images that are uploaded to the uploads folder to store the images
    if (isset($_FILES['rentImages']) && is_array($_FILES['rentImages']['name'])) {
        foreach ($_FILES['rentImages']['name'] as $key => $name) {
            $tmpName = $_FILES['rentImages']['tmp_name'][$key];
            $filePath = $uploadDir . basename($name);
            if (move_uploaded_file($tmpName, $filePath)) {
                $rentImages[] = $filePath;
            }
        }
    }
    $rentImagesString = implode(',', $rentImages);
    //This part handles the insertion of the details into the database, so it takes the variables that we set before and brings them here, and here it takes all that information and appends it into the table in the database
    $sql = "INSERT INTO rent_properties (name, price, address, location, images) 
            VALUES ('$rentName', '$rentPrice', '$rentAddress', '$rentLocation', '$rentImagesString')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => "New record created successfully for Rent Property"]);
    } else {
        echo json_encode(['error' => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

$conn->close();
?>
