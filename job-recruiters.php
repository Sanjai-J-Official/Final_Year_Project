<?php
require_once('../../../wp-load.php');

// Add WordPress AJAX handlers
add_action('wp_ajax_save_job', 'handle_save_job');
add_action('wp_ajax_get_jobs', 'handle_get_jobs');
add_action('wp_ajax_delete_job', 'handle_delete_job');

function handle_save_job() {
    check_ajax_referer('save_job_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Permission denied');
    }

    $job_data = $_POST['job_data'];
    
    // Sanitize and validate data
    $job_data = array_map('sanitize_text_field', $job_data);
    
    // Get existing jobs
    $jobs = get_option('campus_mate_jobs', array());
    
    // Add new job
    $jobs[] = array_merge($job_data, array(
        'id' => time(),
        'status' => 'upcoming',
        'posted_date' => current_time('mysql')
    ));
    
    // Save to WordPress options
    update_option('campus_mate_jobs', $jobs);
    
    wp_send_json_success('Job saved successfully');
}

function handle_get_jobs() {
    check_ajax_referer('get_jobs_nonce', 'nonce');
    
    $jobs = get_option('campus_mate_jobs', array());
    wp_send_json_success($jobs);
}

function handle_delete_job() {
    check_ajax_referer('delete_job_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Permission denied');
    }

    $company_name = sanitize_text_field($_POST['company_name']);
    
    // Get existing jobs
    $jobs = get_option('campus_mate_jobs', array());
    
    // Remove the job
    $jobs = array_filter($jobs, function($job) use ($company_name) {
        return $job['companyName'] !== $company_name;
    });
    
    // Save updated jobs
    update_option('campus_mate_jobs', $jobs);
    
    wp_send_json_success('Job deleted successfully');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Mate - Job Recruiters</title>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--bg-light);
        }

        .recruiter-card {
            background: white;
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            overflow: hidden;
        }

        .recruiter-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .recruiter-header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
        }

        .recruiter-info {
            padding: 1.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .info-item {
            background: var(--bg-light);
            padding: 1rem;
            border-radius: 8px;
        }

        .info-label {
            font-size: 0.875rem;
            color: #666;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-weight: 600;
            color: var(--primary-color);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            padding: 1rem;
            border-top: 1px solid var(--border-color);
        }

        .action-button {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-weight: 500;
            text-decoration: none;
        }

        .contact-btn {
            background-color: #4CAF50;
            color: white;
        }

        .schedule-btn {
            background-color: var(--accent-color);
            color: white;
        }

        .view-applications-btn {
            background-color: #9c27b0;
            color: white;
        }

        .action-button:hover {
            opacity: 0.9;
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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            overflow-y: auto;
        }

        .modal-content {
            position: relative;
            background-color: white;
            margin: 5% auto;
            padding: 2rem;
            width: 90%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
            transition: color 0.3s ease;
        }

        .close-modal:hover {
            color: #333;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 0.375rem;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent-color);
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-[#003366] text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-briefcase text-2xl"></i>
                <h1 class="text-2xl font-bold">Job Recruiters</h1>
            </div>
            <a  href="<?php echo get_template_directory_uri(); ?>/admin-dashboard.php" class="text-white hover:text-blue-200">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto p-6">
        <!-- Recruiters Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Jobs will be loaded here -->
        </div>
    </div>

    <script>
        // Function to delete a job
        function deleteJob(jobCard) {
            const companyName = jobCard.querySelector('h2').textContent;
            if (confirm(`Are you sure you want to delete the job posting for ${companyName}?`)) {
                // Send request to delete-job.php
                fetch('delete-job.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ companyName: companyName })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the card from the UI
                        jobCard.remove();
                        alert('Job deleted successfully!');
                        // Reload the jobs to ensure sync with JSON file
                        loadJobs();
                    } else {
                        alert('Error deleting job: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting job. Please try again.');
                });
            }
        }

        // Function to load jobs from JSON file
        function loadJobs() {
            fetch('data/jobs.json')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(jobs => {
                    const recruitersGrid = document.querySelector('.grid');
                    recruitersGrid.innerHTML = '';

                    // Add the "Add New Recruiter" button
                    const addButton = document.createElement('div');
                    addButton.className = 'mb-6';
                    addButton.innerHTML = `
                        <a href="create-job.php" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center gap-2 inline-block">
                            <i class="fas fa-plus"></i> Add New Recruiter
                        </a>
                    `;
                    recruitersGrid.appendChild(addButton);

                    // Add each job to the grid
                    jobs.forEach(job => {
                        const jobCard = createJobCard(job);
                        recruitersGrid.appendChild(jobCard);
                    });
                })
                .catch(error => {
                    console.error('Error loading jobs:', error);
                    const recruitersGrid = document.querySelector('.grid');
                    recruitersGrid.innerHTML = `
                        <div class="mb-6">
                            <a href="create-job.php" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center gap-2 inline-block">
                                <i class="fas fa-plus"></i> Add New Recruiter
                            </a>
                        </div>
                        <div class="col-span-full text-center text-gray-500">
                            No jobs found. Click "Add New Recruiter" to create your first job posting.
                        </div>
                    `;
                });
        }

        // Function to create a job card
        function createJobCard(job) {
            const card = document.createElement('div');
            card.className = 'recruiter-card';
            card.innerHTML = `
                <div class="recruiter-header">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold">${job.companyName}</h2>
                            <p class="text-sm opacity-80">${job.jobTitle}</p>
                        </div>
                        <span class="status-badge status-${job.status}">${job.status}</span>
                    </div>
                </div>
                <div class="recruiter-info">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Drive Date</div>
                            <div class="info-value">${formatDate(job.driveDate)}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Positions</div>
                            <div class="info-value">${job.positions}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Package</div>
                            <div class="info-value">₹${job.package} LPA</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Eligible Branches</div>
                            <div class="info-value">${job.eligibleBranches.join(', ')}</div>
                        </div>
                    </div>
                </div>
                <div class="action-buttons">
                    <a href="job-applications.php?id=${job.id}" class="action-button view-applications-btn">
                        <i class="fas fa-users"></i> Applied Students
                    </a>
                    <button class="action-button contact-btn">
                        <i class="fas fa-envelope"></i> Contact
                    </button>
                    <button class="action-button schedule-btn">
                        <i class="fas fa-calendar"></i> Schedule
                    </button>
                    <button class="action-button delete-btn" onclick="deleteJob(this.closest('.recruiter-card'))">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            `;
            return card;
        }

        // Function to format date
        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }

        // Load jobs when page loads
        document.addEventListener('DOMContentLoaded', loadJobs);
    </script>
</body>
</html>