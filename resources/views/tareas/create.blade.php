

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
  <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Header -->
    <div class="bg-blue-600 px-6 py-4">
      <h1 class="text-2xl font-bold text-white">Crear Nueva Tarea</h1>
    </div>

    <!-- Form -->
    <form action="{{ route('tareas.store') }}" method="POST" class="px-6 py-8">
      <!-- CSRF token for form security -->
      @csrf

      <!-- Nombre -->
      <div class="mb-6">
        <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
        <input
          type="text"
          id="nombre"
          name="nombre"
          value="{{ old('nombre') }}"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Título de la tarea"
        />
        @error('nombre')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Descripción -->
      <div class="mb-6">
        <label for="descripcion" class="block text-gray-700 font-medium mb-2">Descripción</label>
        <textarea
          id="descripcion"
          name="descripcion"
          rows="4"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Detalles de la tarea"
        >{{ old('descripcion') }}</textarea>
        @error('descripcion')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Fecha Límite -->
      <div class="mb-6">
        <label for="fecha_limite" class="block text-gray-700 font-medium mb-2">Fecha Límite</label>
        <input
          type="date"
          id="fecha_limite"
          name="fecha_limite"
          value="{{ old('fecha_limite') }}"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        @error('fecha_limite')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Submit Button -->
      <div class="flex items-center justify-between">
        <a
          href="{{ route('tareas.index') }}"
          class="text-gray-600 hover:underline font-medium"
        >
          ← Volver a la lista
        </a>
        <button
          type="submit"
          class="inline-flex items-center px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition"
        >
          Crear Tarea
        </button>
      </div>
    </form>
  </div>
</div>
@endsection