# 🕹️ Tic-Tac-Toe (Tris) Web App: Full-Stack Edition

A professional, collaborative web-based Tic-Tac-Toe game. Originally a front-end prototype, this project has evolved into a dynamic Full-Stack application using **PHP** and **SQL** to manage user authentication, persistent game states, and match history.

---

## 👥 Meet the Team

With the transition to a server-side architecture, the team has been streamlined to focus on core development, database management, and system flow.

### **1. Giovanni — Project Manager & Lead Backend Developer**

**Management & Logic Lead**

* **Technical Supervision:** Ensures the codebase follows clean code practices and maintains a cohesive architecture between PHP and SQL.
* **Game Engine (PHP):** Developed the server-side logic for move validation, win conditions, and draw detection.
* **Integration:** Responsible for merging the authentication system with the game loop and final end-to-end debugging.

### **2. Gaia — Lead Designer & Database Architect**

**UI/UX & Data Infrastructure**

* **Database Setup:** Designed the MySQL schema for users, match results, and active game sessions.
* **Authentication (Login):** Implemented the full login system, including secure user entry and session management.
* **Visual Identity:** Created the aesthetic identity (palette, fonts, layout) and ensures the UI remains responsive across all devices.

### **3. Rolando — Flow & Navigation Specialist**

**Site Architecture & Data Presentation**

* **Navigation Logic:** Managed the logical connection between all screens (Login → Game → Results) using PHP state management.
* **Stats & Results:** Developed the logic to retrieve match history and player statistics from the database to display them dynamically.
* **Site Architecture:** Ensures fluid transitions while maintaining the game state if a user refreshes the page.

---

## 📂 Application Structure

```text
/tic-tac-toe-project
│
├── /config                  # Sensitive backend configurations
│   └── connection.php       # Database connection logic
│
├── /public                  # Files accessible to the browser
│   ├── /assets              # Images (index.png, gioco.png, register.png)
│   ├── /css                 # All stylesheets (style.css, gioco.css, register.css)
│   └── /js                  # Client-side logic (index.js, gioco.js, register.js)
│
├── /src                     # Core PHP logic
│   ├── login_process.php    # Handles login validation
│   ├── register_process.php # Handles database insertion & password hashing
│   └── game_logic.php       # Win/draw logic
│
├── /database                # Database scripts
│   └── tictactoe.sql        # Database schema
│
├── /docs                    # Project documentation
│   └── documentazione.docx
│
├── index.php                # Main Entry Point (Login Page)
├── register.php             # Main Registration Page (The Form)
├── gioco.php                # Main Game Page
├── README.md                
└── LICENSE

```

1. **Welcome & Login (Gaia):** User entry point featuring the database-connected login system.
2. **Game Board (Giovanni):** The interactive grid where moves are validated and processed by the server.
3. **Results & History (Rolando):** A dynamic summary of match outcomes and global player statistics.
4. **Global Elements:** Consistent navigation and branding across all views.

---

## 🛠️ Tech Stack

* **HTML5 & CSS3:** For a responsive, accessible, and modular interface.
* **PHP 8.x:** Handles server-side game logic and secure session management.
* **MySQL/SQL:** Provides data persistence for users and match history.
* **JavaScript (ES6):** Enhances the user experience with seamless front-end transitions.
