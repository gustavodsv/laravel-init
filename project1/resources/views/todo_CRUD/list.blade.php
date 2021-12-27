@extends('layouts.admin')

@section('title', 'To-do')

<div class="container">
    @section('header', 'List TO-DO')

@section('content')

    <a href = '{{ route('todo.add')}}'>
        [ NEW ]
    </a>

    @if(count($list) > 0)

        <ul class="list-group mt-2">
            @foreach($list as $item)
                <li class="list-group-item">

                    @if($item->status===1)
                        <input class="form-check-input me-1" type="checkbox" onClick="window.location.href = '{{ route('todo.status', ['id'=>$item->id]) }}'" checked>

                    @else
                        <input class="form-check-input me-1" type="checkbox" onClick="window.location.href = '{{ route('todo.status', ['id'=>$item->id]) }}'">
                    @endif

                    <a href='{{ route('todo.edit', ['id'=>$item->id]) }}'
                        class="text-decoration-none">
                        {{$item->title}}
                    </a>

                    <a href = '{{ route('todo.delete', ['id'=>$item->id]) }}'>
                        [ X ]
                    </a>

                </li>
            @endforeach
        </ul>
    @else
        NOT FOUND
    @endif
</div>

@endsection
