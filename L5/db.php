<?php
$conn = new mysqli("localhost", "root", "", "mojaBaza");
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
?>