@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="container mx-auto px-6 py-8">
  <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
    {{-- Header + Status Badge --}}
    <div class="flex items-center justify-between mb-4">
      <h1 class="text-3xl font-bold text-gray-900">{{ $tarea->nombre }}</h1>
      @if($tarea->fecha_limite->isPast())
        <span class="bg-red-100 text-red-800 text-sm font-semibold px-2 py-1 rounded">
          Missing
        </span>
      @endif
    </div>

    {{-- Description --}}
    <p class="text-gray-700 mb-6">{{ $tarea->descripcion }}</p>

    {{-- Due Date --}}
    <p class="text-sm text-gray-500 mb-6">
      <strong>Fecha de entrega:</strong>
      {{ $tarea->fecha_limite->format('d/m/Y H:i') }}
    </p>

    {{-- (Optional) Invited Users --}}
    @if(method_exists($tarea, 'invitedUsers'))
    <div class="mb-6">
      <h2 class="text-lg font-semibold mb-2">Invitados</h2>
      @if($tarea->invitedUsers->isEmpty())
        <p class="text-gray-500">Aún no hay usuarios invitados.</p>
      @else
        <ul class="list-disc list-inside text-gray-700">
          @foreach($tarea->invitedUsers as $user)
            <li>{{ $user->name }} &lt;{{ $user->email }}&gt;</li>
          @endforeach
        </ul>
      @endif
    </div>
    @endif

    {{-- Back Link --}}
    <a href="{{ route('tareas.index') }}"
       class="inline-block mt-4 text-blue-600 hover:underline font-medium">
      ← Volver a la lista de tareas
    </a>
  </div>
</div>
@endsection