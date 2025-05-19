<?php
require_once('../../../wp-load.php');

// Function to get the next S.NO
function getNextSerialNumber($jsonData) {
    $data = json_decode($jsonData, true);
    $lastEntry = end($data);
    return $lastEntry['S.NO'] + 1;
}

// Function to validate register number
function isRegisterNumberExists($jsonData, $registerNumber) {
    $data = json_decode($jsonData, true);
    foreach ($data as $student) {
        if ($student['REGISTER NO'] == $registerNumber) {
            return true;
        }
    }
    return false;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the correct path to the JSON file
    $jsonFile = get_template_directory() . '/data/student-database.json';
    
    // Check if file exists
    if (!file_exists($jsonFile)) {
        $error = "Database file not found!";
    } else {
        $jsonData = file_get_contents($jsonFile);
        
        // Validate register number
        if (isRegisterNumberExists($jsonData, $_POST['registerNumber'])) {
            $error = "Register number already exists!";
        } else {
            try {
                // Format date from YYYY-MM-DD to DD/MM/YY
                $dob = date('d/m/Y', strtotime($_POST['dob']));
                
                // Create new student entry
                $newStudent = array(
                    "S.NO" => getNextSerialNumber($jsonData),
                    "NAME" => strtoupper($_POST['firstName'] . " " . $_POST['lastName']),
                    "REGISTER NO" => (int)$_POST['registerNumber'],
                    "GENDER" => ucfirst($_POST['gender']),
                    "DEPT" => $_POST['department'],
                    "DOB (DD/MM/YY)" => $dob,
                    "10%" => (float)$_POST['tenthPercentage'],
                    "12%" => (float)$_POST['twelfthPercentage'],
                    "PHONE NO" => (int)$_POST['phoneNumber'],
                    "MAIL ID (College mail)" => strtolower($_POST['collegeEmail']),
                    "Personnal Mail ID" => strtolower($_POST['personalEmail']),
                    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
                );

                // Remove the last closing bracket
                $jsonData = rtrim($jsonData, "\n]");
                
                // Add comma if there's existing data
                if (strlen($jsonData) > 1) {
                    $jsonData .= ",\n";
                }
                
                // Add new student data
                $jsonData .= json_encode($newStudent, JSON_PRETTY_PRINT) . "\n]";
                
                // Save to file
                if (file_put_contents($jsonFile, $jsonData)) {
                    // Set session variables for successful registration
                    session_start();
                    $_SESSION['registration_success'] = true;
                    $_SESSION['registered_email'] = strtolower($_POST['collegeEmail']);
                    $_SESSION['registered_register_no'] = $_POST['registerNumber'];
                    
                    // Redirect to home page with success message
                    wp_redirect(home_url() . '?registration=success');
                    exit();
                } else {
                    $error = "Failed to save registration data!";
                }
            } catch (Exception $e) {
                $error = "An error occurred: " . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Student Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('https://dsce.ac.in/wp-content/uploads/2024/02/314A2824_2-scaled.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .overlay {
            background-color: rgba(211, 211, 203, 0.907);
            min-height: 100vh;
        }
        /* Success Animation */
        .success-animation {
            animation: successPop 0.5s ease-out;
        }
        @keyframes successPop {
            0% { transform: scale(0.8); opacity: 0; }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); opacity: 1; }
        }
        /* Form Field Animation */
        .form-field {
            transition: all 0.3s ease;
        }
        .form-field:focus-within {
            transform: translateY(-2px);
        }
        /* Button Animation */
        .submit-btn {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        .submit-btn:active {
            transform: translateY(0);
        }
        /* Loading Animation */
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 1000;
        }
        .loading-spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <header class="text-center mb-8 success-animation">
                <h1 class="text-3xl md:text-5xl font-bold text-blue-600 mb-4">Student Registration</h1>
                <a href="<?php echo home_url(); ?>" class="text-blue-600 hover:text-blue-800 transition duration-300">← Back to Home</a>
            </header>

            <?php if (isset($error)): ?>
            <div class="max-w-md mx-auto mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded success-animation">
                <?php echo htmlspecialchars($error); ?>
            </div>
            <?php endif; ?>

            <!-- Registration Form -->
            <main class="max-w-md mx-auto">
                <form method="POST" class="bg-white rounded-lg shadow-lg p-8 space-y-6 success-animation" id="registrationForm">
                    <div class="space-y-2">
                        <label for="firstName" class="block text-gray-700">First Name</label>
                        <input type="text" id="firstName" name="firstName" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="lastName" class="block text-gray-700">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="registerNumber" class="block text-gray-700">Register Number</label>
                        <input type="text" id="registerNumber" name="registerNumber" required pattern="[0-9]{12}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="gender" class="block text-gray-700">Gender</label>
                        <select id="gender" name="gender" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="department" class="block text-gray-700">Department</label>
                        <select id="department" name="department" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Select Department</option>
                            <option value="AI & DS">AI & DS</option>
                            <option value="CSE">CSE</option>
                            <option value="ISE">ISE</option>
                            <option value="ECE">ECE</option>
                            <option value="EEE">EEE</option>
                        </select>
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="dob" class="block text-gray-700">Date of Birth</label>
                        <input type="date" id="dob" name="dob" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="tenthPercentage" class="block text-gray-700">Percentage in 10th</label>
                        <input type="number" id="tenthPercentage" name="tenthPercentage" min="0" max="100" step="0.01" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="twelfthPercentage" class="block text-gray-700">Percentage in 12th</label>
                        <input type="number" id="twelfthPercentage" name="twelfthPercentage" min="0" max="100" step="0.01" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="phoneNumber" class="block text-gray-700">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="collegeEmail" class="block text-gray-700">College Email</label>
                        <input type="email" id="collegeEmail" name="collegeEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.ac\.in$" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="personalEmail" class="block text-gray-700">Personal Email</label>
                        <input type="email" id="personalEmail" name="personalEmail" pattern="[a-z0-9._%+-]+@gmail\.com$" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" id="password" name="password" required minlength="8"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="space-y-2">
                        <label for="confirmPassword" class="block text-gray-700">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" required minlength="8"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300 submit-btn">
                        Create Account
                    </button>
                </form>
            </main>
        </div>
    </div>

    <!-- Loading Animation -->
    <div class="loading" id="loading">
        <div class="loading-spinner"></div>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const registerNumber = document.getElementById('registerNumber').value;
            const phoneNumber = document.getElementById('phoneNumber').value;
            const collegeEmail = document.getElementById('collegeEmail').value;
            const personalEmail = document.getElementById('personalEmail').value;

            // Password validation
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                e.preventDefault();
                return;
            }

            if (password.length < 8) {
                alert('Password must be at least 8 characters long!');
                e.preventDefault();
                return;
            }

            // Register number validation
            if (!/^\d{12}$/.test(registerNumber)) {
                alert('Register number must be 12 digits');
                e.preventDefault();
                return;
            }

            // Phone number validation
            if (!/^\d{10}$/.test(phoneNumber)) {
                alert('Phone number must be 10 digits');
                e.preventDefault();
                return;
            }

            // Email validation
            if (!collegeEmail.toLowerCase().endsWith('.ac.in')) {
                alert('College email must end with .ac.in');
                e.preventDefault();
                return;
            }

            if (!personalEmail.toLowerCase().endsWith('@gmail.com')) {
                alert('Personal email must be a Gmail address');
                e.preventDefault();
                return;
            }

            // Show loading animation
            document.getElementById('loading').style.display = 'block';
        });

        // Add animation to form fields
        document.querySelectorAll('input, select').forEach(field => {
            field.classList.add('form-field');
        });
    </script>
</body>
</html>