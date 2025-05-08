@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="container mx-auto px-6 py-8">
  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Mis Tareas</h1>
    <a href="{{ route('tareas.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
      + Nueva Tarea
    </a>
  </div>

  <!-- Search Bar -->
  <form method="GET" action="{{ route('tareas.index') }}" class="mb-6">
    <input
      type="text"
      name="search"
      value="{{ request('search') }}"
      placeholder="Buscar tareas..."
      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
    />
  </form>

  <!-- Cards Grid -->
  <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($tareas as $tarea)
      <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition">
        <div class="p-6">
          <div class="flex items-center justify-between mb-2">
            <h2 class="text-xl font-semibold text-gray-800">{{ $tarea->nombre }}</h2>
            @if($tarea->fecha_limite->isPast())
              <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded">
                Vencida
              </span>
            @endif
          </div>
          <p class="text-gray-600 mb-4">{{ Str::limit($tarea->descripcion, 100) }}</p>
          <p class="text-sm text-gray-500 mb-4">Entrega: {{ $tarea->fecha_limite->format('d/m/Y') }}</p>
          <a href="{{ route('tareas.show', $tarea) }}" class="text-blue-600 hover:underline font-medium">Ver detalles →</a>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Pagination -->
  <div class="mt-8">
    {{ $tareas->links() }}
  </div>
</div>
@endsection