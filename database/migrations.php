<?php
require_once __DIR__ . '/../config/database.php';

$conn = Database::connect();

$sql = "CREATE TABLE IF NOT EXISTS accidents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Berichtsjahr INT,
    Monat_ID INT,
    Stunde_ID INT,
    Wochentag_ID INT,
    Bundesland_ID INT,
    Gebiet_ID INT,
    Verkehrsart_ID INT,
    AlterGr_ID INT,
    Geschlecht_ID INT,
    Ursache_ID INT,
    Getötete INT
)";

if ($conn->query($sql) === TRUE) {
    echo "✅ Table 'accidents' created successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>