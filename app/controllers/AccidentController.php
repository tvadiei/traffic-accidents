<?php
require_once __DIR__ . "/../models/Accident.php";

class AccidentController {
    private $accidentModel;

    public function __construct() {
        $this->accidentModel = new Accident();
    }

public function index()
{
    $gender = $_GET['Geschlecht_ID'] ?? null;
    $months = $_GET['Monat_ID'] ?? null;
    $days = $_GET['Wochentag_ID'] ?? null;
    $trafficTypes = $_GET['Verkehrsart_ID'] ?? null;

    $filters = [];
    if ($gender) {
        $filters['Geschlecht_ID'] = $gender;
    }
    if ($months) {
        $filters['Monat_ID'] = explode(',', $months);
    }
    if ($days) {
        $filters['Wochentag_ID'] = explode(',', $days); 
    }
    if ($trafficTypes) {
        $filters['Verkehrsart_ID'] = explode(',', $trafficTypes); 
    }

    $accidentModel = new Accident();
    $data = $accidentModel->getFilteredData($filters);

    header('Content-Type: application/json');
    echo json_encode($data);
}
}
?>
