# 🏨 Hotel & Restaurant Waiting Management System (BCA Capstone Project)

[![PHP](https://img.shields.io/badge/PHP-7.4%20%7C%208.x-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-Relational_DB-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6%2B-F7DF1E?logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-Responsive_UI-7952B3?logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)

A complete **Full-Stack Hospitality Management System** developed as the final graduation capstone project for the **Bachelor of Computer Applications (BCA)** at *Veer Narmad South Gujarat University*. 

The system streamlines restaurant table allocation, reduces customer waiting friction via dynamic queue tracking, supports banquet and hall reservations, and provides real-time administrative analytics.

---

## 📌 System Architecture & Portals

The application is structured into two core subsystems:

```text
hotel-waiting-management-system/
│
├── database/
│   └── hotel_waiting_management_db.sql   # Complete relational database dump (22+ tables)
│
├── src/
│   ├── waitingvooing/                    # Customer & Guest Facing Web Portal
│   │   ├── index.php                     # Live landing page & hotel search
│   │   ├── allhotel.php                  # Multi-hotel directory & area filtering
│   │   ├── hoteldetail.php               # Live table availability & queue status
│   │   ├── buypackage.php                # Subscription packages & billing
│   │   ├── otp.php                       # Two-factor phone/OTP guest verification
│   │   ├── feedback.php                  # Rating & review management
│   │   └── js/ & css/                    # Responsive UI assets
│   │
│   └── admin/                            # Hotel Management & Staff Dashboard
│       ├── dashboarddata.php             # Analytics: table turnover & wait trends
│       ├── registration.php              # Multi-tenant hotel onboarding
│       ├── form-validation.php           # Strict server-side input sanitation
│       └── js/ & img/                    # Admin panel charts & assets
```

---

## 🚀 Key Modules & Capabilities

### 1. 🍽️ Live Table & Queue Tracking (`hotelwaitinglist` & `hotelonlinewaiting`)
* Real-time waitlist registration allowing guests to reserve a spot online or as walk-ins.
* Automatic status state machine: `WAITING` ➔ `NOTIFIED` ➔ `SEATING` ➔ `COMPLETED`.
* Party size matching to physical table capacities to minimize empty seat dwell time.

### 2. 🏛️ Banquet & Hall Booking System (`hotelhall` & `banquetbooking`)
* Dedicated module for reserving celebration halls, conferences, and event banquets.
* Automated booking availability checks preventing double-booking across date ranges.

### 3. 🔐 Security & Verification (`otpverify` & `userregister`)
* Phone & email validation simulating OTP two-factor verification.
* Session management and hashed credential verification for hotel administrators and guests.

### 4. 📊 Multi-Tenant Hotel Administration (`admin/`)
* Complete back-office dashboard for hotel owners to configure table layouts, menu pricing, discount offers, and view customer satisfaction ratings.

---

## 🗄️ Relational Database Design (`database/`)

The system features **22 normalized MySQL relational tables** with foreign key constraints:
* **Core Waiting & Seating:** `hotelwaitinglist`, `hotelonlinewaiting`, `hoteltable`, `hotelhall`, `banquetbooking`
* **Hospitality Entities:** `hotelregister`, `hotelrate`, `hoteloffer`, `hotelreview`, `area`, `landmark`
* **Menu & Orders:** `menucategory`, `menuitem`
* **Security & Auth:** `userregister`, `otpverify`, `subscribe`

---

## 🛠️ Local Setup & Installation

### Prerequisites
* **PHP**: 7.4 or 8.x
* **Web Server**: Apache / Nginx (or XAMPP / WAMP / MAMP)
* **Database**: MySQL 5.7+ or MariaDB

### Steps
1. **Clone the repository:**
   ```bash
   git clone https://github.com/Himanshu-Sheta/hotel-waiting-management-system.git
   cd hotel-waiting-management-system
   ```

2. **Import Database:**
   * Open phpMyAdmin or your MySQL CLI:
   ```bash
   mysql -u root -p -e "CREATE DATABASE hotel_waiting_db;"
   mysql -u root -p hotel_waiting_db < database/hotel_waiting_management_db.sql
   ```

3. **Configure Database Connection:**
   * Edit `src/waitingvooing/conect.php` and `src/admin/conect.php`:
   ```php
   $con = mysqli_connect("localhost", "root", "", "hotel_waiting_db");
   ```

4. **Run using PHP built-in server:**
   ```bash
   cd src/waitingvooing
   php -S localhost:8080
   ```
   Access the customer portal at `http://localhost:8080` and the admin portal at `http://localhost:8080/../admin`.

---

## 👨‍💻 Academic Context & Author
* **Degree:** Bachelor of Computer Applications (BCA)
* **Institution:** Veer Narmad South Gujarat University, India
* **Graduation:** April 2020
* **Author:** **Himanshu Sheta** (Currently M.Sc. Applied Computer Science @ Technische Hochschule Deggendorf, Germany)  
  * [LinkedIn](https://www.linkedin.com/in/himanshu-sheta)  
  * [Live Portfolio](https://himanshusheta-portfolio.onrender.com)
