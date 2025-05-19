document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        setupLoginValidation();
    }
});

function setupLoginValidation() {
    const form = document.getElementById('loginForm');
    const inputs = form.querySelectorAll('input[type="text"], input[type="password"]');
    
    // Add real-time validation for each input
    inputs.forEach(input => {
        input.addEventListener('input', () => validateLoginField(input));
        input.addEventListener('blur', () => validateLoginField(input));
    });

    // Form submission handler
    form.addEventListener('submit', handleLogin);
}

// Function to handle form submission
async function handleLogin(event) {
    event.preventDefault();
    
    const emailInput = document.getElementById('emailOrRegister');
    const passwordInput = document.getElementById('password');
    const email = emailInput.value.trim();
    const password = passwordInput.value;

    try {
        // Fetch the student database
        const response = await fetch('database.json');
        if (!response.ok) {
            throw new Error('Failed to fetch student database');
        }
        
        const students = await response.json();
        
        // Find student by email (case-insensitive)
        const student = students.find(student => 
            student["MAIL ID (College mail)"].toLowerCase() === email.toLowerCase()
        );

        if (student) {
            // For demo purposes, using a simple password check
            // In a real application, you would use proper password hashing and verification
            if (password === "student123") { // Default password for demo
                // Store student info in session storage
                sessionStorage.setItem('currentStudent', JSON.stringify(student));
                
                // Show success message
                showMessage('✅ Login successful! Redirecting...', 'success');
                
                // Redirect after a short delay
                setTimeout(() => {
                    window.location.href = 'Main.php';
                }, 1500);
            } else {
                showMessage('❌ Invalid password', 'error');
            }
        } else {
            showMessage('❌ Email not found in database', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showMessage('❌ An error occurred during login. Please try again.', 'error');
    }
}

// Function to show messages
function showMessage(message, type) {
    // Create message element if it doesn't exist
    let messageElement = document.getElementById('loginMessage');
    if (!messageElement) {
        messageElement = document.createElement('div');
        messageElement.id = 'loginMessage';
        messageElement.className = 'mt-4 p-4 rounded-lg text-center';
        document.getElementById('loginForm').appendChild(messageElement);
    }

    // Set message and style based on type
    messageElement.textContent = message;
    messageElement.className = `mt-4 p-4 rounded-lg text-center ${
        type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'
    }`;
}

function validateLoginField(input) {
    const errorElement = input.nextElementSibling;
    let isValid = true;
    let errorMessage = '';

    // Remove any existing error styling
    input.classList.remove('border-red-500');
    errorElement.classList.add('hidden');

    // Validate based on input type
    switch (input.id) {
        case 'emailOrRegister':
            if (input.value.trim() === '') {
                isValid = false;
                errorMessage = 'Email or Register Number is required';
            }
            break;

        case 'password':
            if (input.value.length < 1) {
                isValid = false;
                errorMessage = 'Password is required';
            }
            break;
    }

    // Show error if validation fails
    if (!isValid) {
        input.classList.add('border-red-500');
        errorElement.textContent = errorMessage;
        errorElement.classList.remove('hidden');
    }

    return isValid;
} 