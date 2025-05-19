<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Your Academic Gateway</title>
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            color: white;
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

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: var(--accent-color);
            color: var(--text-light);
        }

        .btn-primary:hover {
            background-color: #e67300;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--text-light);
            border: 2px solid var(--text-light);
        }

        .btn-secondary:hover {
            background-color: var(--text-light);
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-tertiary {
            background-color: var(--primary-color);
            color: var(--text-light);
        }

        .btn-tertiary:hover {
            background-color: #002244;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
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

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                justify-content: center;
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

        /* Enhanced Hero Section */
        .hero {
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            animation: gradientShift 15s ease infinite;
            background: linear-gradient(
                45deg,
                rgba(0, 51, 102, 0.8),
                rgba(12, 103, 239, 0.8)
            );
        }

        .hero-content {
            animation: fadeInUp 1s ease-out;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero h1 {
            animation: slideInLeft 1s ease-out;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            animation: slideInRight 1s ease-out;
        }

        /* Enhanced CTA Buttons */
        .cta-buttons {
            animation: fadeInUp 1.2s ease-out;
        }

        .btn {
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            z-index: 1;
        }

        .btn::before {
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
            z-index: -1;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--accent-color), #e67300);
            border: none;
            box-shadow: 0 4px 15px rgba(12, 103, 239, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(12, 103, 239, 0.4);
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid var(--text-light);
            backdrop-filter: blur(5px);
        }

        .btn-secondary:hover {
            background: var(--text-light);
            color: var(--primary-color);
            transform: translateY(-3px) scale(1.05);
        }

        .btn-tertiary {
            background: linear-gradient(45deg, var(--primary-color), #002244);
            border: none;
            box-shadow: 0 4px 15px rgba(0, 51, 102, 0.3);
        }

        .btn-tertiary:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 51, 102, 0.4);
        }

        /* Enhanced Navigation */
        nav ul {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        nav a {
            position: relative;
            padding: 0.5rem 1rem;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        nav a:hover::after {
            width: 100%;
        }

        /* Enhanced Footer */
        footer {
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
            background: linear-gradient(
                45deg,
                var(--primary-color),
                #002244
            );
            opacity: 0.1;
            animation: gradientShift 15s ease infinite;
        }

        .footer-section {
            animation: fadeInUp 0.6s ease-out;
            transition: transform 0.3s ease;
        }

        .footer-section:hover {
            transform: translateY(-5px);
        }

        .footer-section a {
            position: relative;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .footer-section a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--accent-color);
            transition: width 0.3s ease;
        }

        .footer-section a:hover::after {
            width: 100%;
        }

        /* Keyframe Animations */
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Enhanced Responsive Design */
        @media (max-width: 768px) {
            .hero-content {
                padding: 1.5rem;
                margin: 1rem;
            }

            .btn {
                width: 100%;
                margin: 0.5rem 0;
            }

            nav ul {
                background: linear-gradient(
                    45deg,
                    var(--primary-color),
                    #002244
                );
            }
        }

        /* Loading Animation */
        .loading {
            position: relative;
            overflow: hidden;
        }

        .loading::after {
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
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        /* Enhanced Typography */
        .logo {
            position: relative;
            overflow: hidden;
        }

        .logo i {
            animation: spin 20s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        /* Enhanced Menu Toggle */
        .menu-toggle {
            position: relative;
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .menu-toggle i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.3s ease;
        }

        .menu-toggle:hover i {
            transform: translate(-50%, -50%) scale(1.2);
        }

        /* Enhanced Hero Section with Parallax */
        .hero {
            background-attachment: fixed;
            position: relative;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, var(--bg-light), transparent);
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .hero-content:hover {
            transform: translateY(-5px) rotateX(5deg);
            transition: transform 0.5s ease;
        }

        /* Enhanced Typography */
        .hero h1 {
            background: linear-gradient(  #ffffff, #e0e0e0);
            
            background-clip: text;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            letter-spacing: 1px;
        }

        .hero p {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            letter-spacing: 0.5px;
        }

        /* Enhanced CTA Buttons */
        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            position: relative;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }

        .btn:hover i {
            transform: translateX(5px);
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--accent-color), #e67300);
            border: none;
            box-shadow: 0 4px 15px rgba(12, 103, 239, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(12, 103, 239, 0.4);
            background: linear-gradient(45deg, #e67300, var(--accent-color));
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(5px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.8);
            transform: translateY(-3px) scale(1.05);
        }

        .btn-tertiary {
            background: linear-gradient(45deg, var(--primary-color), #002244);
            border: none;
            box-shadow: 0 4px 15px rgba(0, 51, 102, 0.3);
        }

        .btn-tertiary:hover {
            background: linear-gradient(45deg, #002244, var(--primary-color));
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 51, 102, 0.4);
        }

        /* Enhanced Navigation */
        nav {
            position: relative;
        }

        nav::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--primary-color), #002244);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        nav:hover::before {
            opacity: 1;
        }

        nav ul {
            display: flex;
            gap: 2rem;
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        nav a {
            position: relative;
            padding: 0.5rem 1rem;
            color: var(--text-light);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        nav a::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        nav a:hover::before {
            width: 100%;
        }

        nav a i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }

        nav a:hover i {
            transform: translateY(-2px);
        }

        /* Enhanced Footer */
        footer {
            position: relative;
            overflow: hidden;
            padding: 4rem 2rem;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--primary-color), #002244);
            opacity: 0.1;
            animation: gradientShift 15s ease infinite;
        }

        .footer-content {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section {
            animation: fadeInUp 0.6s ease-out;
            transition: all 0.3s ease;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .footer-section:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.1);
        }

        .footer-section h3 {
            color: var(--accent-color);
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--accent-color);
            transition: width 0.3s ease;
        }

        .footer-section:hover h3::after {
            width: 100px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 1rem;
        }

        .footer-section a {
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-section a i {
            transition: transform 0.3s ease;
        }

        .footer-section a:hover i {
            transform: translateX(5px);
        }

        .copyright {
            text-align: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
        }

        .copyright::before {
            content: '';
            position: absolute;
            top: -1px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background: var(--accent-color);
        }

        /* Enhanced Responsive Design */
        @media (max-width: 768px) {
            .hero-content {
                padding: 2rem;
                margin: 1rem;
                transform: none !important;
            }

            .cta-buttons {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
                padding: 2rem;
            }

            .footer-section {
                text-align: center;
            }

            .footer-section h3::after {
                left: 50%;
                transform: translateX(-50%);
            }
        }

        /* Enhanced Loading Animation */
        .loading {
            position: relative;
            overflow: hidden;
        }

        .loading::after {
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
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        /* Enhanced Menu Toggle */
        .menu-toggle {
            position: relative;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .menu-toggle i {
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .menu-toggle:hover i {
            transform: scale(1.2) rotate(90deg);
            color: var(--accent-color);
        }

        /* Enhanced Logo */
        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.8rem;
            font-weight: bold;
            position: relative;
            overflow: hidden;
        }

        .logo i {
            font-size: 2rem;
            color: var(--accent-color);
            animation: spin 20s linear infinite;
        }

        .logo span {
            background: linear-gradient(45deg, #ffffff, #e0e0e0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
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
                <li><a href="#"><i class="fas fa-book"></i> Academics</a></li>
                <li><a href="#"><i class="fas fa-briefcase"></i> Jobs</a></li>
                <li><a href="#"><i class="fas fa-bell"></i> Notifications</a></li>
                <li><a href="#"><i class="fas fa-road"></i> Career Path</a></li>
                <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to Campus Mate</h1>
            <p class="text-lg md:text-xl mb-8">Your gateway to academic excellence and career success</p>
            <div class="cta-buttons">
                <a href="<?php echo get_template_directory_uri(); ?>/student-login.php" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Student Login
                </a>
                <a href="<?php echo get_template_directory_uri(); ?>/admin-login.php" class="btn btn-secondary">
                    <i class="fas fa-user-shield"></i> Admin Login
                </a>
                <a href="<?php echo get_template_directory_uri(); ?>/register.php" class="btn btn-tertiary">
                    <i class="fas fa-user-plus"></i> Register Now
                </a>
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
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Resources</h3>
                <ul>
                    <li><a href="#">Academic Calendar</a></li>
                    <li><a href="#">Library</a></li>
                    <li><a href="#">Student Handbook</a></li>
                    <li><a href="#">Career Services</a></li>
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

    <script>
        // Enhanced smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Enhanced intersection observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    if (entry.target.classList.contains('footer-section')) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Observe all sections
        document.querySelectorAll('.footer-section, .hero-content, .cta-buttons').forEach((section) => {
            observer.observe(section);
        });

        // Add parallax effect to hero section
        window.addEventListener('scroll', () => {
            const hero = document.querySelector('.hero');
            const scrolled = window.pageYOffset;
            hero.style.backgroundPositionY = scrolled * 0.5 + 'px';
        });

        // Add hover effect to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('mouseover', function() {
                this.style.transform = 'translateY(-3px) scale(1.05)';
            });
            button.addEventListener('mouseout', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>

<?php include('footer.php'); ?>