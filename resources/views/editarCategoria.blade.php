<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar categoría') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/categoria/{{ $categoria->id }}">

                    <div class="form-group">
                        <textarea name="nombreCategoria" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$categoria->nombreCategoria }}</textarea>
                        @if ($errors->has('nombreCategoria'))
                            <span class="text-danger">{{ $errors->first('nombreCategoria') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" name="modificar" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Modificar categoría</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>