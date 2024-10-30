<?php

ini_set('display_errors', 1); // This is a pop up to show directly in the browser that there may be an error
ini_set('display_startup_errors', 1); // This has been added to enable the display of the errors that occur during the startup, this helps catch errors before the main script runs such as file configuration issues
error_reporting(E_ALL); // This part is meant to indicate that it must report all types of errors, warning and notices, including syntac errors

include 'loginandregisterconnect.php'; // This is for the database connection

if (isset($_POST['Register'])) { // This is for users to register themselves in the RealHome database
    $userName = $_POST['Username']; 
    $email = $_POST['Email']; 
    $password = $_POST['Password']; 
    $password=md5($password); // This line is for password encryption, so in the case of data breaches, this encrypts all passwords so cyberattackers can't access the users information

    $stmt = $conn->prepare("SELECT * FROM realhomeusers WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error); 
    }
    $stmt->bind_param("s", $email); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 

    if ($result->num_rows > 0) {
        echo "Email Address Already Exists!"; // This code is meant to indicate if a email already exists in the database, meaning they need to change their email to access the RealHome website
    } else {
        $insertStmt = $conn->prepare("INSERT INTO realhomeusers(username, password, email) VALUES (?, ?, ?)");
        if (!$insertStmt) {
            die("Prepare failed: " . $conn->error); 
        }
        $insertStmt->bind_param("sss", $userName, $password, $email);
        
        if ($insertStmt->execute()) {
            header("Location: RealHomeLogin.php"); // This is for the registration, so if the registration was successfully completed, it immediately takes the user back to the login page so they can login to my RealHome website
            exit(); 
        } else {
            echo "Error: " . $insertStmt->error; 
        }
    }
}

if(isset($_POST['Login'])){
    $email=$_POST['Email']; // This obtains the user input email in order for you to log in
    $password=$_POST['Password']; // This obtains the user password in order for you to login
    $password=md5($password); // This md5 is for the encryption of the password

    $sql="SELECT * FROM realhomeusers WHERE email='$email' and password='$password'"; //This entire login system uses the user email to login to the website, it will then select the user from the email to validate their password, thus allowing them access if they got it correct, if not they are then given an error message
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['Email']=$row['email'];
        header("Location: HomePage.php");
        exit();
    }
    else {
        echo "Incorrect Password has been inputted!";
    }
}

$conn->close();
?>