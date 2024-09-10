@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:h-screen">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                @if ($errors->has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ $errors->first('error') }}</span>
                    </div>
                @endif


                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Crea tu cuenta
                    </h1>
                    <form id="registerForm" class="space-y-4 md:space-y-6" action="/register" method="POST"
                        onsubmit="return validateForm()">
                        @csrf
                        @method('POST')
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                de usuario</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nombre de usuario" required="">
                        </div>

                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                                electrónico</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="correo@ejemplo.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>

                        <div>
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar
                                Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                            <label id="error-message" class="text-red-500 text-sm hidden">Las contraseñas no
                                coinciden.</label>
                        </div>

                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        <div class="flex justify-between">
                            <a href="/login"
                                class="w-auto text-white bg-green-500 p-2 hover:bg-blue-600 font-medium rounded-lg text-sm text-center"
                                data-toggle="tooltip" data-placement="top" title="Regresar">
                                <i class="fas fa-sign-in-alt"></i> Regresar
                            </a>

                            <button type="submit"
                                class="w-auto text-white bg-blue-500 p-2 hover:bg-blue-600 font-medium rounded-lg text-sm text-center"
                                data-toggle="tooltip" data-placement="top" title="Registrar">
                                <i class="fas fa-sign-in-alt"></i> Registrar
                            </button>
                        </div>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function validateForm() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('password_confirmation').value;
            var errorMessage = document.getElementById('error-message');

            if (password !== confirmPassword) {
                errorMessage.classList.remove('hidden'); // Muestra el mensaje de error
                return false; // Evita el envío del formulario
            } else {
                errorMessage.classList.add('hidden'); // Oculta el mensaje si las contraseñas coinciden
            }
            return true; // Permite el envío del formulario
        }
    </script>
@endsection
