{{-- @extends('layouts.base') --}}
@inject('helper', 'App\Models\CustomHelper')

@extends('layouts.app')
@section('title')
    add product item
@endsection

@section('content')


    <div class="container">

        {!! $helper->breadcrumb('add product') !!}

        @if (Session::has('message'))
            @include('messages.message')
        @endif

        @include('errors.form_errors')

        <div class="content">
            <div class="title m-b-md">
                add product
            </div>
        </div>
    </div>
    <div class="container py-5">
        <form class="row g-3 text-capitalize" action="{{ url('add_product') }}" method="post">
            @csrf
            <div class="col-md-6">
                <label for="type" class="form-label text-capitalize">product name</label>
                <input type="text" class="form-control @error('type') border border-danger @enderror" name="type"
                    id="type" autofocus value="{{ old('type') }}">
                @error('type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="col-md-6">
                <label for="cost" class="form-label">cost</label>
                <input type="text" class="form-control @error('cost') border border-danger @enderror" id="cost" name="cost" value="{{ old('cost') }}">
                @error('cost')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12">
                <label for="description" class="form-label">product description</label>
                <textarea class="form-control @error('description') border border-danger @enderror" id="description" name="description"
                    rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <h2 class="fw-bold">Categories</h2>
            {{-- <p>{{ $request->input('categories') }} --}}
            </p>

            <div class="col-12">
                {{-- category checkboxes --}}
                @each('products.partials.categories', $categories, 'category')
                @error('categories')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">add product</button>
            </div>
        </form>

    </div>
    @section('scripts')
        {{-- <script src="/js/pizzas.js" type="module"></script> --}}
    @endsection

@endsection
