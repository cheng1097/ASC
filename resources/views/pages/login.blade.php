$<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style_formConnexion.css') }}"> 
    <title>Page de connexion</title>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <i class="bi bi-shield-lock-fill"></i>
            <h1 class="login-title">Connexion</h1>
        </div>

        <form id="form_id" method="POST" action="{{ route('connexion') }}">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" 
                       class="form-control" 
                       id="username" 
                       name="login" 
                       value="{{ old('login') }}" 
                       placeholder="Nom d'utilisateur"
                       required>
                <label for="username">Nom d'utilisateur</label>
            </div>

            <div class="form-floating password-field">
                <input type="password" 
                       class="form-control" 
                       id="password" 
                       name="password" 
                       placeholder="Mot de passe"
                       required>
                <label for="password">Mot de passe</label>
                <button type="button" 
                        class="password-toggle" 
                        onclick="togglePassword()"
                        aria-label="Afficher/Masquer le mot de passe">
                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                </button>
            </div>

            @error('form')
                <div class="error-message mb-4">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary w-100 login-button" id="loginBtn">
                <span>Se connecter</span>
            </button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.className = 'bi bi-eye';
            } else {
                passwordField.type = 'password';
                toggleIcon.className = 'bi bi-eye-slash';
            }
        }

        // Ajout d'animation de chargement sur le bouton lors de la soumission
        document.getElementById('form_id').addEventListener('submit', function(e) {
            const button = document.getElementById('loginBtn');
            button.classList.add('loading');
        });

        // Animation des champs lors de la frappe
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.length > 0) {
                    this.classList.add('is-filled');
                } else {
                    this.classList.remove('is-filled');
                }
            });
        });
    </script>
</body>
</html>