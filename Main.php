<!DOCTYPE html>
<html lang="en">
<head> <?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Your Academic Gateway</title>
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #003366;
            --accent-color: #0c67ef;
            --text-light: #ffffff;
            --text-dark: #333333;
            --overlay-color: rgba(0, 51, 102, 0.7);
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
            overflow-x: hidden;
        }

        /* Header Styles */
        header {
            background-color: var(--primary-color);
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
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .logo i {
            color: var(--accent-color);
        }

        nav {
            position: relative;
        }

        nav ul {
            display: none;
            position: absolute;
            right: 100%;
            top: 50%;
            transform: translateY(-50%);
            list-style: none;
            background-color: var(--primary-color);
            padding: 1rem;
            border-radius: 5px;
            white-space: nowrap;
        }

        nav:hover ul {
            display: flex;
            gap: 2rem;
        }

        nav a {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        nav a:hover {
            color: var(--accent-color);
        }

        .menu-toggle {
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-light);
            transition: var(--transition);
        }

        .menu-toggle:hover {
            color: var(--accent-color);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background-image: url('https://dsce.ac.in/wp-content/uploads/2024/02/314A2824_2-scaled.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 1rem;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--overlay-color);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            color: var(--text-light);
            background-color: rgba(0, 0, 0, 0.3);
            padding: 2rem;
            border-radius: 10px;
            backdrop-filter: blur(5px);
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        /* How It Works Section */
        .how-it-works {
            padding: 5rem 2rem;
            background-color: #ffffff;
        }

        .how-it-works-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .how-it-works-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .steps-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .step-card {
            text-align: center;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: var(--shadow);
            background-color: #f8f9fa;
            transition: var(--transition);
        }

        .step-card:hover {
            transform: translateY(-5px);
        }

        .step-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .step-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .step-description {
            color: #666;
        }

        /* Features Section */
        .features {
            padding: 5rem 2rem;
            background-color: #f5f5f5;
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .features-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .feature-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .feature-description {
            color: #666;
        }

        /* Footer */
        footer {
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 3rem 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: var(--accent-color);
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: var(--text-light);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-section a:hover {
            color: var(--accent-color);
        }

        .copyright {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            nav ul {
                position: fixed;
                top: 70px;
                right: -100%;
                width: 100%;
                height: calc(100vh - 70px);
                background-color: var(--primary-color);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                transition: var(--transition);
                z-index: 999;
            }

            nav:hover ul {
                right: 0;
                display: flex;
                flex-direction: column;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }

            .logo {
                font-size: 1.2rem;
            }
        }

        /* Add these styles to your existing CSS */
        .notification-link {
            position: relative;
            transition: transform 0.2s ease;
        }

        .notification-link:hover {
            transform: scale(1.05);
        }

        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #ff4444;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
            min-width: 18px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .notification-panel {
            position: absolute;
            top: 100%;
            right: 0;
            width: 400px;
            max-height: 500px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            overflow: hidden;
            transform-origin: top right;
            animation: slideIn 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #eee;
            background-color: #f8f9fa;
        }

        .notification-header h3 {
            margin: 0;
            color: var(--primary-color);
            font-size: 1.1rem;
            font-weight: 600;
        }

        .clear-all {
            color: var(--accent-color);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .clear-all:hover {
            background-color: rgba(12, 103, 239, 0.1);
        }

        .notification-list {
            max-height: 400px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: var(--accent-color) #f0f0f0;
        }

        .notification-list::-webkit-scrollbar {
            width: 6px;
        }

        .notification-list::-webkit-scrollbar-track {
            background: #f0f0f0;
        }

        .notification-list::-webkit-scrollbar-thumb {
            background-color: var(--accent-color);
            border-radius: 3px;
        }

        .notification-item {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #eee;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .notification-item:hover {
            background-color: #f8f9fa;
            transform: translateX(4px);
        }

        .notification-item.unread {
            background-color: #f0f7ff;
        }

        .notification-item.unread::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: var(--accent-color);
        }

        .notification-item .flex {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
        }

        .notification-item .font-semibold {
            color: var(--primary-color);
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .notification-item .text-gray-600 {
            color: #4a5568;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }

        .notification-item .text-sm {
            font-size: 0.875rem;
            color: #718096;
            margin-bottom: 0.25rem;
        }

        .notification-item .text-xs {
            font-size: 0.75rem;
            color: #a0aec0;
        }

        .notification-item button {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .notification-item button:hover {
            background-color: rgba(12, 103, 239, 0.1);
        }

        .hidden {
            display: none;
        }

        /* Empty state styling */
        .notification-item:empty::after {
            content: 'No new notifications';
            display: block;
            text-align: center;
            color: #a0aec0;
            padding: 2rem 0;
        }

        /* Loading state */
        .notification-item.loading {
            text-align: center;
            padding: 2rem 0;
            color: #a0aec0;
        }

        .notification-item.loading::after {
            content: 'Loading...';
            animation: loading 1s infinite;
        }

        @keyframes loading {
            0% { content: 'Loading.'; }
            33% { content: 'Loading..'; }
            66% { content: 'Loading...'; }
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }

        .modal-header h3 {
            color: var(--primary-color);
            margin: 0;
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
            transition: var(--transition);
        }

        .close-modal:hover {
            color: var(--accent-color);
        }

        .modal-body {
            color: var(--text-dark);
        }

        .modal-body h4 {
            color: var(--primary-color);
            margin: 1rem 0;
        }

        .modal-body p {
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .modal-body ul {
            list-style-type: disc;
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .modal-body li {
            margin-bottom: 0.5rem;
        }

        /* Enhanced Animation Styles */
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

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }

        /* Enhanced Card Styles */
        .step-card, .feature-card {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.1);
            background: linear-gradient(145deg, #ffffff, #f5f5f5);
        }

        .step-card:hover, .feature-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--accent-color);
        }

        .step-card::before, .feature-card::before {
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

        .step-card:hover::before, .feature-card:hover::before {
            left: 100%;
        }

        /* Enhanced Button Styles */
        .clear-all, .close-modal {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .clear-all::after, .close-modal::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--accent-color);
            z-index: -2;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .clear-all:hover::after, .close-modal:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        /* Enhanced Header Styles */
        header {
            background: linear-gradient(135deg, var(--primary-color), #002244);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        header:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .logo {
            position: relative;
            overflow: hidden;
        }

        .logo i {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        /* Enhanced Hero Section */
        .hero-content {
            animation: fadeInUp 1s ease-out;
            background: linear-gradient(
                33deg,
                rgba(15, 103, 232, 0.8),
                rgba(12, 103, 239, 0.8)
            );
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-content h1 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: slideInRight 1s ease-out;
        }

        .hero-content p {
            animation: fadeInUp 1s ease-out 0.3s backwards;
        }

        /* Enhanced Navigation */
        nav a {
            position: relative;
            padding: 0.5rem 1rem;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: var(--accent-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        nav a:hover::after {
            width: 100%;
        }

        /* Enhanced Modal Styles */
        .modal-content {
            animation: scaleIn 0.3s ease-out;
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .modal.active {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Enhanced Notification Panel */
        .notification-panel {
            animation: slideInRight 0.3s ease-out;
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .notification-item {
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .notification-item:hover {
            border-left-color: var(--accent-color);
            background: linear-gradient(90deg, rgba(12, 103, 239, 0.1), transparent);
        }

        /* Enhanced Footer Styles */
        footer {
            background: linear-gradient(135deg, var(--primary-color), #002244);
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        .footer-section a {
            position: relative;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .footer-section a:hover {
            transform: translateX(5px);
        }

        /* Loading Animation */
        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--accent-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
            transition: all 0.3s ease;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-color);
        }

        /* Enhanced Form Elements */
        input, textarea, select {
            transition: all 0.3s ease;
            border: 2px solid transparent;
            background: #f8f9fa;
            border-radius: 4px;
            padding: 0.5rem;
        }

        input:focus, textarea:focus, select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(12, 103, 239, 0.1);
            outline: none;
        }

        /* Enhanced Image Styles */
        img {
            transition: all 0.3s ease;
        }

        img:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
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

        /* Enhanced Mobile Menu */
        @media (max-width: 768px) {
            .menu-toggle {
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.1); }
                100% { transform: scale(1); }
            }

            nav ul {
                animation: slideInRight 0.3s ease-out;
            }
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
        <nav>
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
            <ul id="nav-menu">
                <li><a href="#" data-modal="academics"><i class="fas fa-book"></i> Academics</a></li>
                <li><a href="#" data-modal="jobs"><i class="fas fa-briefcase"></i> Jobs</a></li>
                <li>
                    <a href="#" class="notification-link">
                        <i class="fas fa-bell"></i> Notifications
                        <span id="notificationCount" class="notification-badge" style="display: none;">0</span>
                    </a>
                    <div id="notificationPanel" class="notification-panel hidden">
                        <div class="notification-header">
                            <h3>Notifications</h3>
                            <button onclick="clearAllNotifications()" class="clear-all">Clear All</button>
                        </div>
                        <div id="notificationList" class="notification-list">
                            <!-- Notifications will be populated here -->
                        </div>
                    </div>
                </li>
                <li><a href="#" data-modal="career-path"><i class="fas fa-road"></i> Career Path</a></li>
                <li><a  href="<?php echo get_template_directory_uri(); ?>/profile.php"><i class="fas fa-user"></i> Profile</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Campus Mate</h1>
            <p>CampusMate is an advanced college placement management system designed to facilitate, streamline, and modernize the placement process at Dhanalakshmi Srinivasan College of Engineering. It centralizes the communication between students, the Training and Placement Cell, and prospective employers while providing valuable analytical insights to improve placement outcomes.</p>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="how-it-works-container">
            <div class="how-it-works-title">
                <h2>What to do?</h2>
            </div>
            <div class="steps-container">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Create Your Profile</h3>
                    <p class="step-description">Register and build your comprehensive student profile with academic details, skills, and achievements.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Explore Opportunities</h3>
                    <p class="step-description">Browse through available job postings, internships, and placement drives from partner companies.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Apply & Track</h3>
                    <p class="step-description">Apply to suitable positions and track your application status in real-time.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Get Prepared</h3>
                    <p class="step-description">Access resources, attend training sessions, and prepare for interviews.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-container">
            <div class="features-title">
                <h2>Key Features</h2>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fas fa-users feature-icon"></i>
                    <h3 class="feature-title">Student Profile Management</h3>
                    <p class="feature-description">Comprehensive student profiles with academic records, skills, and achievements for better placement matching.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-building feature-icon"></i>
                    <h3 class="feature-title">Company Database</h3>
                    <p class="feature-description">Extensive database of partner companies with detailed information about job opportunities and requirements.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-chart-line feature-icon"></i>
                    <h3 class="feature-title">Analytics Dashboard</h3>
                    <p class="feature-description">Real-time analytics and insights for tracking placement statistics and performance metrics.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-calendar-alt feature-icon"></i>
                    <h3 class="feature-title">Event Management</h3>
                    <p class="feature-description">Streamlined scheduling of placement drives, interviews, and training sessions.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-comments feature-icon"></i>
                    <h3 class="feature-title">Communication Hub</h3>
                    <p class="feature-description">Integrated messaging system for seamless communication between students, faculty, and employers.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-file-alt feature-icon"></i>
                    <h3 class="feature-title">Document Management</h3>
                    <p class="feature-description">Secure storage and management of resumes, certificates, and other important documents.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#" data-modal="contact">Contact</a></li>
                    <li><a href="#" data-modal="faqs">FAQs</a></li>
                    <li><a href="#" data-modal="privacy">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Resources</h3>
                <ul>
                    <li><a href="#" data-modal="calendar">Academic Calendar</a></li>
                    <li><a href="#" data-modal="library">Library</a></li>
                    <li><a href="#" data-modal="handbook">Student Handbook</a></li>
                    <li><a href="#" data-modal="career">Career Services</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Connect With Us</h3>
                <ul>
                    <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025 Campus Mate. All rights reserved.</p>
        </div>
    </footer>

    <!-- Modal Templates -->
    <div id="contactModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Contact Us</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Training and Placement Cell</h4>
                <p>Dhanalakshmi Srinivasan College of Engineering</p>
                <p>Email: placement@dsce.ac.in</p>
                <p>Phone: +91-XXXXXXXXXX</p>
                <p>Address: Coimbatore, Tamil Nadu, India</p>
            </div>
        </div>
    </div>

    <div id="faqsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Frequently Asked Questions</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>General Questions</h4>
                <ul>
                    <li>How do I register for campus placements?</li>
                    <li>What documents do I need to submit?</li>
                    <li>How can I update my profile?</li>
                    <li>What is the placement process?</li>
                </ul>
                <h4>Technical Support</h4>
                <ul>
                    <li>How do I reset my password?</li>
                    <li>How can I report technical issues?</li>
                    <li>Is there a mobile app available?</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="privacyModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Privacy Policy</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Information Collection</h4>
                <p>We collect information that you provide directly to us, including personal and academic details.</p>
                <h4>Information Usage</h4>
                <p>Your information is used to facilitate the placement process and connect you with potential employers.</p>
                <h4>Data Protection</h4>
                <p>We implement appropriate security measures to protect your personal information.</p>
            </div>
        </div>
    </div>

    <div id="calendarModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Academic Calendar</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Current Semester Schedule</h4>
                <ul>
                    <li>Semester Start: August 2024</li>
                    <li>Mid-Semester Exams: October 2024</li>
                    <li>End Semester Exams: December 2024</li>
                    <li>Placement Drive: January 2025</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="libraryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Library Resources</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Available Resources</h4>
                <ul>
                    <li>Technical Books</li>
                    <li>E-Journals</li>
                    <li>Research Papers</li>
                    <li>Online Databases</li>
                </ul>
                <h4>Working Hours</h4>
                <p>Monday - Friday: 8:00 AM - 8:00 PM</p>
                <p>Saturday: 9:00 AM - 5:00 PM</p>
            </div>
        </div>
    </div>

    <div id="handbookModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Student Handbook</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Important Guidelines</h4>
                <ul>
                    <li>Academic Policies</li>
                    <li>Code of Conduct</li>
                    <li>Attendance Requirements</li>
                    <li>Examination Rules</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="academicsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Academics</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Academic Programs</h4>
                <ul>
                    <li>Artificil intelligence & Data Science</li>
                    <li>Agricultural Engineering</li>
                    <li>Computer Science Engineering</li>
                    <li>Electronics & Communication</li>
                    <li>Electrical & Electronics</li>
                    <li>Mechanical Engineering</li>
                    <li>Civil Engineering</li>
                </ul>
                <h4>Academic Resources</h4>
                <ul>
                    <li>Course Materials</li>
                    <li>Assignment Submission</li>
                    <li>Exam Schedule</li>
                    <li>Results Portal</li>
                </ul>
                <h4>Academic Calendar</h4>
                <p>Stay updated with important academic dates and deadlines.</p>
            </div>
        </div>
    </div>

    <div id="jobsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Job Opportunities</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Current Openings</h4>
                <ul>
                    <li>Software Developer - TCS</li>
                    <li>Data Analyst - Infosys</li>
                    <li>Network Engineer - Wipro</li>
                    <li>System Administrator - HCL</li>
                </ul>
                <h4>Upcoming Drives</h4>
                <ul>
                    <li>Amazon - January 15, 2025</li>
                    <li>Microsoft - January 20, 2025</li>
                    <li>Google - February 1, 2025</li>
                </ul>
                <h4>Application Status</h4>
                <p>Track your job applications and interview schedules here.</p>
            </div>
        </div>
    </div>

    <div id="career-pathModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Career Path</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Career Development</h4>
                <ul>
                    <li>Skill Assessment</li>
                    <li>Career Counseling</li>
                    <li>Resume Building</li>
                    <li>Interview Preparation</li>
                </ul>
                <h4>Industry Trends</h4>
                <ul>
                    <li>Emerging Technologies</li>
                    <li>Job Market Analysis</li>
                    <li>Salary Trends</li>
                    <li>Industry Requirements</li>
                </ul>
                <h4>Success Stories</h4>
                <p>Read about successful alumni and their career journeys.</p>
            </div>
        </div>
    </div>

    <div id="careerModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Career Services</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Training Programs</h4>
                <ul>
                    <li>Technical Skills Development</li>
                    <li>Soft Skills Training</li>
                    <li>Communication Workshops</li>
                    <li>Leadership Development</li>
                </ul>
                <h4>Placement Support</h4>
                <ul>
                    <li>Resume Building Workshops</li>
                    <li>Mock Interviews</li>
                    <li>Group Discussion Practice</li>
                    <li>Aptitude Test Preparation</li>
                </ul>
                <h4>Industry Connect</h4>
                <ul>
                    <li>Industry Expert Sessions</li>
                    <li>Company Visits</li>
                    <li>Internship Opportunities</li>
                    <li>Networking Events</li>
                </ul>
                <h4>Career Counseling</h4>
                <p>One-on-one career guidance sessions with experienced counselors to help you plan your career path.</p>
            </div>
        </div>
    </div>

    <script>
        let notificationUpdateInterval = null;
        let isHovering = false;
        let isPanelOpen = false;

        // Function to get server time offset
        async function getServerTimeOffset() {
            try {
                const response = await fetch('data/jobs.json');
                const jobs = await response.json();
                if (jobs.length > 0) {
                    // Get the most recent job's timestamp
                    const serverTime = new Date(jobs[0].postedDate).getTime();
                    const clientTime = Date.now();
                    return serverTime - clientTime;
                }
                return 0;
            } catch (error) {
                console.error('Error getting server time offset:', error);
                return 0;
            }
        }

        // Function to check for new notifications
        async function checkNewNotifications() {
            try {
                const response = await fetch('data/jobs.json');
                if (!response.ok) {
                    throw new Error('Failed to fetch jobs');
                }
                
                const jobs = await response.json();
                const notificationCount = document.getElementById('notificationCount');
                
                if (!notificationCount) return;

                // Get the time offset between server and client
                const timeOffset = await getServerTimeOffset();

                // Get the last checked time from localStorage or set to 24 hours ago
                let lastChecked = localStorage.getItem('lastJobCheck');
                if (!lastChecked) {
                    const yesterday = new Date();
                    yesterday.setHours(yesterday.getHours() - 24);
                    lastChecked = yesterday.getTime().toString();
                    localStorage.setItem('lastJobCheck', lastChecked);
                }
                
                // Filter jobs posted within the last 24 hours
                const newJobs = jobs.filter(job => {
                    const jobDate = new Date(job.postedDate).getTime();
                    const adjustedJobDate = jobDate - timeOffset;
                    return adjustedJobDate > parseInt(lastChecked);
                });
                
                // Update notification count
                notificationCount.textContent = newJobs.length;
                notificationCount.style.display = newJobs.length > 0 ? 'block' : 'none';
                
            } catch (error) {
                console.error('Error checking notifications:', error);
            }
        }

        // Function to load notifications
        async function loadNotifications() {
            if (!isPanelOpen) return; // Only load if panel is open
            
            console.log('Loading notifications...');
            try {
                const response = await fetch('data/jobs.json');
                console.log('Response status:', response.status);
                
                if (!response.ok) {
                    throw new Error('Failed to fetch jobs');
                }
                
                const jobs = await response.json();
                console.log('Jobs loaded:', jobs);
                
                const notificationList = document.getElementById('notificationList');
                const notificationCount = document.getElementById('notificationCount');
                
                if (!notificationList || !notificationCount) {
                    console.error('Notification elements not found!');
                    return;
                }
                
                // Clear existing notifications
                notificationList.innerHTML = '';
                
                if (jobs.length === 0) {
                    notificationList.innerHTML = '<div class="notification-item">No new job notifications</div>';
                    notificationCount.style.display = 'none';
                    return;
                }

                // Get the time offset between server and client
                const timeOffset = await getServerTimeOffset();
                console.log('Time offset between server and client:', timeOffset, 'ms');

                // Get the last checked time from localStorage or set to 24 hours ago
                let lastChecked = localStorage.getItem('lastJobCheck');
                if (!lastChecked) {
                    const yesterday = new Date();
                    yesterday.setHours(yesterday.getHours() - 24);
                    lastChecked = yesterday.getTime().toString();
                    localStorage.setItem('lastJobCheck', lastChecked);
                }
                
                console.log('Last checked time:', new Date(parseInt(lastChecked)));
                
                // Filter jobs posted within the last 24 hours, accounting for time offset
                const newJobs = jobs.filter(job => {
                    const jobDate = new Date(job.postedDate).getTime();
                    const adjustedJobDate = jobDate - timeOffset;
                    console.log('Job date:', new Date(jobDate), 'Adjusted date:', new Date(adjustedJobDate), 'for job:', job.jobTitle);
                    return adjustedJobDate > parseInt(lastChecked);
                });
                
                console.log('New jobs found:', newJobs.length);

                // Update notification count
                notificationCount.textContent = newJobs.length;
                notificationCount.style.display = newJobs.length > 0 ? 'block' : 'none';

                // Add each job as a notification
                newJobs.forEach(job => {
                    const notificationElement = document.createElement('div');
                    notificationElement.className = 'notification-item unread';
                    notificationElement.setAttribute('data-job-id', job.id);
                    notificationElement.innerHTML = `
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="font-semibold text-gray-800">New Job Opening</p>
                                <p class="text-gray-600">${job.jobTitle} at ${job.companyName}</p>
                                <p class="text-sm text-gray-500">Package: ₹${job.package} LPA</p>
                                <p class="text-sm text-gray-500">Drive Date: ${formatDate(job.driveDate)}</p>
                                <p class="text-xs text-gray-400">Posted: ${formatDate(job.postedDate)}</p>
                            </div>
                            <button onclick="viewJobDetails('${job.companyName}')" class="text-blue-600 hover:text-blue-800">
                                View Details
                            </button>
                        </div>
                    `;
                    notificationList.appendChild(notificationElement);
                });

                // Update last checked time to current time
                localStorage.setItem('lastJobCheck', Date.now().toString());

            } catch (error) {
                console.error('Error loading notifications:', error);
                const notificationList = document.getElementById('notificationList');
                if (notificationList) {
                    notificationList.innerHTML = '<div class="notification-item">Error loading notifications</div>';
                }
            }
        }

        // Function to format date
        function formatDate(dateString) {
            try {
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return new Date(dateString).toLocaleDateString('en-US', options);
            } catch (error) {
                console.error('Error formatting date:', error);
                return dateString;
            }
        }

        // Function to view job details
        function viewJobDetails(companyName) {
            // Find the job ID from the notification item
            const notificationItem = event.target.closest('.notification-item');
            const jobId = notificationItem.getAttribute('data-job-id');
            
            // Redirect to job-details.php with the job ID
            window.location.href = `job-details.php?id=${jobId}`;
        }

        // Function to clear all notifications
        function clearAllNotifications() {
            console.log('Clearing all notifications');
            const notificationList = document.getElementById('notificationList');
            const notificationCount = document.getElementById('notificationCount');
            
            if (notificationList && notificationCount) {
                notificationList.innerHTML = '<div class="notification-item">No notifications</div>';
                notificationCount.style.display = 'none';
                // Set last checked to current time
                localStorage.setItem('lastJobCheck', Date.now().toString());
            }
        }

        // Function to close notification panel
        function closeNotificationPanel() {
            const notificationPanel = document.getElementById('notificationPanel');
            if (notificationPanel) {
                notificationPanel.classList.add('hidden');
                isPanelOpen = false;
                if (notificationUpdateInterval) {
                    clearInterval(notificationUpdateInterval);
                    notificationUpdateInterval = null;
                }
            }
        }

        // Initialize when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page loaded, initializing notifications...');
            
            // Set initial last checked time to 24 hours ago
            const yesterday = new Date();
            yesterday.setHours(yesterday.getHours() - 24);
            localStorage.setItem('lastJobCheck', yesterday.getTime().toString());
            
            // Handle notification link click
            const notificationLink = document.querySelector('.notification-link');
            const notificationPanel = document.getElementById('notificationPanel');

            if (notificationLink && notificationPanel) {
                // Add close button to notification panel
                const notificationHeader = notificationPanel.querySelector('.notification-header');
                if (notificationHeader) {
                    const closeButton = document.createElement('button');
                    closeButton.innerHTML = '&times;';
                    closeButton.className = 'close-button';
                    closeButton.style.cssText = `
                        background: none;
                        border: none;
                        font-size: 1.5rem;
                        color: #666;
                        cursor: pointer;
                        padding: 0 0.5rem;
                        margin-left: 1rem;
                    `;
                    closeButton.onclick = closeNotificationPanel;
                    notificationHeader.appendChild(closeButton);
                }

                notificationLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Notification link clicked');
                    
                    if (notificationPanel.classList.contains('hidden')) {
                        // Opening panel
                        notificationPanel.classList.remove('hidden');
                        isPanelOpen = true;
                        loadNotifications(); // Load immediately when opened
                        // Start checking for updates
                        notificationUpdateInterval = setInterval(loadNotifications, 10000);
                    } else {
                        // Closing panel
                        closeNotificationPanel();
                    }
                });

                // Close notification panel when clicking outside
                document.addEventListener('click', function(event) {
                    if (isPanelOpen && 
                        !notificationPanel.contains(event.target) && 
                        !notificationLink.contains(event.target)) {
                        closeNotificationPanel();
                    }
                });

                // Prevent panel from closing when clicking inside
                notificationPanel.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            } else {
                console.error('Notification elements not found in DOM!');
            }

            // Modal functionality
            const modalLinks = {
                'contact': document.querySelector('a[href="#"][data-modal="contact"]'),
                'faqs': document.querySelector('a[href="#"][data-modal="faqs"]'),
                'privacy': document.querySelector('a[href="#"][data-modal="privacy"]'),
                'calendar': document.querySelector('a[href="#"][data-modal="calendar"]'),
                'library': document.querySelector('a[href="#"][data-modal="library"]'),
                'handbook': document.querySelector('a[href="#"][data-modal="handbook"]'),
                'career': document.querySelector('a[href="#"][data-modal="career"]'),
                'academics': document.querySelector('a[href="#"][data-modal="academics"]'),
                'jobs': document.querySelector('a[href="#"][data-modal="jobs"]'),
                'career-path': document.querySelector('a[href="#"][data-modal="career-path"]')
            };

            // Add click event listeners to modal links
            Object.keys(modalLinks).forEach(key => {
                if (modalLinks[key]) {
                    modalLinks[key].addEventListener('click', function(e) {
                        e.preventDefault();
                        const modal = document.getElementById(`${key}Modal`);
                        if (modal) {
                            modal.classList.add('active');
                        }
                    });
                }
            });

            // Close modal functionality
            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.modal').classList.remove('active');
                });
            });

            // Close modal when clicking outside
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        this.classList.remove('active');
                    }
                });
            });

            // Check for new notifications immediately and then every 30 seconds
            checkNewNotifications();
            setInterval(checkNewNotifications, 30000);
        });
    </script>
</body>
</html>