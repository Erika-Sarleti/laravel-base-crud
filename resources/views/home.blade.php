@extends('layouts.template')

@section('document-title', 'Home')

@section('main')
    <main>
    <div class="container">
        @foreach ($comics as $comic)
            <div class="card-container">
                <div class="title-card"> {{$comic->title}} </div>
            </div>
        @endforeach
    </div>
</main>
@endsection

    

