@extends('layouts.template')

@section('document-title', $pageTitle)
@section('main')
    <main>
        <div class="comic-title"> {{$comic->title}} </div>
        <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
        <div class="description">{{$comic->description}}</div>
        <a href="{{route('comics.edit',$comic->id)}}">Edit</a>
    </main>
@endsection
