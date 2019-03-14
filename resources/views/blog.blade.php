@extends('layouts.master')

@section('title')
    Blog Post Title
@endsection

@section('styles')
    <!-- Custom styles for this template -->
    <link href="/css/styles.css" rel="stylesheet">
@endsection

@section('page')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                @yield('content')
            </div><!-- /.blog-main -->
            @include('layouts.partials.frontend._aside')
        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection


@section('nav')
    @include('layouts.partials.frontend._nav)
@endsection

@section('footer')
    @include('layouts.partials.frontend._footer')
@endsection

{{--Scripts--}}
@section('scripts')
    <!-- Custom JavaScript -->
@endsection
