@extends('layouts.admin')

@section('title', 'To-do')

<div class="container">
    @section('header', 'New TO-DO')

@section('content')

    @if(session('warning'))
        <x-alert>
            {{session('warning')}}
        </x-alert>
    @endif

    <form method="post" class="mt-4">
        @csrf
        <div class="mb-3">
            <label class="form-label">
                Title
            </label>
            <input type="text" class="form-control" name="title">
        </div>


        <input type="submit" class="btn btn-primary" value="Submit">
      </form>
</div>

@endsection
