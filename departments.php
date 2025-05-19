<!DOCTYPE html>
<html lang="en">
<head>
     <?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Departments</title>
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

        .department-card {
            background: white;
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            overflow: hidden;
        }

        .department-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .department-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .stat-item {
            background: var(--bg-light);
            padding: 0.75rem;
            border-radius: 8px;
            text-align: center;
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
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Our Departments</h2>
        
        <!-- Department Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- AI & DS Department -->
            <div class="department-card p-6">
                <div class="department-icon bg-blue-100 text-blue-600">
                    <i class="fas fa-brain"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">AI & DS</h3>
                <p class="text-gray-600 mb-4">Artificial Intelligence and Data Science</p>
                <div class="stats-grid">
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Total Students</p>
                        <p class="text-xl font-bold text-blue-600">120</p>
                    </div>
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Placement Rate</p>
                        <p class="text-xl font-bold text-green-600">85%</p>
                    </div>
                </div>
                <button class="mt-6 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300"
                    onclick="viewDepartmentDetails('AI & DS')">
                    View Details
                </button>
            </div>

            <!-- CSE Department -->
            <div class="department-card p-6">
                <div class="department-icon bg-green-100 text-green-600">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">CSE</h3>
                <p class="text-gray-600 mb-4">Computer Science Engineering</p>
                <div class="stats-grid">
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Total Students</p>
                        <p class="text-xl font-bold text-green-600">180</p>
                    </div>
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Placement Rate</p>
                        <p class="text-xl font-bold text-green-600">90%</p>
                    </div>
                </div>
                <button class="mt-6 w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300"
                    onclick="viewDepartmentDetails('CSE')">
                    View Details
                </button>
            </div>

            <!-- ECE Department -->
            <div class="department-card p-6">
                <div class="department-icon bg-purple-100 text-purple-600">
                    <i class="fas fa-microchip"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">ECE</h3>
                <p class="text-gray-600 mb-4">Electronics and Communication Engineering</p>
                <div class="stats-grid">
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Total Students</p>
                        <p class="text-xl font-bold text-purple-600">150</p>
                    </div>
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Placement Rate</p>
                        <p class="text-xl font-bold text-green-600">82%</p>
                    </div>
                </div>
                <button class="mt-6 w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition duration-300"
                    onclick="viewDepartmentDetails('ECE')">
                    View Details
                </button>
            </div>

            <!-- MECH Department -->
            <div class="department-card p-6">
                <div class="department-icon bg-red-100 text-red-600">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">MECH</h3>
                <p class="text-gray-600 mb-4">Mechanical Engineering</p>
                <div class="stats-grid">
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Total Students</p>
                        <p class="text-xl font-bold text-red-600">160</p>
                    </div>
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Placement Rate</p>
                        <p class="text-xl font-bold text-green-600">78%</p>
                    </div>
                </div>
                <button class="mt-6 w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition duration-300"
                    onclick="viewDepartmentDetails('MECH')">
                    View Details
                </button>
            </div>

            <!-- CIVIL Department -->
            <div class="department-card p-6">
                <div class="department-icon bg-yellow-100 text-yellow-600">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">CIVIL</h3>
                <p class="text-gray-600 mb-4">Civil Engineering</p>
                <div class="stats-grid">
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Total Students</p>
                        <p class="text-xl font-bold text-yellow-600">140</p>
                    </div>
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Placement Rate</p>
                        <p class="text-xl font-bold text-green-600">75%</p>
                    </div>
                </div>
                <button class="mt-6 w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 transition duration-300"
                    onclick="viewDepartmentDetails('CIVIL')">
                    View Details
                </button>
            </div>

            <!-- AGRI Department -->
            <div class="department-card p-6">
                <div class="department-icon bg-emerald-100 text-emerald-600">
                    <i class="fas fa-seedling"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">AGRI</h3>
                <p class="text-gray-600 mb-4">Agricultural Engineering</p>
                <div class="stats-grid">
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Total Students</p>
                        <p class="text-xl font-bold text-emerald-600">100</p>
                    </div>
                    <div class="stat-item">
                        <p class="text-sm text-gray-600">Placement Rate</p>
                        <p class="text-xl font-bold text-green-600">80%</p>
                    </div>
                </div>
                <button class="mt-6 w-full bg-emerald-600 text-white py-2 rounded-lg hover:bg-emerald-700 transition duration-300"
                    onclick="viewDepartmentDetails('AGRI')">
                    View Details
                </button>
            </div>
        </div>
    </main>

    <script>
        function viewDepartmentDetails(department) {
            // Store the selected department in session storage
            sessionStorage.setItem('selectedDepartment', department);
            // Redirect to student details page
            window.location.href = 'student-details.php';
        }
    </script>
</body>
</html>