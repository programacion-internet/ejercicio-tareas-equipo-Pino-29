<div class="mb-8">
    <h2 class="text-xl font-semibold mb-4">Archivos</h2>
  
    <form action="{{ route('tareas.archivos.store', $tarea) }}"
          method="POST"
          enctype="multipart/form-data"
          class="mb-4 flex items-center space-x-3">
      @csrf
      <input type="file"
             name="archivo"
             required
             class="border rounded p-1 text-sm" />
      <button type="submit"
              class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
        Subir Archivo
      </button>
      @error('archivo')
        <p class="text-red-600 text-sm">{{ $message }}</p>
      @enderror
    </form>
  
    @if($archivos->isEmpty())
      <p class="text-gray-500">No hay archivos adjuntos.</p>
    @else
      <ul class="space-y-2">
        @foreach($archivos as $archivo)
          <li class="flex justify-between items-center bg-gray-50 p-2 rounded">
            <a href="{{ route('tareas.archivos.download', [$tarea, $archivo]) }}"
               class="text-blue-600 hover:underline">
              {{ $archivo->original_name }}
            </a>
            <form action="{{ route('tareas.archivos.destroy', [$tarea, $archivo]) }}"
                  method="POST"
                  onsubmit="return confirm('¿Eliminar este archivo?');">
              @csrf @method('DELETE')
              <button type="submit" class="text-red-600 hover:text-red-800">
                🗑 Eliminar
              </button>
            </form>
          </li>
        @endforeach
      </ul>
    @endif
  </div>