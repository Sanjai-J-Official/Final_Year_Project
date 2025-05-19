<!DOCTYPE html>
<html lang="en">
<head> <?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Admin Dashboard</title>
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
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --card-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            --hover-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
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
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
            min-height: 100vh;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Enhanced Header Styles */
        header {
            background: linear-gradient(135deg, var(--primary-color), #002244);
            color: var(--text-light);
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: bold;
            position: relative;
            overflow: hidden;
        }

        .logo i {
            color: var(--accent-color);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .header-actions {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .header-actions a {
            color: var(--text-light);
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .header-actions a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent-color);
            transition: var(--transition);
            transform: translateX(-50%);
        }

        .header-actions a:hover {
            color: var(--accent-color);
            background: rgba(255, 255, 255, 0.1);
        }

        .header-actions a:hover::after {
            width: 80%;
        }

        /* Enhanced Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            margin-top: 80px;
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        /* Enhanced Dashboard Card Styles */
        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            padding: 1.5rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            animation: scaleIn 0.5s ease-out;
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: 0.5s;
        }

        .dashboard-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--hover-shadow);
        }

        .dashboard-card:hover::before {
            left: 100%;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .card-icon::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            transform: rotate(45deg);
            transition: 0.5s;
        }

        .dashboard-card:hover .card-icon {
            transform: rotate(360deg);
        }

        .dashboard-card:hover .card-icon::after {
            left: 100%;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--primary-color);
            position: relative;
            padding-bottom: 0.5rem;
        }

        .card-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--accent-color);
            transition: var(--transition);
        }

        .dashboard-card:hover .card-title::after {
            width: 100%;
        }

        .card-content {
            color: #666;
            line-height: 1.8;
        }

        .card-content p {
            margin-bottom: 1.5rem;
            transition: var(--transition);
        }

        .dashboard-card:hover .card-content p {
            color: var(--primary-color);
        }

        /* Enhanced Action Button Styles */
        .action-button {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: var(--transition);
            margin-top: 1rem;
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .action-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: 0.5s;
        }

        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(12, 103, 239, 0.3);
        }

        .action-button:hover::before {
            left: 100%;
        }

        /* Enhanced Responsive Styles */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .header-actions {
                gap: 1rem;
            }

            .header-actions a {
                padding: 0.4rem 0.8rem;
                font-size: 0.9rem;
            }

            .card-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .card-title {
                font-size: 1.2rem;
            }
        }

        /* Enhanced Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--accent-color);
            border-radius: 4px;
            transition: var(--transition);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-color);
        }

        /* Enhanced Text Selection */
        ::selection {
            background: var(--accent-color);
            color: white;
        }

        /* Enhanced Focus States */
        :focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(12, 103, 239, 0.3);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <i class="fas fa-graduation-cap"></i>
            <span>Campus Mate</span>
        </div>
        <div class="header-actions">
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff" alt="Admin" class="w-8 h-8 rounded-full">
                    <span class="text-white">Admin</span>
                </div>
            </div>
            <a  href="<?php echo get_template_directory_uri(); ?>/job-messages.php"><i class="fas fa-bell"></i> Notifications</a>
            <a href="#"><i class="fas fa-user-circle"></i> Admin Profile</a>
            <a  href="<?php echo get_template_directory_uri(); ?>/admin-login.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Admin Dashboard</h1>
        
        <div class="dashboard-grid">
            <!-- Student Management Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h2 class="card-title">Student Management and Details</h2>
                </div>
                <div class="card-content">
                    <p>Manage student records, view profiles, and handle registrations.</p>
                    <a  href="<?php echo get_template_directory_uri(); ?>/departments.php" class="action-button">Details</a>
                </div>
            </div>

            <!-- Course Management Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h2 class="card-title">Course Management</h2>
                </div>
                <div class="card-content">
                    <p>Add, edit, or remove courses and manage course assignments.</p>
                    <a  href="<?php echo get_template_directory_uri(); ?>/course-management.php" class="action-button">Manage Courses</a>
                </div>
            </div>

            <!-- Job Recruiters Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h2 class="card-title">Job Recruiters</h2>
                </div>
                <div class="card-content">
                    <p>Communicate with recruiters and manage placement drives.</p>
                    <a  href="<?php echo get_template_directory_uri(); ?>/job-recruiters.php" class="action-button">View Recruiters</a>
                </div>
            </div>

            <!-- Results Management Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h2 class="card-title">Results Management</h2>
                </div>
                <div class="card-content">
                    <p>Manage and publish student results and academic performance.</p>
                    <a  href="<?php echo get_template_directory_uri(); ?>/results-management.php" class="action-button">Manage Results</a>
                </div>
            </div>

            <!-- Announcements Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h2 class="card-title">Announcements</h2>
                </div>
                <div class="card-content">
                    <p>Create and manage important announcements for students.</p>
                    <a  href="<?php echo get_template_directory_uri(); ?>/announcements.php" class="action-button">Post Announcement</a>
                </div>
            </div>

            <!-- Reports Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h2 class="card-title">Reports</h2>
                </div>
                <div class="card-content">
                    <p>Generate and view various administrative reports.</p>
                    <a  href="<?php echo get_template_directory_uri(); ?>/reports.php" class="action-button">View Reports</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>