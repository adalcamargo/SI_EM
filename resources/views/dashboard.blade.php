@if (!Auth::check())
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif

<x-app-layout>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('message') === 'ok')
        <script>
            Swal.fire({
                text: "Usuario registrado exitosamente",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
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
    <x-slot name="header">
        <style>
            body {
                background-color: #5A0F00; /* Rojo oscuro más elegante */
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .dashboard-header {
                background-color: #00381A; /* Verde oscuro */
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
                color: #5A0F00; /* Rojo oscuro */
                border-bottom: 3px solid #00381A; /* Línea verde */
                padding-bottom: 10px;
                font-size: 20px;
                font-weight: bold;
            }

            .user-table {
                width: 100%;
                border-collapse: collapse;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
            }

            .user-table thead {
                background-color: #00381A; /* Verde oscuro */
                color: #FFFFFF;
                text-align: left;
            }

            .user-table th,
            .user-table td {
                padding: 15px;
                border-bottom: 1px solid #ddd;
            }

            .user-table tbody tr:nth-child(even) {
                background-color: #f9f9f9; /* Blanco suave */
            }

            .user-table tbody tr:hover {
                background-color: #eaf4ec; /* Verde claro */
                transform: scale(1.01);
                transition: all 0.2s ease-in-out;
            }

            .user-table th {
                font-size: 16px;
                font-weight: bold;
                text-transform: uppercase;
            }

            .user-table td {
                font-size: 14px;
                color: #333;
            }

            .user-table td p {
                margin: 0;
                font-weight: bold;
                color: #5A0F00; /* Rojo oscuro */
            }

            .user-table td p:nth-child(2) {
                color: #00381A; /* Verde oscuro */
            }
        </style>

        <div class="dashboard-header">
            <h2>{{ __('Universidad Tecnológica del Valle del Mezquital') }}</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="dashboard-card">
                <h3>{{ __('Lista de usuarios') }}</h3>
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Domicilio</th>
                            <th>Teléfono</th>
                            <th>Edad</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->domicilio }}</td>
                                <td>{{ $user->telefono }}</td>
                                <td>{{ $user->edad }}</td>
                                <td>
                                    @if ($user->estatus == 0)
                                        <p>No titulado</p>
                                    @else
                                        <p>Titulado</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
