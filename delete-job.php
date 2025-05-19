<?php
require_once('../../../wp-load.php');

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);
$company_name = $data['companyName'];

// Set the JSON file path
$json_file = __DIR__ . '/data/jobs.json';
$response = array('success' => false, 'message' => '');

try {
    if (file_exists($json_file)) {
        // Read the current jobs
        $jobs = json_decode(file_get_contents($json_file), true) ?: [];
        
        // Find and remove the job
        $jobs = array_filter($jobs, function($job) use ($company_name) {
            return $job['companyName'] !== $company_name;
        });
        
        // Reset array keys
        $jobs = array_values($jobs);
        
        // Save the updated jobs back to the file
        if (file_put_contents($json_file, json_encode($jobs, JSON_PRETTY_PRINT))) {
            $response['success'] = true;
            $response['message'] = 'Job deleted successfully';
        } else {
            $response['message'] = 'Error saving updated jobs file';
        }
    } else {
        $response['message'] = 'Jobs file not found';
    }
} catch (Exception $e) {
    $response['message'] = 'Error: ' . $e->getMessage();
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>