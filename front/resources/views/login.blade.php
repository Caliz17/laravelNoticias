@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:h-screen">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Ingresa a tu cuenta
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/access" method="POST">
                        @csrf
                        @method('POST')
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                                electronico</label>
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

                        <button type="submit"
                            class="w-full text-white bg-blue-500 p-4 hover:bg-blue-600 font-medium rounded-lg text-sm  text-center"
                            data-toggle="tooltip" data-placement="top" title="Ingresar">
                            <i class="fas fa-sign-in-alt"></i>
                            Ingresar</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            ¿Todavía no tienes una cuenta? <a href="#"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Crear Cuenta</a>
                        </p>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">También puedes iniciar sesión con
                        </p>
                        <div class="flex items
                        -center justify-center space-x-4">
                            <a href="#"
                                class="flex items-center justify-center w-full px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm"
                                data-toggle="tooltip" data-placement="top" title="Facebook">
                                <i class="fab fa-facebook-f"> </i>
                            </a>
                            <a href="#"
                                class="flex items-center justify-center w-full px-4 py-2 text-white bg-gray-900 hover:bg-gray-950 font-medium rounded-lg text-sm"
                                data-toggle="tooltip" data-placement="top" title="GitHub">
                                <i class="fab fa-github"> </i>
                            </a>
                            <a href="#"
                                class="flex items-center justify-center w-full px-4 py-2 text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm"
                                data-toggle="tooltip" data-placement="top" title="Google">
                                <i class="fab fa-google"> </i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
