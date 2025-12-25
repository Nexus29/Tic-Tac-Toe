# Tic-Tac-Toe (Tris) Web Project

A professional, collaborative web-based Tic-Tac-Toe game. This project focuses on clean architecture, seamless transitions between screens, and a cohesive user experience.

## 👥 Team Roles & Detailed Responsibilities

### **1. Giovanni — Project Manager & Lead Developer**

**Management Responsibilities:**

* **Initial Organization:** Supervised the creation of the shared workspace, collaborative documentation, and task assignment.
* **Coordination & Control:** Maintains the "Decision and Progress History" and ensures all deadlines are met.
* **Workflow Oversight:** Ensures all team members stay updated on collective progress, especially during remote work phases.

**Technical Responsibilities:**

* **Technical Supervision:** Guarantees that all components (HTML, CSS, JS) follow established naming conventions, accessibility standards, and clean code practices.
* **Core Logic:** Developed global JavaScript functions (e.g., `switchScreen()`) and managed global states.
* **Integration & Debugging:** Primary lead for merging files, resolving conflicts, and final end-to-end debugging.

### **2. Gaia — Front-end Specialist & Lead Designer**

**Design Responsibilities:**

* **UX/UI & Wireframing:** Responsible for the User Experience and Interface study. Produced sketches and mockups for the entire application.
* **Global Style (CSS):** Defined the aesthetic identity (color palette, fonts, layout) and created modular, responsive CSS for mobile and tablet compatibility.

**Technical Responsibilities:**

* **Welcome Screen (UI):** Designed and implemented the styling for the player name input interface.
* **Interactive Elements:** Created the functions/events for the "Start" button interaction.
* **Frontend Support:** Provided guidance to other members to ensure design consistency across all pages.

### **3. Rolando — Developer (Flow & Homepage)**

**Technical Responsibilities:**

* **Homepage Structure:** Implemented the semantic HTML for the Welcome Screen in coordination with Gaia.
* **Program Flow Management:** Primary lead for the logical connection between all screens (Welcome → Game → Results → Credits).
* **Navigation Logic:** Implemented JavaScript functions to manage section visibility and ensured player names are correctly passed to the game engine.

**Architectural Responsibilities:**

* **Site Architecture:** Ensures fluid transitions while maintaining game state.
* **Flow Coordination:** Collaborated with Gaia and Bianca to define IDs and classes used for toggling screen views.

### **4. Muharem — Developer (Results Screen)**

**Technical Responsibilities:**

* **Results Logic:** Developed the logic to receive game outcomes (Win/Draw) and display them dynamically.
* **UI Implementation:** Created the HTML/CSS for the summary screen, showing the winner's name and match statistics.
* **History Management:** (In collaboration with the team) Managed the results array/history shown on this page.

**Navigation Responsibilities:**

* **End-Game Connection:** Ensured a seamless transition from the game logic to the results view.
* **Navigational Links:** Implemented transitions to return to the Homepage or proceed to the Credits page.

### **5. Bianca — Developer (Credits & Quality Assurance)**

**Technical Responsibilities:**

* **Credits Page Development:** Designed and implemented the HTML/CSS for the "Credits" screen, ensuring it includes all team information and matches the global design.
* **Global Footer Creation:** Responsible for the design and implementation of a consistent **Footer** across every page of the website, ensuring uniform branding and navigation links.
* **Page Interconnectivity:** Collaborated with Rolando to implement JavaScript transitions for entering/exiting the Credits page.

**Quality Control (Testing):**

* **Functional Testing:** Verified the accuracy of game logic (win conditions, draws, turn management).
* **Flow Testing:** Ensured the transition between all four screens is bug-free and smooth.
* **Refinement & Debugging:** Responsible for identifying issues and collaborating with the Lead Developer to resolve conflicts before final delivery.

---

## 📂 Application Structure

1. **Screen 1 (Welcome):** Player login and entry point.
2. **Screen 2 (Game):** The interactive Tic-Tac-Toe board.
3. **Screen 3 (Results):** Victory/Draw messages and match reset options.
4. **Screen 4 (Credits):** Team recognition, animations, and project info.
5. **Global Elements:** Consistent **Footer** on all pages (developed by Bianca).

## 🛠️ Tech Stack

* **HTML5:** Semantic structure and accessibility.
* **CSS3:** Modular styling and responsive design.
* **JavaScript (ES6):** State management, DOM manipulation, and game logic.
