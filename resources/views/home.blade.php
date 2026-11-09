@extends('layouts.layout')

@section('title', 'Home')

@section('conteudo')

    {{-- Div principal --}}
    <div>
        {{-- Div encurtador --}}
        <div>
            <h1 class="text-xl">Encurtador de URL</h1>
            <fieldset class="fieldset">
                <legend class="fieldset-legend text-md">Cole o link do site para encurtá-lo</legend>
                <input type="text" class="input" placeholder="Type here" />
            </fieldset>
            <button class="btn btn-outline btn-info">
                Encurtar URL
            </button>

        </div>

        {{-- Div de gráfico --}}
        <div>

        </div>
    </div>

@endsection
