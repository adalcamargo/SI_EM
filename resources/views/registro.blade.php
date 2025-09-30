@if (!Auth::check())
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            text: "{{ $errors->first() }}",
            icon: "warning",
            confirmButtonColor: "#00532C",
            showConfirmButton: true
        });
    </script>
@endif

<x-app-layout>
    <x-slot name="header">
        <style>
            body {
                background-color: #5E1200; /* Rojo oscuro */
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .dashboard-header {
                background-color: #00401C; /* Verde oscuro */
                color: #FFFFFF;
                padding: 20px;
                border-radius: 12px;
                box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.4);
                text-align: center;
                margin-bottom: 40px;
            }

            .dashboard-header h2 {
                margin: 0;
                font-size: 26px;
                font-weight: bold;
                letter-spacing: 1px;
            }

            .dashboard-card {
                background: #FFFFFF;
                border-radius: 15px;
                padding: 30px;
                box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .dashboard-card:hover {
                transform: translateY(-5px);
                box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.3);
            }

            .dashboard-card h3 {
                margin-bottom: 20px;
                color: #5E1200; /* Rojo oscuro */
                border-bottom: 3px solid #00401C; /* Línea verde */
                padding-bottom: 10px;
                font-size: 20px;
                font-weight: bold;
            }

            /* Estilos del formulario */
            .dashboard-card input,
            .dashboard-card select {
                width: 100%;
                padding: 12px 15px;
                margin-bottom: 15px;
                border-radius: 8px;
                border: 1px solid #00401C;
                font-size: 14px;
                background-color: #F9F9F9; /* Blanco suave */
                transition: border-color 0.3s, box-shadow 0.3s;
            }

            .dashboard-card input:focus,
            .dashboard-card select:focus {
                outline: none;
                border-color: #5E1200; /* Rojo oscuro */
                box-shadow: 0 0 8px rgba(94, 18, 0, 0.5);
            }

            .dashboard-card label {
                font-weight: bold;
                color: #00401C; /* Verde oscuro */
                display: block;
                margin-bottom: 8px;
            }

            .dashboard-card button {
                background-color: #00401C; /* Verde oscuro */
                color: #FFFFFF;
                padding: 12px 25px;
                border: none;
                border-radius: 10px;
                font-weight: bold;
                cursor: pointer;
                font-size: 14px;
                transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
            }

            .dashboard-card button:hover {
                background-color: #005F2C; /* Verde más claro */
                transform: translateY(-2px);
                box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
            }

            .form-footer {
                text-align: center;
                margin-top: 20px;
            }
        </style>

        <div class="dashboard-header">
            <h2>{{ __('Universidad Tecnológica del Valle del Mezquital') }}</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="dashboard-card">
                <h3>{{ __('Registro de usuarios') }}</h3>
                <form method="POST" action="{{ route('dashboard.register') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Nombre</label>
                        <input type="text" name="name" class="w-full border rounded px-3 py-2"
                            value="{{ old('name') }}" required>
                        <x-input-error :messages="$errors->get('name')" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Email</label>
                        <input type="email" name="email" class="w-full border rounded px-3 py-2"
                            value="{{ old('email') }}" required>
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Contraseña</label>
                        <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
                        <x-input-error :messages="$errors->get('password')" />
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2"
                            required>
                    </div>

                    <!-- Domicilio -->
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Domicilio</label>
                        <input type="text" name="domicilio" class="w-full border rounded px-3 py-2"
                            value="{{ old('domicilio') }}" required>
                        <x-input-error :messages="$errors->get('domicilio')" />
                    </div>

                    <!-- Teléfono -->
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Teléfono</label>
                        <input type="text" name="telefono" class="w-full border rounded px-3 py-2"
                            value="{{ old('telefono') }}" required>
                        <x-input-error :messages="$errors->get('telefono')" />
                    </div>

                    <!-- Edad -->
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Edad</label>
                        <input type="number" name="edad" class="w-full border rounded px-3 py-2"
                            value="{{ old('edad') }}" required>
                        <x-input-error :messages="$errors->get('edad')" />
                    </div>

                    <!-- Estatus -->
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Estatus</label>
                        <select name="estatus" class="w-full border rounded px-3 py-2" required>
                            <option value="0" {{ old('estatus') == '0' ? 'selected' : '' }}>No Titulado</option>
                            <option value="1" {{ old('estatus') == '1' ? 'selected' : '' }}>Titulado</option>
                        </select>
                        <x-input-error :messages="$errors->get('estatus')" />
                    </div>


                    <!-- Footer -->
                    <div class="form-footer">
                        <button type="submit" class="btn-submit">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
