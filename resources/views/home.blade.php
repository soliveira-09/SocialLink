@extends('layouts.layout')

@section('title', 'Home')

@section('conteudo')

    {{-- Div principal --}}
    <div class="bg-amber-50 p-5">

        {{-- Div encurtador --}}
        <div class="flex flex-col items-center justify-between">
            <h1 class="text-xl text-black">URL Shortener</h1>

            <form action="" method="POST" class="w-full max-w-sm mx-auto">
                @csrf
                <label for="urInput" class="block text-gray-700 font-bold md:text-lg mb-2">
                    Paste the website link below to shorten it:
                </label>
                <input form="urInput" type="text" name="url" placeholder="paste your url here"
                    class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight text-gray-700 focus:outine-none focus:shadow-outline">

                @error('url')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="btn btn-info text-white font-bold mt-2 py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Shorten
                </button>
            </form>
        </div>

        {{-- Div de gráfico --}}
        <div>

        </div>
    </div>

@endsection
