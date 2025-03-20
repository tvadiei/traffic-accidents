<?php
require_once __DIR__ . '/../config/database.php';

$conn = Database::connect();
$api_url = "https://dashboards.kfv.at/api/udm_verkehrstote/json";

// Fetch API data
$response = file_get_contents($api_url);
if (!$response) {
    file_put_contents("../logs/errors.log", "API fetch error: " . date("Y-m-d H:i:s") . "\n", FILE_APPEND);
    die("Error fetching data from API!");
}

$data = json_decode($response, true);
if (!$data || !isset($data['verkehrstote'])) {
    die("Invalid API response format!");
}

// Clear existing data
$conn->query("TRUNCATE TABLE accidents");

foreach ($data['verkehrstote'] as $entry) {
    $stmt = $conn->prepare("
        INSERT INTO accidents (
            Berichtsjahr, Monat_ID, Stunde_ID, Wochentag_ID, Bundesland_ID, 
            Gebiet_ID, Verkehrsart_ID, AlterGr_ID, Geschlecht_ID, Ursache_ID, Getötete
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("iiiiiiiiiii",
        $entry['Berichtsjahr'], $entry['Monat_ID'], $entry['Stunde_ID'], 
        $entry['Wochentag_ID'], $entry['Bundesland_ID'], $entry['Gebiet_ID'], 
        $entry['Verkehrsart_ID'], $entry['AlterGr_ID'], $entry['Geschlecht_ID'], 
        $entry['Ursache_ID'], $entry['Getötete']
    );
    $stmt->execute();
}

echo "✅ Data successfully seeded from API!";
?>
