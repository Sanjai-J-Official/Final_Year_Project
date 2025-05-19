<!DOCTYPE html>
<html lang="en">
<head><?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Job Messages</title>
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

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .message-card {
            transition: var(--transition);
        }

        .message-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .unread {
            border-left: 4px solid var(--accent-color);
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
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Job Messages</h2>
            <div class="flex space-x-4">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    <i class="fas fa-plus mr-2"></i>New Message
                </button>
            </div>
        </div>

        <!-- Messages List -->
        <div class="space-y-4">
            <!-- Message 1 -->
            <div class="message-card unread bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-start">
                    <div class="flex items-center space-x-4">
                        <img src="https://ui-avatars.com/api/?name=Google&background=4285F4&color=fff" alt="Google" class="w-12 h-12 rounded-full">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Google</h3>
                            <p class="text-gray-600">Software Engineer Position</p>
                        </div>
                    </div>
                    <span class="text-sm text-gray-500">2 hours ago</span>
                </div>
                <div class="mt-4">
                    <p class="text-gray-700">We are looking for talented software engineers to join our team. The position offers competitive salary, benefits, and opportunities for growth.</p>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Full-time</span>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Remote</span>
                    </div>
                    <a  href="<?php echo get_template_directory_uri(); ?>/job-details.php?id=google-swe" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-arrow-right"></i> View Details
                    </a>
                </div>
            </div>

            <!-- Message 2 -->
            <div class="message-card unread bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-start">
                    <div class="flex items-center space-x-4">
                        <img src="https://ui-avatars.com/api/?name=Microsoft&background=00A4EF&color=fff" alt="Microsoft" class="w-12 h-12 rounded-full">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Microsoft</h3>
                            <p class="text-gray-600">Data Scientist Position</p>
                        </div>
                    </div>
                    <span class="text-sm text-gray-500">5 hours ago</span>
                </div>
                <div class="mt-4">
                    <p class="text-gray-700">Join our data science team to work on cutting-edge AI projects. Looking for candidates with strong analytical skills and machine learning expertise.</p>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Full-time</span>
                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">Hybrid</span>
                    </div>
                    <a  href="<?php echo get_template_directory_uri(); ?>/job-details.php?id=microsoft-ds" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-arrow-right"></i> View Details
                    </a>
                </div>
            </div>

            <!-- Message 3 -->
            <div class="message-card unread bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-start">
                    <div class="flex items-center space-x-4">
                        <img src="https://ui-avatars.com/api/?name=Amazon&background=FF9900&color=fff" alt="Amazon" class="w-12 h-12 rounded-full">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Amazon</h3>
                            <p class="text-gray-600">Cloud Solutions Architect</p>
                        </div>
                    </div>
                    <span class="text-sm text-gray-500">1 day ago</span>
                </div>
                <div class="mt-4">
                    <p class="text-gray-700">Seeking experienced cloud architects to design and implement scalable solutions using AWS services. Must have strong cloud infrastructure knowledge.</p>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex space-x-2">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Full-time</span>
                        <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">On-site</span>
                    </div>
                    <a  href="<?php echo get_template_directory_uri(); ?>/job-details.php?id=amazon-architect" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-arrow-right"></i> View Details
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Function to mark messages as read
        function markAsRead(messageId) {
            const message = document.getElementById(messageId);
            message.classList.remove('unread');
        }

        // Function to view message details
        function viewMessageDetails(messageId) {
            // Implement message details view
            console.log('Viewing message:', messageId);
        }
    </script>
</body>
</html>