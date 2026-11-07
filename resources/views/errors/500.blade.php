@extends('layouts.app')


@section('content')
    <h1>Internal Server Error</h1>
    <p>System error occurred.</p>

    <a href="{{ route('products.index') }}">Back to the list</a>
@endsection
