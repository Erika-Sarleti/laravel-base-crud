@extends('layouts.template')
@section('document-title','Add Comic')
@section('main')
<div class="container">
    <form method="POST" action="{{ route('comics.store') }}">
    @csrf
        <div class="row mt-4">
            <div class="col mb-3 ">
                <label for="title" class="form-title">Title</label>
                <input type="text" class="form-control" name='title' id='title' value='{{old('title')}}'>       
            </div>
            
            <div class="col mb-3">
                <label for="price">Price</label>
                <input type="number" min="1" step="any" class="form-control" name='price' id='price' value='{{old('price')}}'>
            </div>
        </div>
            @error('title')
                <div class=" alert alert-danger">{{ $message }}</div>
            @enderror 
        <div class="row">
            <div class="col">
                 <div class="mb-3">
                    <label for="series" class="form-label">Series</label>
                    <input type="text" class="form-control" id="series" name="series" value="{{ old('series') }}">
                </div>
                @error('series')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" name="type" id="type" value=' {{old('type')}} '>
                        <option value="Comic Book"> Comic Book </option>
                        <option value="Graphic Novel"> Graphic Novel</option>
                    </select>    
                </div>
                <div class="mb-3">
                    <label for="sale_date" class="form-label">Sale Date</label>
                    <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ old('sale_date')}}">
                </div>
                <div class="mb-3">
                    <label for="thumb" class="form-label">Image</label>
                    <input type="url" class="form-control" id="thumb" name="thumb" value="{{ old('thumb') }}">
                </div>
                @error('thumb')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                </div>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
           
        </div>
    </form>
</div>
@endsection