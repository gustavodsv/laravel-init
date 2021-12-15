Version: {{$version}}
@extends('layouts.admin')

@section('title', 'AdminConfig')

@section('content')

    <h1>Configurations</h1>

    <x-alert>
        <strong>Whoops!</strong> Something went wrong!
    </x-alert>

    My name is {{ $name }}, {{ $age }} years old, I live in {{ $city }}.

        <br><br>

    @if($age >= 18)
        - Of legal age
    @else
        - Not of legal age
    @endif

        <br><br>
    <form action="" method="POST">
        @CSRF
        Name: <br>
        <input type="text" name="name"> <br>

        Age: <br>
        <input type="text" name="age"> <br>

        City: <br>
        <input type="text" name="city"> <br><br>

        <input type="submit" value="Send">
    </form>
        <br>

    <a href="/config/info">Informations</a> |
    <a href="{{ route('permi') }}">Permissions</a>

@endsection

