@extends('layouts.plantilla')

@section('title', 'Crear Persona')

@section('content')

<div class="max-w-3xl">

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-7">

        <h2 class="text-2xl font-bold text-gray-800">
            Registrar Nueva Persona
        </h2>

        <p class="text-gray-500 mt-1 mb-6">
            Ingresa los datos de la persona y selecciona sus intereses.
        </p>

        <form action="{{ route('personas.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="nombre"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Nombre
                </label>

                <input
                    type="text"
                    name="nombre"
                    id="nombre"
                    value="{{ old('nombre') }}"
                    placeholder="Ej: Carlos"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500"
                >

                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Correo electrónico
                </label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    placeholder="correo@ejemplo.com"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500"
                >

                @error('email')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-7">

                <label class="block text-sm font-medium text-gray-700 mb-3">
                    Intereses
                </label>

                @if($intereses->count() > 0)

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                        @foreach($intereses as $interes)

                            <label
                                class="flex items-center gap-3 p-4 border
                                       border-gray-200 rounded-lg cursor-pointer
                                       hover:bg-blue-50 hover:border-blue-300
                                       transition">

                                <input
                                    type="checkbox"
                                    name="intereses[]"
                                    value="{{ $interes->id }}"
                                    class="w-4 h-4"
                                    {{ in_array($interes->id, old('intereses', [])) ? 'checked' : '' }}
                                >

                                <div>
                                    <p class="font-medium text-gray-800">
                                        {{ $interes->nombre }}
                                    </p>

                                    @if($interes->descripcion)
                                        <p class="text-sm text-gray-500">
                                            {{ $interes->descripcion }}
                                        </p>
                                    @endif
                                </div>

                            </label>

                        @endforeach

                    </div>

                @else

                    <div class="bg-yellow-50 border border-yellow-200
                                text-yellow-700 rounded-lg p-4">
                        No existen intereses registrados todavía.
                    </div>

                @endif

                @error('intereses')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700
                       text-white font-semibold py-3 px-4
                       rounded-lg transition">
                Guardar Persona
            </button>

        </form>

    </div>

</div>

@endsection