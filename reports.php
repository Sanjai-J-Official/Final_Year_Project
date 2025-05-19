<!DOCTYPE html>
<html lang="en">
<head><?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Reports</title>
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

        .report-card {
            background: white;
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            overflow: hidden;
        }

        .report-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .report-header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
        }

        .report-content {
            padding: 1.5rem;
        }

        .report-footer {
            padding: 1rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .generate-btn {
            background-color: var(--accent-color);
            color: white;
        }

        .download-btn {
            background-color: #4CAF50;
            color: white;
        }

        .action-button:hover {
            opacity: 0.9;
        }

        .report-type-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .type-academic {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .type-financial {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .type-administrative {
            background-color: #fff3e0;
            color: #ef6c00;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-[#003366] text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-file-alt text-2xl"></i>
                <h1 class="text-2xl font-bold">Reports</h1>
            </div>
            <a  href="<?php echo get_template_directory_uri(); ?>/admin-dashboard.php" class="text-white hover:text-blue-200">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto p-6">
        <!-- Report Categories -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Academic Reports -->
            <div class="report-card">
                <div class="report-header">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold">Academic Reports</h2>
                            <p class="text-sm opacity-80">Student Performance Analysis</p>
                        </div>
                        <span class="report-type-badge type-academic">Academic</span>
                    </div>
                </div>
                <div class="report-content">
                    <ul class="space-y-2">
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Semester-wise Results</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Department Performance</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Attendance Reports</span>
                        </li>
                    </ul>
                </div>
                <div class="report-footer">
                    <div class="text-sm text-gray-500">
                        Last Generated: March 1, 2024
                    </div>
                    <div class="action-buttons">
                        <button class="action-button generate-btn">
                            <i class="fas fa-sync"></i> Generate
                        </button>
                        <button class="action-button download-btn">
                            <i class="fas fa-download"></i> Download
                        </button>
                    </div>
                </div>
            </div>

            <!-- Financial Reports -->
            <div class="report-card">
                <div class="report-header">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold">Financial Reports</h2>
                            <p class="text-sm opacity-80">Fee and Revenue Analysis</p>
                        </div>
                        <span class="report-type-badge type-financial">Financial</span>
                    </div>
                </div>
                <div class="report-content">
                    <ul class="space-y-2">
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Fee Collection Status</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Department Budgets</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Expense Reports</span>
                        </li>
                    </ul>
                </div>
                <div class="report-footer">
                    <div class="text-sm text-gray-500">
                        Last Generated: February 28, 2024
                    </div>
                    <div class="action-buttons">
                        <button class="action-button generate-btn">
                            <i class="fas fa-sync"></i> Generate
                        </button>
                        <button class="action-button download-btn">
                            <i class="fas fa-download"></i> Download
                        </button>
                    </div>
                </div>
            </div>

            <!-- Administrative Reports -->
            <div class="report-card">
                <div class="report-header">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold">Administrative Reports</h2>
                            <p class="text-sm opacity-80">Campus Operations Analysis</p>
                        </div>
                        <span class="report-type-badge type-administrative">Administrative</span>
                    </div>
                </div>
                <div class="report-content">
                    <ul class="space-y-2">
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Placement Statistics</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Faculty Workload</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Infrastructure Usage</span>
                        </li>
                    </ul>
                </div>
                <div class="report-footer">
                    <div class="text-sm text-gray-500">
                        Last Generated: February 25, 2024
                    </div>
                    <div class="action-buttons">
                        <button class="action-button generate-btn">
                            <i class="fas fa-sync"></i> Generate
                        </button>
                        <button class="action-button download-btn">
                            <i class="fas fa-download"></i> Download
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add event listeners for generate and download buttons
        document.querySelectorAll('.generate-btn').forEach(button => {
            button.addEventListener('click', function() {
                const reportCard = this.closest('.report-card');
                const reportTitle = reportCard.querySelector('h2').textContent;
                alert(`Generating report: ${reportTitle}`);
                // Add your report generation logic here
            });
        });

        document.querySelectorAll('.download-btn').forEach(button => {
            button.addEventListener('click', function() {
                const reportCard = this.closest('.report-card');
                const reportTitle = reportCard.querySelector('h2').textContent;
                alert(`Downloading report: ${reportTitle}`);
                // Add your download logic here
            });
        });
    </script>
</body>
</html>