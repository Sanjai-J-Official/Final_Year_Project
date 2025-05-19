<!DOCTYPE html>
<html lang="en">
<head>
     <?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Course Management</title>
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
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            overflow: hidden;
        }

        .department-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .department-header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            padding: 1rem;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
            background: var(--bg-light);
            border-radius: 8px;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            padding: 1rem;
            border-top: 1px solid var(--border-color);
        }

        .action-button {
            flex: 1;
            padding: 0.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .action-button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-[#003366] text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-graduation-cap text-2xl"></i>
                <h1 class="text-2xl font-bold">Course Management</h1>
            </div>
            <a  href="<?php echo get_template_directory_uri(); ?>/admin-dashboard.php" class="text-white hover:text-blue-200">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto p-6">
        <!-- Add New Course Button -->
        <div class="mb-6">
            <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center gap-2">
                <i class="fas fa-plus"></i> Add New Course
            </button>
        </div>

        <!-- Departments Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- AI & DS Department -->
            <div class="department-card">
                <div class="department-header">
                    <h2 class="text-xl font-bold">AI & DS</h2>
                    <p class="text-sm opacity-80">Artificial Intelligence and Data Science</p>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value">120</div>
                        <div class="stat-label">Total Students</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">85%</div>
                        <div class="stat-label">Placement Rate</div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="action-button edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-button delete-btn">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            </div>

            <!-- CSE Department -->
            <div class="department-card">
                <div class="department-header">
                    <h2 class="text-xl font-bold">CSE</h2>
                    <p class="text-sm opacity-80">Computer Science Engineering</p>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value">180</div>
                        <div class="stat-label">Total Students</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">90%</div>
                        <div class="stat-label">Placement Rate</div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="action-button edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-button delete-btn">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            </div>

            <!-- ECE Department -->
            <div class="department-card">
                <div class="department-header">
                    <h2 class="text-xl font-bold">ECE</h2>
                    <p class="text-sm opacity-80">Electronics and Communication Engineering</p>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value">150</div>
                        <div class="stat-label">Total Students</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">82%</div>
                        <div class="stat-label">Placement Rate</div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="action-button edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-button delete-btn">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            </div>

            <!-- MECH Department -->
            <div class="department-card">
                <div class="department-header">
                    <h2 class="text-xl font-bold">MECH</h2>
                    <p class="text-sm opacity-80">Mechanical Engineering</p>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value">160</div>
                        <div class="stat-label">Total Students</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">78%</div>
                        <div class="stat-label">Placement Rate</div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="action-button edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-button delete-btn">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            </div>

            <!-- CIVIL Department -->
            <div class="department-card">
                <div class="department-header">
                    <h2 class="text-xl font-bold">CIVIL</h2>
                    <p class="text-sm opacity-80">Civil Engineering</p>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value">140</div>
                        <div class="stat-label">Total Students</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">75%</div>
                        <div class="stat-label">Placement Rate</div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="action-button edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-button delete-btn">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            </div>

            <!-- AGRI Department -->
            <div class="department-card">
                <div class="department-header">
                    <h2 class="text-xl font-bold">AGRI</h2>
                    <p class="text-sm opacity-80">Agricultural Engineering</p>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value">100</div>
                        <div class="stat-label">Total Students</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">80%</div>
                        <div class="stat-label">Placement Rate</div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="action-button edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-button delete-btn">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add event listeners for edit and delete buttons
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const departmentCard = this.closest('.department-card');
                const departmentName = departmentCard.querySelector('h2').textContent;
                alert(`Edit department: ${departmentName}`);
                // Add your edit logic here
            });
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const departmentCard = this.closest('.department-card');
                const departmentName = departmentCard.querySelector('h2').textContent;
                if (confirm(`Are you sure you want to delete ${departmentName}?`)) {
                    // Add your delete logic here
                    departmentCard.remove();
                }
            });
        });

        // Add New Course button handler
        document.querySelector('button:first-child').addEventListener('click', function() {
            alert('Add new course functionality will be implemented here');
            // Add your new course logic here
        });
    </script>
</body>
</html>