
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()



    function togglePassword(id) {
        var input = document.getElementById(id);
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }

    function validateForm() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var password_confirmation = document.getElementById('password_confirmation').value;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

        if (name.length < 8) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El nombre debe tener al menos 8 caracteres.',
            });
            return false;
        }

        if (!emailRegex.test(email)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El correo electrónico no es válido.',
            });
            return false;
        }

        if (!passwordRegex.test(password)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'La contraseña debe tener al menos 8 caracteres, incluir letras mayúsculas y minúsculas, números y caracteres especiales, y no debe contener espacios.',
            });
            return false;
        }

        if (password !== password_confirmation) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'La confirmación de la contraseña no coincide.',
            });
            return false;
        }

        return true;
    }

    function showSwal(title, text, icon) {
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire(title, text, icon);
        });
    }
