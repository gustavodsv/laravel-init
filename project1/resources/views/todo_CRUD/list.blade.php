@extends('layouts.admin')

@section('title', 'To-do')

@section('content')

    @section('header', 'List TO-DO')

    <a href="">[ new ]</a>

    @if(count($list) > 0)

    <ul>
        @foreach($list as $item)
            <li>
                <a href="">[ edit ]</a>
                <a href="">[ delete ]</a>
                {{$item->title}}
                <a href="">
                    @if($item->status===1) <input type="checkbox" checked>
                    @else <input type="checkbox">
                    @endif
                </a>
            </li>
            @endforeach
        </ul>
    @else
        NOT FOUND
    @endif

@endsection
