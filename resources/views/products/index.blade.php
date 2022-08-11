@inject('helper', 'App\Models\CustomHelper')
@extends('layouts.app')
@section('title')
    {{ config('app.name') }} live pizza search
@endsection
{{-- // live search reference: https://www.webslesson.info/2018/04/live-search-in-laravel-using-ajax.htm --}}

@section('content')

    <div class="container">
        {!! $helper->breadcrumb('view pizza menu') !!}
        <h1 class="text-capitalize">pizza menu</h1>
        <hr>
        <form class="d-flex" role="search" id="productsSearchForm">
            <input type="hidden" id="searchRoute" value="{{ route('products.search_results') }}">
            <input type="hidden" id="categoryRoute" value="{{ route('products.getCategories') }}">

            <input class="form-control me-2" type="search" id="search" name="search"
                placeholder="Search Pizzas, drinks & sides" aria-label="Search" autofocus>
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
        <div class="row" id="search_results"></div>
    </div>
    @section('scripts')
        <script type="module" src="{{ asset('js/search_products.js') }}"></script>
    @endsection
@endsection
