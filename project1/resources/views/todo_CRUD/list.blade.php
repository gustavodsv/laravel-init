@extends('layouts.admin')

@section('title', 'To-do')

@section('header', 'List TO-DO')

@section('content')


    <a href="" class="text-decoration-none">[ NEW ]</a>

    @if(count($list) > 0)

        <ul class="list-group mt-2">
            @foreach($list as $item)
                <li class="list-group-item">

                    <a href="">
                        @if($item->status===1)
                            <input class="form-check-input me-1" type="checkbox" value="" checked>

                        @else
                            <input class="form-check-input me-1" type="checkbox" value="">
                        @endif
                    </a>

                    <a href="" class="text-decoration-none">
                        {{$item->title}}
                    </a>

                    <a href="" class="text-decoration-none">[ X ]</a>
                </li>
            @endforeach
        </ul>
    @else
        NOT FOUND
    @endif

@endsection
