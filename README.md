# 🏨 Hotel & Restaurant Waiting Management System

[![JavaScript](https://img.shields.io/badge/JavaScript-ES6%2B-F7DF1E?logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![PHP](https://img.shields.io/badge/PHP-Backend_API-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-Relational_DB-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![HTML5](https://img.shields.io/badge/HTML5-CSS3-E34F26?logo=html5&logoColor=white)](https://html.spec.whatwg.org/)

A full-stack guest waiting and table management application designed for hospitality and restaurants to streamline customer flow, calculate dynamic estimated wait times, and optimize floor occupancy.

---

## 🚀 Key Features

* **Real-time Queue Polling**: Asynchronous JavaScript (ES6+) client synchronizes with backend state without full page refreshes.
* **Dynamic Wait Time Estimator**: Queue algorithm dynamically projects wait times based on active party sizes, table capacities, and historical turnover.
* **Responsive Guest Display**: Mobile-friendly guest check-in portal with priority handling and instant ticket allocation.
* **Relational Database Design**: Normalized MySQL schema modeling restaurant tables, reservations, and customer queue transitions.

---

## 📂 Project Structure

```text
hotel-waiting-management-system/
├── public/
│   ├── js/
│   │   ├── queue_manager.js        # Core ES6+ Queue interaction & async fetch
│   │   └── analytics_dashboard.js  # Waitlist KPIs & occupancy forecasting
│   ├── css/
│   │   └── styles.css              # Responsive styling & status badge themes
│   └── index.html                  # Guest portal and live queue board
├── api/
│   └── queue.php                   # REST endpoints for queue state & check-ins
├── sql/
│   └── schema.sql                  # MySQL tables, indexes, and foreign keys
└── README.md
```

---

## 👨‍💻 Author
**Himanshu Sheta**  
M.Sc. Applied Computer Science — Technische Hochschule Deggendorf  
LinkedIn: [linkedin.com/in/himanshu-sheta](https://www.linkedin.com/in/himanshu-sheta)
