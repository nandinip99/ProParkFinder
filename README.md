# ProParkFinder

**ProParkFinder** is a smart parking management web application that enables users to search, book, and manage parking spaces in real time.  
It combines a responsive front-end, an interactive map (OpenLayers), and a secure PHP/MySQL backend to streamline the parking experience for both users and administrators.

## 📂 Project Structure
proparkfinder/
│
├── index.html # Home page with map & search
├── login.php # User login handling
├── logout.php # Logout endpoint
├── register.php # User registration handling
├── user_details.php # User info retrieval
├── parking_schema.sql # Database schema (safe version)
│
├── css/ # Stylesheets
├── js/ # JavaScript files
├── img/ # Images/icons
│
├── README.md # Project documentation
├── .gitignore # Ignored files list
└── LICENSE # MIT License


---

## 🛠 Tech Stack
- **Frontend:** HTML, CSS, JavaScript, Bootstrap, Font Awesome
- **Maps:** OpenLayers for location-based search
- **Backend:** PHP
- **Database:** MySQL / MariaDB

---

## ✨ Features
- 🔍 **Real-Time Availability** — Displays up-to-date parking slot info.
- 🗺 **Interactive Map** — Search for parking spots by location.
- 🔑 **User Management** — Registration, login, and secure session handling.
- 🧾 **Booking System** — Reserve parking with instant confirmation.
- 📱 **Responsive Design** — Works on desktop and mobile.

---

## 📦 Installation & Setup

1. **Clone the repository**
   bash
   git clone https://github.com/your-username/proparkfinder.git
   cd proparkfinder

2.Set up a local server
   Install PHP (>=7.4) & MySQL.
   Place the project in your server’s root (e.g., htdocs for XAMPP).

3. Create the database
   mysql -u root -p
   CREATE DATABASE proparkfinder;
   USE proparkfinder;
   SOURCE parking_schema.sql;

4. Configure database credentials
   Create a config.php file (not committed to GitHub):
   <?php
   $DB_HOST = 'localhost';
   $DB_USER = 'your_db_user';
   $DB_PASS = 'your_db_pass';
   $DB_NAME = 'proparkfinder';
   ?>

5.Add config.php to .gitignore to keep it private.
   Run the project
   Open http://localhost/proparkfinder/index.html in a browser.

🔒 Security & Privacy Notice
The original database dump (parking_customer_database.sql) contained real personal data. This repo includes only parking_schema.sql with no sensitive info.
Keep all credentials in config.php and never commit them.
For production, enable input validation, prepared statements, and secure session handling.

📄 License
This project is licensed under the MIT License — see the LICENSE file for details.

👤 Author
Nandini Pandey
GitHub Profile
LinkedIn Profile

⭐ Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss the changes you’d like to make.
---

✅ This `README.md` is **resume-ready** — it includes project purpose, tech stack, features, installation, security notes, and credits.  
If you want, I can now **bundle this README with a `.gitignore`, MIT License, and a sanitized `parking_schema.sql`** so you can upload everything to GitHub in one clean push.  

Do you want me to prepare that package?





   


