<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Persona') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/persona">

                    <div class="form-group">
                        <!-- <label><input type="checkbox" name="estrellaPersona" value="" > Favorito</label> -->
                        <textarea name="estrellaPersona" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder='¿Favorito?'></textarea>
                        @if ($errors->has('estrellaPersona'))
                            <span class="text-danger">{{ $errors->first('estrellaPersona') }}</span>
                        @endif

                        <textarea name="nombrePersona" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Introduce el nombre'></textarea>
                        @if ($errors->has('nombrePersona'))
                            <span class="text-danger">{{ $errors->first('nombrePersona') }}</span>
                        @endif

                        <textarea name="apellidoPersona" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Introduce el apellido'></textarea>
                        @if ($errors->has('apellidoPersona'))
                            <span class="text-danger">{{ $errors->first('apellidoPersona') }}</span>
                        @endif

                        <textarea name="telefonoPersona" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Introduce el teléfono'></textarea>
                        @if ($errors->has('telefonoPersona'))
                            <span class="text-danger">{{ $errors->first('telefonoPersona') }}</span>
                        @endif

                        <select name="categoria_id"  class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                            @foreach(auth()->user()->categorias as $categoria)
                                <option value='{{$categoria->id}}' @foreach(auth()->user()->personas as $persona) {{$persona->categoria_id == $categoria->id ? 'selected' : ''}} @endforeach> {{$categoria->nombreCategoria}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('categoria_id'))
                            <span class="text-danger">{{ $errors->first('categoria_id') }}</span>
                        @endif
                    </div>
                     <div class="form-group">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Añadir Persona</button>
                     </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
