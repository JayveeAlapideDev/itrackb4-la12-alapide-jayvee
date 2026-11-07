@extends('layouts.app')


@section('content')
    <h1>Page Not Found</h1>
    <p>The page you are looking for does not exist.</p>

    <a href="{{ route('products.index') }}">Back to the list</a>
@endsection
    