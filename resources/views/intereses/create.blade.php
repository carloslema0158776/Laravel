@extends('layouts.plantilla')

@section('title', 'Crear Interés')

@section('content')

<div class="max-w-3xl">

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-7 mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Registrar Nuevo Interés
        </h2>

        <p class="text-gray-500 mt-1 mb-6">
            Agrega un nuevo interés al sistema.
        </p>

        <form action="{{ route('intereses.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="nombre"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Nombre del interés
                </label>

                <input
                    type="text"
                    name="nombre"
                    id="nombre"
                    value="{{ old('nombre') }}"
                    placeholder="Ej: Programación"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="descripcion"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Descripción
                </label>

                <textarea
                    name="descripcion"
                    id="descripcion"
                    rows="3"
                    placeholder="Describe brevemente el interés"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('descripcion') }}</textarea>
            </div>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-3 rounded-lg">
                Guardar interés
            </button>

        </form>

    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-7">

        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Intereses registrados
        </h2>

        @if($intereses->count() > 0)

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                @foreach($intereses as $interes)

                    <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg">

                        <input
                            type="checkbox"
                            checked
                            disabled
                            class="w-4 h-4">

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

            <p class="text-gray-500">
                Todavía no hay intereses registrados.
            </p>

        @endif

    </div>

</div>

@endsection