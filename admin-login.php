<!DOCTYPE html>
<html lang="en">
<head>
     <?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"  href="<?php echo get_template_directory_uri(); ?>/styles.css">
    <style>
        /* Enhanced Background */
        body {
            background-image: url('https://dsce.ac.in/wp-content/uploads/2024/02/314A2824_2-scaled.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(190, 190, 190,0.8), rgba(255,255,255 ,0.8));
            animation: gradientShift 15s ease infinite;
        }

        .overlay {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            animation: pulseGlow 4s ease-in-out infinite;
        }

        /* Enhanced Container */
        .container {
            position: relative;
            z-index: 1;
           
        }

        /* Enhanced Header */
        header {
            position: relative;
            margin-bottom: 3rem;
        }

        header h1 {
             
            
        }

        header a {
            position: relative;
            display: inline-block;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        header a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #ffffff;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        header a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        /* Enhanced Form */
        form {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            transform-style: preserve-3d;
            perspective: 1000px;
            animation: formGlow 4s ease-in-out infinite;
            transition: all 0.5s ease;
        }

        form:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 
                0 10px 30px rgba(0, 0, 0, 0.2),
                0 0 20px rgba(12, 103, 239, 0.2);
        }

        /* Enhanced Input Fields */
        input[type="text"],
        input[type="password"] {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid transparent;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #0c67ef;
            box-shadow: 
                0 5px 15px rgba(12, 103, 239, 0.2),
                0 0 10px rgba(12, 103, 239, 0.1);
            transform: translateY(-3px);
        }

        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #a0aec0;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus::placeholder,
        input[type="password"]:focus::placeholder {
            transform: translateX(10px);
            opacity: 0;
        }

        /* Enhanced Checkbox */
        input[type="checkbox"] {
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="checkbox"]:checked {
            animation: checkboxGlow 0.5s ease-in-out;
        }

        /* Enhanced Submit Button */
        button[type="submit"] {
            position: relative;
            overflow: hidden;
            background: linear-gradient(45deg, #003366, #0c67ef);
            background-size: 200% 200%;
            animation: gradientMove 3s ease infinite;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        button[type="submit"]::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center,
                rgba(255, 255, 255, 0.4) 0%,
                transparent 70%);
            transform: rotate(45deg);
            animation: buttonGlow 3s ease-in-out infinite;
        }

        button[type="submit"]:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 
                0 8px 25px rgba(12, 103, 239, 0.3),
                0 0 30px rgba(12, 103, 239, 0.2);
        }

        /* New Animation Keyframes */
        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(12, 103, 239, 0.2);
            }
            50% {
                box-shadow: 0 0 40px rgba(12, 103, 239, 0.4);
            }
        }

        @keyframes containerPulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.02);
            }
        }

        @keyframes textGlow {
            0%, 100% {
                text-shadow: 
                    0 0 10px rgba(255, 255, 255, 0.5),
                    0 0 20px rgba(255, 255, 255, 0.3);
            }
            50% {
                text-shadow: 
                    0 0 20px rgba(255, 255, 255, 0.7),
                    0 0 30px rgba(255, 255, 255, 0.5),
                    0 0 40px rgba(255, 255, 255, 0.3);
            }
        }

        @keyframes formGlow {
            0%, 100% {
                box-shadow: 
                    0 8px 32px rgba(0, 0, 0, 0.1),
                    0 0 0 1px rgba(255, 255, 255, 0.1);
            }
            50% {
                box-shadow: 
                    0 8px 32px rgba(0, 0, 0, 0.15),
                    0 0 20px rgba(12, 103, 239, 0.2);
            }
        }

        @keyframes buttonGlow {
            0% {
                transform: translateX(-100%) rotate(45deg);
            }
            100% {
                transform: translateX(100%) rotate(45deg);
            }
        }

        /* Enhanced Link Animations */
        a {
            position: relative;
            transition: all 0.3s ease;
        }

        a::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent,
                #0c67ef,
                transparent);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        a:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        /* Enhanced Error Message Animation */
        .error-message {
            animation: errorPulse 2s ease-in-out infinite;
        }

        @keyframes errorPulse {
            0%, 100% {
                box-shadow: 0 0 10px rgba(220, 38, 38, 0.2);
            }
            50% {
                box-shadow: 0 0 20px rgba(220, 38, 38, 0.4);
            }
        }

        /* Enhanced Input Focus Effects */
        .form-group {
            position: relative;
            transition: all 0.3s ease;
        }

        .form-group:focus-within {
            transform: translateX(5px);
        }

        .form-group::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent,
                #0c67ef,
                transparent);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .form-group:focus-within::after {
            transform: scaleX(1);
        }

        /* Enhanced Checkbox Animation */
        input[type="checkbox"] {
            position: relative;
            transition: all 0.3s ease;
        }

        input[type="checkbox"]:checked {
            animation: checkboxGlow 0.5s ease-in-out;
        }

        @keyframes checkboxGlow {
            0% {
                box-shadow: 0 0 0 0 rgba(12, 103, 239, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(12, 103, 239, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(12, 103, 239, 0);
            }
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <header class="text-center mb-8">
                <h1 class="text-3xl md:text-5xl font-bold text-blue-600 mb-4">Admin Login</h1>
                <a  href="<?php echo home_url(); ?>" class="text-blue-600 hover:text-blue-800">← Back to Home</a>
            </header>

            <!-- Login Form -->
            <main class="max-w-md mx-auto">
                <form id="adminLoginForm" class="bg-white rounded-lg shadow-lg p-8 space-y-6" onsubmit="handleAdminLogin(event)">
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label for="adminId" class="block text-gray-700">Admin ID</label>
                            <input type="text" id="adminId" name="adminId" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                placeholder="Enter your Admin ID">
                            <span class="error-message text-red-500 text-sm hidden"></span>
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="block text-gray-700">Password</label>
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                placeholder="Enter your password">
                            <span class="error-message text-red-500 text-sm hidden"></span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="rememberMe" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="rememberMe" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Forgot password?</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                        Login
                    </button>
                </form>
            </main>
        </div>
    </div>
    <script>
        function handleAdminLogin(event) {
            event.preventDefault();
            
            const adminId = document.getElementById('adminId').value;
            const password = document.getElementById('password').value;

            // Here you would typically validate admin credentials against a backend
            // For now, we'll just redirect to admin-dashboard.php if fields are not empty
            if(adminId && password) {
                window.location.href = 'admin-dashboard.php';
            } else {
                alert('Please fill in all fields');
            }
        }
    </script>
</body>
</html>