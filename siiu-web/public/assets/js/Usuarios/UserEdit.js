document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('updateForm');
    const roleCheckboxes = document.querySelectorAll('.role-checkbox');

    // Custom validation for roles
    const validateRoles = () => {
        const checkedRoles = Array.from(roleCheckboxes).filter(cb => cb.checked);
        roleCheckboxes.forEach(cb => cb.setCustomValidity(checkedRoles.length !== 1 ? 'Invalid' : ''));
    };

    roleCheckboxes.forEach(cb => cb.addEventListener('change', validateRoles));

    // Validate form on submit
    form.addEventListener('submit', function (event) {
        validateRoles();

        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    });

    // DUI input mask and validation
    const duiInput = document.getElementById('dui');
    duiInput.addEventListener('input', function () {
        let value = duiInput.value.replace(/\D/g, '');
        if (value.length > 8) {
            value = value.slice(0, 8) + '-' + value.slice(8);
        }
        duiInput.value = value;
        duiInput.setCustomValidity(/^\d{8}-\d$/.test(duiInput.value) ? '' : 'Invalid');
    });

    // Phone input mask and validation
    const telefonoInput = document.getElementById('telefono');
    telefonoInput.addEventListener('input', function () {
        let value = telefonoInput.value.replace(/\D/g, '');
        if (value.length > 4) {
            value = value.slice(0, 4) + '-' + value.slice(4);
        }
        telefonoInput.value = value;
        telefonoInput.setCustomValidity(/^\d{4}-\d{4}$/.test(telefonoInput.value) ? '' : 'Invalid');
    });

    // Password validation if provided
    const passwordInput = document.getElementById('password');
    const passwordConfirmationInput = document.getElementById('password_confirmation');
    
    passwordInput.addEventListener('input', function () {
        const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;
        passwordInput.setCustomValidity(passwordInput.value === '' || passwordPattern.test(passwordInput.value) ? '' : 'Invalid');
        
        // Trigger validation on confirmation input if it has a value
        if (passwordConfirmationInput.value !== '') {
            passwordConfirmationInput.dispatchEvent(new Event('input'));
        }
    });

    passwordConfirmationInput.addEventListener('input', function () {
        passwordConfirmationInput.setCustomValidity(passwordInput.value === passwordConfirmationInput.value ? '' : 'Invalid');
    });

    // Age validation
    const fechaNacimientoInput = document.getElementById('fecha_nacimiento');
    fechaNacimientoInput.addEventListener('input', function () {
        const birthDate = new Date(fechaNacimientoInput.value);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const month = today.getMonth() - birthDate.getMonth();
        if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        fechaNacimientoInput.setCustomValidity(age >= 16 ? '' : 'Invalid');
    });
});
