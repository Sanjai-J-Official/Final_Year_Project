document.addEventListener('DOMContentLoaded', () => {
    const registrationForm = document.getElementById('registrationForm');
    if (registrationForm) {
        setupFormValidation();
    }
});

function setupFormValidation() {
    const form = document.getElementById('registrationForm');
    const inputs = form.querySelectorAll('input');
    
    // Add real-time validation for each input
    inputs.forEach(input => {
        input.addEventListener('input', () => validateField(input));
        input.addEventListener('blur', () => validateField(input));
    });

    // Form submission handler
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        let isValid = true;
        inputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });

        if (isValid) {
            // Here you would typically send the data to a server
            alert('Registration successful!');
            form.reset();
        }
    });
}

function validateField(input) {
    const errorElement = input.nextElementSibling;
    let isValid = true;
    let errorMessage = '';

    // Remove any existing error styling
    input.classList.remove('border-red-500');
    errorElement.classList.add('hidden');

    // Validate based on input type
    switch (input.id) {
        case 'firstName':
        case 'lastName':
            if (input.value.trim() === '') {
                isValid = false;
                errorMessage = 'This field is required';
            }
            break;

        case 'email':
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(input.value)) {
                isValid = false;
                errorMessage = 'Please enter a valid email address';
            }
            break;

        case 'password':
            if (input.value.length < 8) {
                isValid = false;
                errorMessage = 'Password must be at least 8 characters long';
            }
            break;

        case 'confirmPassword':
            const password = document.getElementById('password');
            if (input.value !== password.value) {
                isValid = false;
                errorMessage = 'Passwords do not match';
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