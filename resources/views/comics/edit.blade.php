@extends('layouts.template')

@section('document-title','Edit' . ' ' .  $comic->title  )

@section('main')
<div class="container">
    <div class="row">
        <div class="col">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('comics.update', $comic->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="url" class="form-control" id="image" name="thumb" value="{{ $comic->thumb }}">
                  </div>
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
                </div>

                <div class="mb-3">
                    <label for="series" class="form-label">series</label>
                    <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type }}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $comic->price }}">
                </div>
                <div class="mb-3">
                    <label for="sale_date" class="form-label">sale_date</label>
                    <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
                </div>
                <a href=" {{route('comics.delete', $comic->id)}} "></a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

