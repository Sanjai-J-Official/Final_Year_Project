<!DOCTYPE html>
<html lang="en">
<head> <?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Student Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #003366;
            --accent-color: #0c67ef;
            --text-light: #ffffff;
            --text-dark: #333333;
            --overlay-color: rgba(211, 211, 203, 0.907);
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            background-image: url('https://dsce.ac.in/wp-content/uploads/2024/02/314A2824_2-scaled.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .overlay {
            background-color: var(--overlay-color);
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
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        header::before {
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
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        header nav a {
            position: relative;
            transition: var(--transition);
        }

        header nav a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--text-light);
            transition: var(--transition);
        }

        header nav a:hover::after {
            width: 100%;
        }

        /* Enhanced Profile Card Styles */
        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform: translateY(0);
            transition: var(--transition);
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        /* Enhanced Profile Image Container */
        .w-24.h-24 {
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            transition: var(--transition);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .w-24.h-24:hover {
            transform: scale(1.1);
        }

        /* Enhanced Information Sections */
        .info-label {
            color: #4b5563;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
            padding-left: 1rem;
        }

        .info-label::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 4px;
            height: 0;
            background-color: var(--accent-color);
            transition: var(--transition);
            transform: translateY(-50%);
        }

        .info-label:hover::before {
            height: 100%;
        }

        .info-value {
            color: #1f2937;
            font-weight: 600;
            transition: var(--transition);
            padding: 0.5rem;
            border-radius: 4px;
        }

        .info-value:hover {
            background-color: rgba(12, 103, 239, 0.1);
            transform: translateX(5px);
        }

        /* Section Headers */
        h4.text-xl {
            position: relative;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }

        h4.text-xl::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-color), transparent);
            transition: var(--transition);
        }

        h4.text-xl:hover::after {
            width: 100px;
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
                rgba(255, 255, 255, 0.4),
                transparent
            );
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Responsive Enhancements */
        @media (max-width: 768px) {
            .profile-card {
                margin: 1rem;
                padding: 1.5rem;
            }

            .grid-cols-2 {
                gap: 1rem;
            }

            .info-value:hover {
                transform: none;
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

        /* Enhanced Container Animation */
        .container {
            animation: fadeIn 0.5s ease-out;
        }

        /* Enhanced Grid Animation */
        .grid > div {
            animation: fadeIn 0.5s ease-out;
            animation-fill-mode: both;
        }

        .grid > div:nth-child(2) {
            animation-delay: 0.1s;
        }

        .grid > div:nth-child(3) {
            animation-delay: 0.2s;
        }

        .grid > div:nth-child(4) {
            animation-delay: 0.3s;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Campus Mate</h1>
            <nav>
                <a  href="<?php echo get_template_directory_uri(); ?>/Main.php" class="hover:text-blue-200">Home</a>
                <span class="mx-2">|</span>
                <a  href="<?php echo get_template_directory_uri(); ?>/student-login.php" class="hover:text-blue-200">Logout</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Student Profile</h2>
            
            <!-- Profile Card -->
            <div class="profile-card p-6 mb-8">
                <div class="flex items-center mb-6">
                    <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mr-6">
                        <i class="fas fa-user text-4xl text-blue-600"></i>
                    </div>
                    <div>
                        <h3 id="studentName" class="text-2xl font-bold text-gray-800">Loading...</h3>
                        <p id="studentRegister" class="text-gray-600">Loading...</p>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4">Personal Information</h4>
                        
                        <div>
                            <p class="info-label">Full Name</p>
                            <p id="fullName" class="info-value">Loading...</p>
                        </div>
                        
                        <div>
                            <p class="info-label">Date of Birth</p>
                            <p id="dob" class="info-value">Loading...</p>
                        </div>
                        
                        <div>
                            <p class="info-label">Gender</p>
                            <p id="gender" class="info-value">Loading...</p>
                        </div>

                        <div>
                            <p class="info-label">10th Percentage</p>
                            <p id="tenthPercent" class="info-value">Loading...</p>
                        </div>

                        <div>
                            <p class="info-label">12th Percentage</p>
                            <p id="twelfthPercent" class="info-value">Loading...</p>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-4">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4">Contact Information</h4>
                        
                        <div>
                            <p class="info-label">College Email</p>
                            <p id="collegeEmail" class="info-value">Loading...</p>
                        </div>
                        
                        <div>
                            <p class="info-label">Personal Email</p>
                            <p id="personalEmail" class="info-value">Loading...</p>
                        </div>
                        
                        <div>
                            <p class="info-label">Phone Number</p>
                            <p id="phone" class="info-value">Loading...</p>
                        </div>
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="mt-8">
                    <h4 class="text-xl font-semibold text-gray-800 mb-4">Academic Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="info-label">Department</p>
                            <p id="department" class="info-value">Loading...</p>
                        </div>
                        
                        <div>
                            <p class="info-label">Register Number</p>
                            <p id="registerNo" class="info-value">Loading...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Function to load and display student data
        async function loadStudentProfile() {
            try {
                // Get the current student from session storage
                const currentStudent = JSON.parse(sessionStorage.getItem('currentStudent'));
                
                if (!currentStudent) {
                    // If no student data is found, redirect to login
                    window.location.href = 'student-login.php';
                    return;
                }

                // Update profile information
                document.getElementById('studentName').textContent = currentStudent["NAME"];
                document.getElementById('studentRegister').textContent = `Register No: ${currentStudent["REGISTER NO"]}`;
                document.getElementById('fullName').textContent = currentStudent["NAME"];
                document.getElementById('dob').textContent = currentStudent["DOB (DD/MM/YY)"] || 'Not specified';
                document.getElementById('gender').textContent = currentStudent["GENDER"] || 'Not specified';
                document.getElementById('tenthPercent').textContent = currentStudent["10%"] || 'Not specified';
                document.getElementById('twelfthPercent').textContent = currentStudent["12%"] || 'Not specified';
                document.getElementById('collegeEmail').textContent = currentStudent["MAIL ID (College mail)"] || 'Not specified';
                document.getElementById('personalEmail').textContent = currentStudent["Personnal Mail ID"] || 'Not specified';
                document.getElementById('phone').textContent = currentStudent["PHONE NO"] || 'Not specified';
                document.getElementById('department').textContent = currentStudent["DEPT"] || 'Not specified';
                document.getElementById('registerNo').textContent = currentStudent["REGISTER NO"] || 'Not specified';

            } catch (error) {
                console.error('Error loading student profile:', error);
                alert('Error loading profile data. Please try again.');
            }
        }

        // Load profile when page loads
        document.addEventListener('DOMContentLoaded', loadStudentProfile);
    </script>
</body>
</html>