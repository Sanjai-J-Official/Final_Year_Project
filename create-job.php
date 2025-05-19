<?php
require_once('../../../wp-load.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_data = array(
        'id' => time(),
        'companyName' => $_POST['companyName'],
        'jobTitle' => $_POST['jobTitle'],
        'jobDescription' => $_POST['jobDescription'],
        'jobType' => $_POST['jobType'],
        'workMode' => $_POST['workMode'],
        'experience' => $_POST['experience'],
        'package' => $_POST['package'],
        'location' => $_POST['location'],
        'eligibleBranches' => isset($_POST['eligibleBranches']) ? $_POST['eligibleBranches'] : [],
        'driveDate' => $_POST['driveDate'],
        'positions' => $_POST['positions'],
        'status' => 'upcoming',
        'postedDate' => date('Y-m-d H:i:s')
    );

    // Create data directory if it doesn't exist
    $data_dir = __DIR__ . '/data';
    if (!file_exists($data_dir)) {
        mkdir($data_dir, 0777, true);
    }

    // Set the JSON file path
    $json_file = $data_dir . '/jobs.json';

    // Read existing jobs or create new array
    $jobs = [];
    if (file_exists($json_file)) {
        $jobs = json_decode(file_get_contents($json_file), true) ?: [];
    }

    // Add new job
    $jobs[] = $job_data;

    // Save to JSON file
    if (file_put_contents($json_file, json_encode($jobs, JSON_PRETTY_PRINT))) {
        // Redirect back to job recruiters page
        header('Location: job-recruiters.php');
        exit;
    } else {
        echo "Error: Could not save job data. Please check directory permissions.";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Job - Campus Mate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Create New Job Post</h1>
                <a href="job-recruiters.php" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left"></i> Back to Jobs
                </a>
            </div>

            <form method="POST" class="space-y-4">
                <!-- Company Information -->
                <div class="space-y-2">
                    <label class="block text-gray-700">Company Name</label>
                    <input type="text" name="companyName" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        placeholder="Enter company name">
                </div>

                <div class="space-y-2">
                    <label class="block text-gray-700">Job Title</label>
                    <input type="text" name="jobTitle" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        placeholder="Enter job title">
                </div>

                <div class="space-y-2">
                    <label class="block text-gray-700">Job Description</label>
                    <textarea name="jobDescription" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        rows="4" placeholder="Enter job description"></textarea>
                </div>

                <!-- Job Details -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="block text-gray-700">Job Type</label>
                        <select name="jobType" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Select job type</option>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Contract">Contract</option>
                            <option value="Internship">Internship</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">Work Mode</label>
                        <select name="workMode" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Select work mode</option>
                            <option value="On-site">On-site</option>
                            <option value="Remote">Remote</option>
                            <option value="Hybrid">Hybrid</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="block text-gray-700">Experience Required</label>
                        <input type="text" name="experience" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="e.g., 2-5 years">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">Package (LPA)</label>
                        <input type="number" name="package" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="Enter package in LPA">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-gray-700">Location</label>
                    <input type="text" name="location" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        placeholder="Enter job location">
                </div>

                <!-- Eligibility -->
                <div class="space-y-2">
                    <label class="block text-gray-700">Eligible Branches</label>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" name="eligibleBranches[]" value="AI & DS" class="h-4 w-4 text-blue-600">
                            <label class="ml-2">AI & DS</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="eligibleBranches[]" value="CSE" class="h-4 w-4 text-blue-600">
                            <label class="ml-2">CSE</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="eligibleBranches[]" value="ECE" class="h-4 w-4 text-blue-600">
                            <label class="ml-2">ECE</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="eligibleBranches[]" value="MECH" class="h-4 w-4 text-blue-600">
                            <label class="ml-2">MECH</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="eligibleBranches[]" value="CIVIL" class="h-4 w-4 text-blue-600">
                            <label class="ml-2">CIVIL</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="eligibleBranches[]" value="AGRI" class="h-4 w-4 text-blue-600">
                            <label class="ml-2">AGRI</label>
                        </div>
                    </div>
                </div>

                <!-- Drive Details -->
                <div class="space-y-2">
                    <label class="block text-gray-700">Drive Date</label>
                    <input type="date" name="driveDate" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <div class="space-y-2">
                    <label class="block text-gray-700">Number of Positions</label>
                    <input type="number" name="positions" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        placeholder="Enter number of positions">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4">
                    <a href="job-recruiters.php"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Cancel
                    </a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        Post Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>