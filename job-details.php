<?php
session_start();
require_once('../../../wp-load.php');

// Function to save job application
function saveApplication($jobId, $studentId) {
    $applicationsFile = __DIR__ . '/data/applications.json';
    $applications = [];
    
    // Create applications.json if it doesn't exist
    if (!file_exists($applicationsFile)) {
        file_put_contents($applicationsFile, json_encode([]));
    }
    
    // Read existing applications
    $applications = json_decode(file_get_contents($applicationsFile), true);
    
    // Check if student has already applied
    foreach ($applications as $application) {
        if ($application['jobId'] == $jobId && $application['studentId'] == $studentId) {
            return false; // Already applied
        }
    }
    
    // Add new application
    $applications[] = [
        'jobId' => $jobId,
        'studentId' => $studentId,
        'appliedOn' => date('Y-m-d H:i:s')
    ];
    
    // Save updated applications
    file_put_contents($applicationsFile, json_encode($applications, JSON_PRETTY_PRINT));
    return true;
}

// Handle application submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apply_job'])) {
    $jobId = $_POST['job_id'];
    $studentId = $_SESSION['student_id']; // Get student ID from session
    
    $success = saveApplication($jobId, $studentId);
    if ($success) {
        $message = "Successfully applied for the job!";
        $messageType = "success";
    } else {
       $message = "Successfully applied for the job!";
        $messageType = "success";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../../../wp-load.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details - Campus Mate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #003366;
            --accent-color: #0c67ef;
            --text-light: #ffffff;
            --text-dark: #333333;
            --bg-light: #f5f7fa;
            --border-color: #e1e5eb;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--bg-light);
        }

        .job-card {
            background: white;
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        .job-card:hover {
            transform: translateY(-5px);
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-upcoming {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .status-ongoing {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-completed {
            background-color: #f5f5f5;
            color: #616161;
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem;
            border-radius: 0.5rem;
            z-index: 1000;
            animation: slideIn 0.5s ease-out;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-[#003366] text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-briefcase text-2xl"></i>
                <h1 class="text-2xl font-bold">Job Details</h1>
            </div>
            <a href="<?php echo get_template_directory_uri(); ?>/Main.php" class="text-white hover:text-blue-200">
                <i class="fas fa-arrow-left"></i> Back to Jobs
            </a>
        </div>
    </header>

    <!-- Alert Message -->
    <?php if (isset($message)): ?>
    <div class="alert alert-<?php echo $messageType; ?>">
        <?php echo $message; ?>
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('.alert').style.display = 'none';
        }, 5000);
    </script>
    <?php endif; ?>

    <!-- Main Content -->
    <div class="container mx-auto p-6">
        <?php
        // Get job ID from URL parameter
        $job_id = isset($_GET['id']) ? $_GET['id'] : null;
        
        // Read jobs data
        $jobs_file = __DIR__ . '/data/jobs.json';
        $jobs = [];
        
        if (file_exists($jobs_file)) {
            $jobs = json_decode(file_get_contents($jobs_file), true);
        }

        // Find the specific job
        $job = null;
        if ($job_id) {
            foreach ($jobs as $j) {
                if ($j['id'] == $job_id) {
                    $job = $j;
                    break;
                }
            }
        }

        if ($job): ?>
            <div class="job-card p-6 mb-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2"><?php echo htmlspecialchars($job['jobTitle']); ?></h2>
                        <p class="text-xl text-gray-600"><?php echo htmlspecialchars($job['companyName']); ?></p>
                    </div>
                    <span class="status-badge status-<?php echo strtolower($job['status']); ?>">
                        <?php echo ucfirst($job['status']); ?>
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Job Description</h3>
                            <p class="text-gray-600"><?php echo nl2br(htmlspecialchars($job['jobDescription'])); ?></p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Eligible Branches</h3>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($job['eligibleBranches'] as $branch): ?>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                        <?php echo htmlspecialchars($branch); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Job Type</h3>
                                <p class="text-gray-600"><?php echo htmlspecialchars($job['jobType']); ?></p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Work Mode</h3>
                                <p class="text-gray-600"><?php echo htmlspecialchars($job['workMode']); ?></p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Experience</h3>
                                <p class="text-gray-600"><?php echo htmlspecialchars($job['experience']); ?> years</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Package</h3>
                                <p class="text-gray-600">₹<?php echo htmlspecialchars($job['package']); ?> LPA</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Location</h3>
                            <p class="text-gray-600"><?php echo htmlspecialchars($job['location']); ?></p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Drive Date</h3>
                            <p class="text-gray-600"><?php echo date('F j, Y', strtotime($job['driveDate'])); ?></p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Positions Available</h3>
                            <p class="text-gray-600"><?php echo htmlspecialchars($job['positions']); ?></p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Posted Date</h3>
                            <p class="text-gray-600"><?php echo date('F j, Y', strtotime($job['postedDate'])); ?></p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-4">
                    <form method="POST" class="inline">
                        <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
                        <button type="submit" name="apply_job" 
                                class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-paper-plane mr-2"></i> Apply Now
                        </button>
                    </form>
                     
                    <button onclick="window.print()" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                        <i class="fas fa-print mr-2"></i> Print Details
                    </button>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <i class="fas fa-exclamation-circle text-4xl text-gray-400 mb-4"></i>
                <h2 class="text-2xl font-bold text-gray-700 mb-2">Job Not Found</h2>
                <p class="text-gray-600 mb-4">The job you're looking for doesn't exist or has been removed.</p>
                
            </div>
        <?php endif; ?>
    </div>
</body>
</html>