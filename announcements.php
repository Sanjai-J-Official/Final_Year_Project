<!DOCTYPE html>
<html lang="en">
<head> <?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Announcements</title>
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

        .announcement-card {
            background: white;
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            overflow: hidden;
        }

        .announcement-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .announcement-header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
        }

        .announcement-content {
            padding: 1.5rem;
        }

        .announcement-footer {
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

        .edit-btn {
            background-color: var(--accent-color);
            color: white;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .action-button:hover {
            opacity: 0.9;
        }

        .priority-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .priority-high {
            background-color: #ffebee;
            color: #c62828;
        }

        .priority-medium {
            background-color: #fff3e0;
            color: #ef6c00;
        }

        .priority-low {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-[#003366] text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-bullhorn text-2xl"></i>
                <h1 class="text-2xl font-bold">Announcements</h1>
            </div>
            <a  href="<?php echo get_template_directory_uri(); ?>/admin-dashboard.php" class="text-white hover:text-blue-200">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto p-6">
        <!-- Add New Announcement Button -->
        <div class="mb-6">
            <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center gap-2">
                <i class="fas fa-plus"></i> Post New Announcement
            </button>
        </div>

        <!-- Announcements List -->
        <div class="space-y-6">
            <!-- High Priority Announcement -->
            <div class="announcement-card">
                <div class="announcement-header">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold">Campus Placement Drive</h2>
                            <p class="text-sm opacity-80">Important Notice for Final Year Students</p>
                        </div>
                        <span class="priority-badge priority-high">High Priority</span>
                    </div>
                </div>
                <div class="announcement-content">
                    <p class="text-gray-700">
                        Google will be conducting their campus placement drive on March 15, 2024. All final year students from CSE and AI & DS branches are eligible to participate. Please ensure your resumes are updated and submitted by March 10.
                    </p>
                </div>
                <div class="announcement-footer">
                    <div class="text-sm text-gray-500">
                        Posted on: March 1, 2024
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

            <!-- Medium Priority Announcement -->
            <div class="announcement-card">
                <div class="announcement-header">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold">Semester Exam Schedule</h2>
                            <p class="text-sm opacity-80">Updated Timetable for All Departments</p>
                        </div>
                        <span class="priority-badge priority-medium">Medium Priority</span>
                    </div>
                </div>
                <div class="announcement-content">
                    <p class="text-gray-700">
                        The semester examination schedule has been updated. Please check the student portal for the latest timetable. All students are required to carry their ID cards during the examinations.
                    </p>
                </div>
                <div class="announcement-footer">
                    <div class="text-sm text-gray-500">
                        Posted on: February 28, 2024
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

            <!-- Low Priority Announcement -->
            <div class="announcement-card">
                <div class="announcement-header">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold">Library Maintenance</h2>
                            <p class="text-sm opacity-80">Temporary Closure Notice</p>
                        </div>
                        <span class="priority-badge priority-low">Low Priority</span>
                    </div>
                </div>
                <div class="announcement-content">
                    <p class="text-gray-700">
                        The central library will be closed for maintenance from March 5 to March 7, 2024. Students are requested to plan their study schedules accordingly. Online resources will remain accessible during this period.
                    </p>
                </div>
                <div class="announcement-footer">
                    <div class="text-sm text-gray-500">
                        Posted on: February 25, 2024
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
    </div>

    <script>
        // Add event listeners for edit and delete buttons
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const announcementCard = this.closest('.announcement-card');
                const announcementTitle = announcementCard.querySelector('h2').textContent;
                alert(`Edit announcement: ${announcementTitle}`);
                // Add your edit logic here
            });
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const announcementCard = this.closest('.announcement-card');
                const announcementTitle = announcementCard.querySelector('h2').textContent;
                if (confirm(`Are you sure you want to delete the announcement: ${announcementTitle}?`)) {
                    // Add your delete logic here
                    announcementCard.remove();
                }
            });
        });

        // Add New Announcement button handler
        document.querySelector('button:first-child').addEventListener('click', function() {
            alert('New announcement form will be opened');
            // Add your new announcement form logic here
        });
    </script>
</body>
</html>