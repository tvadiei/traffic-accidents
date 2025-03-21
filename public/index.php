<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style.css" rel="stylesheet">
    <script src="assets/chart.min.js"></script>
    <script src="assets/chartjs-plugin-datalabels@2.0.0"></script>
</head>

<body>
    <div class="main-container">


        <div class="content">
            <h1>Verkehrsdatenvisualisierung</h1>
            <div class="filter-container">
                <div class="" filter-group">
                    <label>Wochentag:</label>
                    <select id="Wochentag_ID">
                        <option value="">All</option>
                        <option value="1">Montag </option>
                        <option value="2">Dienstag </option>
                        <option value="3">Mittwoch </option>
                        <option value="4">Donnerstag </option>
                        <option value="5">Freitag </option>
                        <option value="6">Samstag </option>
                        <option value="7">Sonntag </option>
                    </select>
                </div>
                <div class="" filter-group">

                    <label>Geschlecht :</label>
                    <input type="radio" name="Geschlecht_ID" value="" checked> All
                    <input type="radio" name="Geschlecht_ID" value="1"> männlich
                    <input type="radio" name="Geschlecht_ID" value="2"> weiblich
                </div>
                <div class="" filter-group">

                    <label>Verkehrsart :</label>
                    <select id="Verkehrsart_ID">
                        <option value="">All</option>
                        <option value="1">Fußgänger </option>
                        <option value="2">Fahrrad </option>
                        <option value="3">Einspurige Kfz </option>
                        <option value="4">Pkw </option>
                        <option value="5">Lkw > 3,5t </option>
                        <option value="99">Sonstige </option>
                    </select>
                </div>


                <div class="" filter-group">
                    <label>Monat (Month):</label>
                    <div id="Monat_ID" class="checkbox-container">
                        <input type="checkbox" value="1" id="month1"> <label for="month1">Januar</label>
                        <input type="checkbox" value="2" id="month2"> <label for="month2">Februar</label>
                        <input type="checkbox" value="3" id="month3"> <label for="month3">März</label>
                        <input type="checkbox" value="4" id="month4"> <label for="month4">April</label>
                        <input type="checkbox" value="5" id="month5"> <label for="month5">Mai</label>
                        <input type="checkbox" value="6" id="month6"> <label for="month6">Juni</label>
                        <input type="checkbox" value="7" id="month7"> <label for="month7">Juli</label>
                        <input type="checkbox" value="8" id="month8"> <label for="month8">August</label>
                        <input type="checkbox" value="9" id="month9"> <label for="month9">September</label>
                        <input type="checkbox" value="10" id="month10"> <label for="month10">Oktober</label>
                        <input type="checkbox" value="11" id="month11"> <label for="month11">November</label>
                        <input type="checkbox" id="selectAllMonths"> <label for="selectAllMonths">Alle auswählen (Select All)</label>

                    </div>

                </div>



                <button id="applyFiltersButton" class="filter-button">Filter</button>
            </div>
            <div class="chart-container">
                <canvas class="chart-box" id="trafficChart"></canvas>
            </div>
        </div>
    </div>


</body>

<script src="assets/script.js"></script>

</html>