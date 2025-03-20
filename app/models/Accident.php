<?php
require_once __DIR__ . "/../../config/database.php";

class Accident {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function getFilteredData($year, $month, $gender, $day, $traffic) {
        $conditions = [];
        $params = [];

        if (!empty($year)) {
            $conditions[] = "Berichtsjahr = ?";
            $params[] = $year;
        }
        if (!empty($gender)) {
            $conditions[] = "Geschlecht_ID = ?";
            $params[] = $gender;
        }
        if (!empty($month)) {
            $conditions[] = "Monat_ID IN (" . implode(",", array_fill(0, count($month), "?")) . ")";
            $params = array_merge($params, $month);
        }
        if (!empty($day)) {
            $conditions[] = "Wochentag_ID IN (" . implode(",", array_fill(0, count($day), "?")) . ")";
            $params = array_merge($params, $day);
        }
        if (!empty($traffic)) {
            $conditions[] = "Verkehrsart_ID IN (" . implode(",", array_fill(0, count($traffic), "?")) . ")";
            $params = array_merge($params, $traffic);
        }

        $query = "SELECT Berichtsjahr, COUNT(*) as count FROM accidents";
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
        $query .= " GROUP BY Berichtsjahr";

        $stmt = $this->conn->prepare($query);
        if (!empty($params)) {
            $stmt->bind_param(str_repeat('i', count($params)), ...$params);
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
