<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urls = Url::all();
        return view('url.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Implementação para criar uma nova URL
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implementação para armazenar uma nova URL
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('url.show', compact('url'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('url.edit', compact('url'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implementação para atualizar uma URL
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        $url->delete();
        return redirect()->route('urls.index');
    }
}
