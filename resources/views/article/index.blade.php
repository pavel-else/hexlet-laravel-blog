@extends('layouts.app')

@section('content')
    {{ Form::open(['url' => route('articles.index'), 'method' => 'GET']) }}
        {{ Form::label('q', 'Name') }}
        {{ Form::text('q', $q) }}
        {{ Form::submit('Create') }}
    {{ Form::close() }}

    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2>{{ $article->name }}</h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{ Str::limit($article->body, 200) }}</div>
    @endforeach
@endsection