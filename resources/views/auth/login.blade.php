<style>
    body {
        background-color: #00381A; /* Color ligeramente más oscuro */
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        max-width: 400px;
        background: #F9F9F9; /* Blanco ligeramente grisáceo */
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-container:hover {
        transform: translateY(-5px);
        box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.3);
    }

    .login-container h2 {
        text-align: center;
        color: #00381A; /* Verde más oscuro */
        margin-bottom: 25px;
        font-size: 24px;
        font-weight: bold;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #00381A;
        font-size: 14px;
    }

    .form-input {
        width: 100%;
        padding: 12px;
        border: 1px solid #00381A;
        border-radius: 8px;
        margin-bottom: 15px;
        font-size: 14px;
        background-color: #00381A; /* Verde oscuro */
        color: #F9F9F9; /* Blanco suave */
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-input:focus {
        border-color: #002D14; /* Verde más oscuro */
        outline: none;
        box-shadow: 0 0 8px rgba(0, 56, 26, 0.5);
    }

    .form-error {
        color: #00381A;
        font-size: 13px;
        margin-top: -8px;
        margin-bottom: 10px;
    }

    .form-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .form-footer a {
        font-size: 13px;
        color: #00381A;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s;
    }

    .form-footer a:hover {
        color: #002D14;
        text-decoration: underline;
    }

    .btn-submit {
        background-color: #00381A;
        color: #F9F9F9;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-submit:hover {
        background-color: #002D14;
        transform: scale(1.05);
    }

    .logo {
        display: block;
        margin: 0 auto 20px auto;
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .logo:hover {
        transform: scale(1.08);
        box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.3);
    }
</style>

<div class="login-container">
    <img src="{{ asset('images/logo_utvm.png') }}" alt="Logo UTVM" class="logo">
    <h2>{{ __('Inicia sesión') }}</h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <label for="email" class="form-label">{{ __('Correo electrónico') }}</label>
        <input id="email" type="email" name="email" class="form-input" value="{{ old('email') }}" required
            autofocus autocomplete="username">
        <x-input-error :messages="$errors->get('email')" class="form-error" />

        <!-- Password -->
        <label for="password" class="form-label">{{ __('Contraseña') }}</label>
        <input id="password" type="password" name="password" class="form-input" required
            autocomplete="current-password">
        <x-input-error :messages="$errors->get('password')" class="form-error" />

        <!-- Footer -->
        <div class="form-footer">
            @if (Route::has('register'))
                <a href="{{ route('register') }}">{{ __('Regístrate') }}</a>
            @endif
            <button type="submit" class="btn-submit">
                {{ __('Ingresar') }}
            </button>
        </div>
    </form>
</div>
