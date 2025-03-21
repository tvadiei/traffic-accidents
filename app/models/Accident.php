<?php
require_once __DIR__ . "/../../config/database.php";

class Accident {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }
    public function getFilteredData($filters) {
        $conditions = [];
        $params = [];
        $types = ""; 
    
        if (!empty($filters['Geschlecht_ID'])) {
            $conditions[] = "Geschlecht_ID = ?";
            $params[] = $filters['Geschlecht_ID'];
            $types .= "i"; 
        }
        if (!empty($filters['Monat_ID'])) {
            $conditions[] = "Monat_ID IN (" . implode(",", array_fill(0, count($filters['Monat_ID']), "?")) . ")";
            $params = array_merge($params, $filters['Monat_ID']);
            $types .= str_repeat("i", count($filters['Monat_ID'])); 
        }
        if (!empty($filters['Wochentag_ID'])) {
            $conditions[] = "Wochentag_ID IN (" . implode(",", array_fill(0, count($filters['Wochentag_ID']), "?")) . ")";
            $params = array_merge($params, $filters['Wochentag_ID']);
            $types .= str_repeat("i", count($filters['Wochentag_ID'])); 
        }
        if (!empty($filters['Verkehrsart_ID'])) {
            $conditions[] = "Verkehrsart_ID IN (" . implode(",", array_fill(0, count($filters['Verkehrsart_ID']), "?")) . ")";
            $params = array_merge($params, $filters['Verkehrsart_ID']);
            $types .= str_repeat("i", count($filters['Verkehrsart_ID'])); 
        }
    
        $query = "SELECT Berichtsjahr, Bundesland_ID, SUM(Getötete) AS fatalities FROM accidents";
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
        $query .= " GROUP BY Berichtsjahr, Bundesland_ID";
    
        $stmt = $this->conn->prepare($query);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params); 
        }
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
        return $data;
    }
}
?>
