@extends('layouts.template')

@section('document-title', 'Home')

@section('main')
    <main>
    <div class="card-container">
        @foreach ($comics as $comic)
            <div class="card">
                <div class="title-card"><a href="{{ route('comics.show', $comic->id) }}"> {{$comic->title}} </a></div>
                <img src="{{$comic->thumb}}" alt=" {{$comic->title}} ">
                <div class="price">{{$comic->price}}€ </div>
            </div>
        @endforeach
    </div>
    {{ $comics->links() }}
    <a href=" {{route('comics.create')}} ">Create</a>
</main>
@endsection

    

