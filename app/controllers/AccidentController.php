<?php
require_once __DIR__ . "/../models/Accident.php";

class AccidentController {
    private $accidentModel;

    public function __construct() {
        $this->accidentModel = new Accident();
    }

    public function index() {
        header("Content-Type: application/json");
        header("Access-Control-Allow-Origin: *");

        $year = $_GET['year'] ?? null;
        $month = isset($_GET['month']) ? explode(',', $_GET['month']) : [];
        $gender = $_GET['gender'] ?? null;
        $day = isset($_GET['day']) ? explode(',', $_GET['day']) : [];
        $traffic = isset($_GET['traffic']) ? explode(',', $_GET['traffic']) : [];

        $data = $this->accidentModel->getFilteredData($year, $month, $gender, $day, $traffic);
        echo json_encode($data);
    }
}
?>
