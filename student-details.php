<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Student Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #003366;
            --accent-color: #0c67ef;
            --text-light: #ffffff;
            --text-dark: #333333;
            --bg-light: #f5f7fa;
            --border-color: #e1e5eb;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--bg-light);
        }

        .student-card {
            background: white;
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .student-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .search-container {
            position: relative;
        }

        .search-container i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .search-input {
            padding-left: 2.5rem;
        }

        .filter-dropdown {
            position: relative;
        }

        .filter-dropdown select {
            appearance: none;
            padding-right: 2rem;
        }

        .filter-dropdown::after {
            content: '\f107';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-graduation-cap text-2xl"></i>
                <h1 class="text-2xl font-bold">Campus Mate</h1>
            </div>
            <nav>
                <a  href="<?php echo get_template_directory_uri(); ?>/admin-dashboard.php" class="hover:text-blue-200">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Student Details</h2>
            <div class="flex space-x-4">
                <!-- Search Bar -->
                <div class="search-container">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Search students..." 
                        class="search-input w-64 px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <!-- Filter Dropdown -->
                <div class="filter-dropdown">
                    <select id="departmentFilter" class="px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="">All Departments</option>
                        <option value="AI & DS">AI & DS</option>
                        <option value="CSE">CSE</option>
                        <option value="ISE">ISE</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Student Grid -->
        <div id="studentGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Student cards will be dynamically inserted here -->
        </div>
    </main>

    <script>
        // Fetch and display student data
        async function loadStudentData() {
            try {
                const response = await fetch('student database.json');
                const students = await response.json();
                displayStudents(students);
                setupEventListeners(students);
            } catch (error) {
                console.error('Error loading student data:', error);
            }
        }

        // Display students in the grid
        function displayStudents(students) {
            const grid = document.getElementById('studentGrid');
            grid.innerHTML = '';

            students.forEach(student => {
                const card = createStudentCard(student);
                grid.appendChild(card);
            });
        }

        // Create a student card element
        function createStudentCard(student) {
            const card = document.createElement('div');
            card.className = 'student-card p-6';
            card.innerHTML = `
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">${student.NAME}</h3>
                        <p class="text-gray-600">${student.DEPT}</p>
                    </div>
                </div>
                <div class="space-y-2">
                    <p><span class="font-semibold">Register No:</span> ${student["REGISTER NO"]}</p>
                    <p><span class="font-semibold">Email:</span> ${student["MAIL ID (College mail)"] || 'N/A'}</p>
                    <p><span class="font-semibold">Phone:</span> ${student["PHONE NO"] || 'N/A'}</p>
                    <p><span class="font-semibold">10th %:</span> ${student["10%"] || 'N/A'}</p>
                    <p><span class="font-semibold">12th %:</span> ${student["12%"] || 'N/A'}</p>
                </div>
                <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300"
                    onclick="viewStudentDetails('${student["REGISTER NO"]}')">
                    View Full Details
                </button>
            `;
            return card;
        }

        // Setup event listeners for search and filter
        function setupEventListeners(students) {
            const searchInput = document.getElementById('searchInput');
            const departmentFilter = document.getElementById('departmentFilter');

            searchInput.addEventListener('input', () => filterStudents(students));
            departmentFilter.addEventListener('change', () => filterStudents(students));
        }

        // Filter students based on search and department
        function filterStudents(students) {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const department = document.getElementById('departmentFilter').value;

            const filteredStudents = students.filter(student => {
                const matchesSearch = 
                    student.NAME.toLowerCase().includes(searchTerm) ||
                    student["REGISTER NO"].toString().includes(searchTerm) ||
                    (student["MAIL ID (College mail)"] && student["MAIL ID (College mail)"].toLowerCase().includes(searchTerm));
                
                const matchesDepartment = !department || student.DEPT === department;

                return matchesSearch && matchesDepartment;
            });

            displayStudents(filteredStudents);
        }

        // View detailed student information
        function viewStudentDetails(registerNo) {
            // Store the register number in session storage
            sessionStorage.setItem('selectedStudent', registerNo);
            // Redirect to a detailed view page (you can create this later)
            alert(`Viewing details for student with Register No: ${registerNo}`);
        }

        // Load student data when the page loads
        document.addEventListener('DOMContentLoaded', loadStudentData);
    </script>
</body>
</html> 