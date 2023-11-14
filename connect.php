<?php
$fname = $_POST['fname'];
$email = $_POST['email'];
$Phone = $_POST['Phone'];
$addres = $_POST['addres'];
$dob = $_POST['dob'];   
$photo = $_POST['photo'];


$host = "localhost";
$dbname = "register";
$username = "debian-sys-maint";
$password = "6N1spfnrnrkNxJKh";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addres = $_POST['addres'];
    $dob = $_POST['dob'];   
    $photo = $_POST['photo'];

    // to insert data
    try {
        $stmt = $pdo->prepare("INSERT INTO user (name, email,phone,address,dob,photo) VALUES (:name, :email, :Phone, :address, :dob, :photo)");
        $stmt->bindParam(':name', $fname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $addres);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':photo', $photo);
        $stmt->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
$pdo = null;
?>



