<div class="mb-6">
    <h2 class="text-lg font-semibold mb-2">Archivos</h2>
  
    {{-- Formulario de subida --}}
    <form action="{{ route('tareas.archivos.store', $tarea) }}"
          method="POST"
          enctype="multipart/form-data"
          class="mb-4 flex items-center space-x-4">
      @csrf
      <input type="file" name="archivo" required
             class="border rounded p-1 text-sm" />
      <button type="submit"
              class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Subir
      </button>
    </form>
  
    {{-- Lista de archivos --}}
    @if($archivos->isEmpty())
      <p class="text-gray-500">No hay archivos.</p>
    @else
      <ul class="space-y-2">
        @foreach($archivos as $file)
          <li class="flex justify-between items-center bg-gray-50 p-2 rounded">
            <a href="{{ Storage::disk('public')->url($file->path) }}"
               target="_blank"
               class="text-blue-600 hover:underline">
              {{ $file->original_name }}
            </a>
            <form action="{{ route('tareas.archivos.destroy', [$tarea, $file]) }}"
                  method="POST"
                  onsubmit="return confirm('¿Eliminar este archivo?');">
              @csrf @method('DELETE')
              <button type="submit"
                      class="text-red-600 hover:text-red-800">
                🗑
              </button>
            </form>
          </li>
        @endforeach
      </ul>
    @endif
  </div>