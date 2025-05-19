<?php
session_start();
require_once('../../../wp-load.php');

// Function to get job details
function getJobDetails($jobId) {
    $jobsFile = 'data/jobs.json';
    if (file_exists($jobsFile)) {
        $jobs = json_decode(file_get_contents($jobsFile), true);
        foreach ($jobs as $job) {
            if ($job['id'] == $jobId) {
                return $job;
            }
        }
    }
    return null;
}

// Function to get student details
function getStudentDetails($regNo) {
    $studentsFile = 'data/student-database.json';
    if (file_exists($studentsFile)) {
        $students = json_decode(file_get_contents($studentsFile), true);
        foreach ($students as $student) {
            if ($student['regNo'] == $regNo) {
                return $student;
            }
        }
    }
    return null;
}

// Get job ID from URL
$jobId = isset($_GET['id']) ? $_GET['id'] : null;
$job = $jobId ? getJobDetails($jobId) : null;

// Get applications for this job
$applicationsFile = 'data/applications.json';
$applications = [];
if (file_exists($applicationsFile)) {
    $allApplications = json_decode(file_get_contents($applicationsFile), true);
    foreach ($allApplications as $application) {
        if ($application['jobId'] == $jobId) {
            $applications[] = $application;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Applications - Campus Mate</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <?php if ($job): ?>
            <!-- Job Details Header -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800 mb-2"><?php echo htmlspecialchars($job['jobTitle']); ?></h1>
                        <h2 class="text-xl text-gray-600 mb-4"><?php echo htmlspecialchars($job['companyName']); ?></h2>
                    </div>
                    <div class="text-right">
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold 
                            <?php echo $job['status'] === 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                            <?php echo htmlspecialchars($job['status']); ?>
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Package</p>
                        <p class="text-lg font-semibold">₹<?php echo htmlspecialchars($job['package']); ?> LPA</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Drive Date</p>
                        <p class="text-lg font-semibold"><?php echo date('d M Y', strtotime($job['driveDate'])); ?></p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Positions Available</p>
                        <p class="text-lg font-semibold"><?php echo htmlspecialchars($job['positions']); ?></p>
                    </div>
                </div>
            </div>

            <!-- Applications List -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Applications (<?php echo count($applications); ?>)</h2>
                    <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        <i class="fas fa-print mr-2"></i>Print List
                    </button>
                </div>

                <?php if (count($applications) > 0): ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student Details</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Academic Info</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applied On</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($applications as $application): 
                                    $student = getStudentDetails($application['studentId']);
                                    if ($student):
                                ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <?php echo htmlspecialchars($student['name']); ?>
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        <?php echo htmlspecialchars($student['regNo']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"><?php echo htmlspecialchars($student['department']); ?></div>
                                            <div class="text-sm text-gray-500">
                                                CGPA: <?php echo htmlspecialchars($student['cgpa']); ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"><?php echo htmlspecialchars($student['phone']); ?></div>
                                            <div class="text-sm text-gray-500"><?php echo htmlspecialchars($student['email']); ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo date('d M Y', strtotime($application['appliedOn'])); ?>
                                        </td>
                                    </tr>
                                <?php endif; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-8">
                        <i class="fas fa-users text-gray-400 text-4xl mb-4"></i>
                        <p class="text-gray-500">No applications received yet.</p>
                    </div>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <i class="fas fa-exclamation-circle text-red-500 text-4xl mb-4"></i>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Job Not Found</h2>
                <p class="text-gray-600">The requested job posting could not be found.</p>
                <a href="Main.php" class="inline-block mt-4 bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    Return to Dashboard
                </a>
            </div>
        <?php endif; ?>
    </div>

    <script>
        // Add any JavaScript functionality here if needed
    </script>
</body>
</html>