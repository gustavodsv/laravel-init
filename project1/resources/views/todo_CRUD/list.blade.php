@extends('layouts.admin')

@section('title', 'To-do')

@section('content')

    @section('header', 'List TO-DO')

    @if(count($list) > 0)
        <ul>
            @foreach($list as $item)
                <li>{{$item->title}}</li>
            @endforeach
        </ul>
    @else
        NOT FOUND
    @endif

@endsection
