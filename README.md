# Traffic Fatalities Data Visualization

## 📌 Overview

A responsive and interactive dashboard to visualize fatal traffic accidents in Austria using PHP (MVC structure), MySQL, and Chart.js.

## ✨ Features

- 🧩 **Interactive Filters**: Filter traffic accident data by:
  - 👤 Gender (`Geschlecht`)
  - 📅 Month (`Monat`)
  - 📆 Day of the Week (`Wochentag`)
  - 🚗 Traffic Type (`Verkehrsart`)
  
- 📈 **Dynamic Chart**: Line chart displaying fatalities by year and state, powered by Chart.js.

- 📱 **Responsive Design**: Works on desktops, tablets, and mobile devices.

- 🔄 **Backend Integration**: Fetches filtered data dynamically from the server using a REST-like API built in PHP.

- 🛠️ **Database Migration and Seeding**: Easily initialize and populate the database using provided scripts.

- ⏰ **Automated Updates via Cron**: Refresh traffic accident data daily from the official API using a scheduled task.

- 🎨 **Styled with Custom CSS**: Clean and modern UI with custom design for filters and charts.


## 📡 Data Sources

The dataset contains information about traffic fatalities and can be accessed via:

- **JSON Format**: [API Endpoint](https://dashboards.kfv.at/api/udm_verkehrstote/json)
- **CSV Format**: [API Endpoint](https://dashboards.kfv.at/api/udm_verkehrstote/csv)
- 

## 🛠️ Tech Stack

This project allows flexibility in choosing the programming language, libraries, and frameworks. The implementation can be done using technologies such as:

## 🛠️ Tech Stack

- ⚙️ **PHP (OOP + MVC)** — Backend logic, routing, and REST-like API
- 🗃️ **MySQL** — Relational database for storing traffic accident data
- 🎨 **HTML5 + CSS3** — Responsive UI and custom styling
- 📊 **Chart.js** — Interactive and dynamic chart rendering
- 🧠 **JavaScript** — Client-side logic for filters and data handling
- 🕰️ **Cron (Optional)** — Automated daily updates from the live API

- ## 🚀 Getting Started

### Prerequisites

- ✅ [XAMPP](https://www.apachefriends.org/index.html) or any local PHP server
- ✅ MySQL (e.g., via XAMPP or standalone)
- ✅ PHP 7.4+ with `mysqli` extension
 
