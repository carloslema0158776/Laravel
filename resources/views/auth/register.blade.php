@extends('layouts.guest')

@section('title', 'Crear cuenta')

@section('content')
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">Crear cuenta</h2>
        <p class="text-sm text-gray-500 mt-1">
            Regístrate para acceder a EjemploSeg
        </p>
    </div>

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Nombre
            </label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                placeholder="Ingresa tu nombre"
                required
                autofocus
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500
                       focus:border-blue-500"
            >

            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                Correo electrónico
            </label>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                placeholder="correo@ejemplo.com"
                required
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500
                       focus:border-blue-500"
            >

            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                Contraseña
            </label>

            <input
                type="password"
                name="password"
                id="password"
                placeholder="••••••••"
                required
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500
                       focus:border-blue-500"
            >

            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                Confirmar contraseña
            </label>

            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                placeholder="••••••••"
                required
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500
                       focus:border-blue-500"
            >
        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 text-white font-semibold py-2.5 px-4
                   rounded-lg hover:bg-blue-700 transition duration-200"
        >
            Crear cuenta
        </button>

        <p class="text-sm text-center text-gray-600">
            ¿Ya tienes cuenta?
            <a
                href="{{ route('login') }}"
                class="text-blue-600 font-medium hover:underline"
            >
                Inicia sesión
            </a>
        </p>
    </form>
@endsection