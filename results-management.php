<!DOCTYPE html>
<html lang="en">
<head><?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Results Management</title>
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

        .result-card {
            background: white;
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            overflow: hidden;
        }

        .result-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .result-header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
        }

        .result-info {
            padding: 1.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .info-item {
            background: var(--bg-light);
            padding: 1rem;
            border-radius: 8px;
        }

        .info-label {
            font-size: 0.875rem;
            color: #666;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-weight: 600;
            color: var(--primary-color);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            padding: 1rem;
            border-top: 1px solid var(--border-color);
        }

        .action-button {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .publish-btn {
            background-color: #4CAF50;
            color: white;
        }

        .edit-btn {
            background-color: var(--accent-color);
            color: white;
        }

        .action-button:hover {
            opacity: 0.9;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-published {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-draft {
            background-color: #fff3e0;
            color: #ef6c00;
        }

        .filter-section {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-item label {
            font-size: 0.875rem;
            color: #666;
        }

        .filter-item select {
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            background-color: white;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-[#003366] text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-chart-bar text-2xl"></i>
                <h1 class="text-2xl font-bold">Results Management</h1>
            </div>
            <a  href="<?php echo get_template_directory_uri(); ?>/admin-dashboard.php" class="text-white hover:text-blue-200">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto p-6">
        <!-- Filters Section -->
        <div class="filter-section">
            <h2 class="text-xl font-bold mb-4">Filter Results</h2>
            <div class="filter-grid">
                <div class="filter-item">
                    <label for="department">Department</label>
                    <select id="department">
                        <option value="">All Departments</option>
                        <option value="cse">Computer Science</option>
                        <option value="ece">Electronics</option>
                        <option value="mech">Mechanical</option>
                        <option value="civil">Civil</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label for="semester">Semester</label>
                    <select id="semester">
                        <option value="">All Semesters</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label for="status">Status</label>
                    <select id="status">
                        <option value="">All Status</option>
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label for="year">Academic Year</label>
                    <select id="year">
                        <option value="">All Years</option>
                        <option value="2024">2023-2024</option>
                        <option value="2023">2022-2023</option>
                        <option value="2022">2021-2022</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Add New Result Button -->
        <div class="mb-6">
            <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center gap-2">
                <i class="fas fa-plus"></i> Add New Result
            </button>
        </div>

        <!-- Results Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Semester 1 Results -->
            <div class="result-card">
                <div class="result-header">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold">Semester 1</h2>
                            <p class="text-sm opacity-80">Computer Science Department</p>
                        </div>
                        <span class="status-badge status-published">Published</span>
                    </div>
                </div>
                <div class="result-info">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Total Students</div>
                            <div class="info-value">120</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Pass Percentage</div>
                            <div class="info-value">95%</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Average CGPA</div>
                            <div class="info-value">8.7</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Published Date</div>
                            <div class="info-value">Feb 15, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="action-button edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-button publish-btn">
                        <i class="fas fa-share"></i> Publish
                    </button>
                </div>
            </div>

            <!-- Semester 2 Results -->
            <div class="result-card">
                <div class="result-header">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold">Semester 2</h2>
                            <p class="text-sm opacity-80">Electronics Department</p>
                        </div>
                        <span class="status-badge status-draft">Draft</span>
                    </div>
                </div>
                <div class="result-info">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Total Students</div>
                            <div class="info-value">115</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Pass Percentage</div>
                            <div class="info-value">92%</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Average CGPA</div>
                            <div class="info-value">8.4</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Last Updated</div>
                            <div class="info-value">Mar 1, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="action-button edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-button publish-btn">
                        <i class="fas fa-share"></i> Publish
                    </button>
                </div>
            </div>

            <!-- Mid-Term Results -->
            <div class="result-card">
                <div class="result-header">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold">Mid-Term</h2>
                            <p class="text-sm opacity-80">Mechanical Department</p>
                        </div>
                        <span class="status-badge status-published">Published</span>
                    </div>
                </div>
                <div class="result-info">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Total Students</div>
                            <div class="info-value">105</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Pass Percentage</div>
                            <div class="info-value">88%</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Average Score</div>
                            <div class="info-value">75%</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Published Date</div>
                            <div class="info-value">Jan 20, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="action-button edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-button publish-btn">
                        <i class="fas fa-share"></i> Publish
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add event listeners for edit and publish buttons
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const resultCard = this.closest('.result-card');
                const resultName = resultCard.querySelector('h2').textContent;
                alert(`Edit results for ${resultName}`);
                // Add your edit logic here
            });
        });

        document.querySelectorAll('.publish-btn').forEach(button => {
            button.addEventListener('click', function() {
                const resultCard = this.closest('.result-card');
                const resultName = resultCard.querySelector('h2').textContent;
                if (confirm(`Are you sure you want to publish ${resultName} results?`)) {
                    // Add your publish logic here
                    alert(`Results for ${resultName} have been published`);
                }
            });
        });

        // Add New Result button handler
        document.querySelector('button:first-child').addEventListener('click', function() {
            alert('Add new result form will be opened');
            // Add your new result form logic here
        });

        // Filter change handlers
        document.querySelectorAll('select').forEach(select => {
            select.addEventListener('change', function() {
                // Add your filter logic here
                console.log('Filter changed:', this.id, this.value);
            });
        });
    </script>
</body>
</html>