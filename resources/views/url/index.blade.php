@extends('layouts.app')

@section('title', 'Lista de URLs')

@section('content')
    <h1>Lista de URLs</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Original URL</th>
                <th>Shortened URL</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($urls as $url)
                <tr>
                    <td>{{ $url->id }}</td>
                    <td><a href="{{ url($url->shortened_url) }}">{{ $url->original_url }}</a></td>
                    <td>{{ $url->shortened_url }}</td>
                    <td>
                        <a href="{{ route('urls.edit', $url) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('urls.destroy', $url) }}" method="POST" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('urls.create') }}" class="btn btn-success">Cadastrar Nova URL</a>
@endsection
